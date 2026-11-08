<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\KashierPaymentService;

class KashierPaymentController extends Controller
{


public function handleRedirect(
    Request $request,
    KashierPaymentService $kashierPaymentService
) {
    if (!$this->hasValidRedirectSignature($request)) {
        return redirect()->route('my.orders')
            ->with('error', 'Invalid payment response.');
    }

    $merchantOrderId = $request->query('merchantOrderId');

    $order = Order::where('payment_reference', $merchantOrderId)
        ->first();

    if (
        !$order ||
        $order->payment_method !== 'kashier' ||
        !$order->payment_session_id
    ) {
        return redirect()->route('my.orders')
            ->with('error', 'Payment order could not be verified.');
    }

    $callbackAmount = number_format(
        (float) $request->query('amount'),
        2,
        '.',
        ''
    );

    $orderAmount = number_format(
        (float) $order->total_price,
        2,
        '.',
        ''
    );

    if (
        $callbackAmount !== $orderAmount ||
        strtoupper((string) $request->query('currency')) !== 'USD'
    ) {
        return redirect()->route('my.orders')
            ->with('error', 'Payment details do not match the order.');
    }

    try {
        $payment = $kashierPaymentService->getPaymentStatus($order);

        $capturedAmount = number_format(
            (float) ($payment['capturedAmount'] ?? 0),
            2,
            '.',
            ''
        );

        $refundedAmount = number_format(
            (float) ($payment['refundedAmount'] ?? 0),
            2,
            '.',
            ''
        );

        $transactionId = $payment['targetTransactionId'] ?? null;

        if (
            ($payment['sessionId'] ?? null) !== $order->payment_session_id ||
            ($payment['merchantOrderId'] ?? null) !== $order->payment_reference ||
            ($payment['merchantId'] ?? null) !== config('services.kashier.merchant_id') ||
            number_format((float) ($payment['amount'] ?? 0), 2, '.', '') !== $orderAmount ||
            strtoupper((string) ($payment['currency'] ?? '')) !== 'USD'
        ) {
            throw new \RuntimeException(
                'Kashier payment details do not match the order.'
            );
        }

        if (
            strtoupper((string) ($payment['status'] ?? '')) !== 'PAID' ||
            $capturedAmount !== $orderAmount ||
            $refundedAmount !== '0.00' ||
            !is_string($transactionId) ||
            $transactionId === ''
        ) {
            return redirect()->route('my.orders')
                ->with(
                    'error',
                    'Payment has not been fully confirmed. Please contact support if money was deducted.'
                );
        }

        \Illuminate\Support\Facades\DB::transaction(function () use ($order, $transactionId) {

    $lockedOrder = Order::whereKey($order->id)
        ->lockForUpdate()
        ->firstOrFail();

    if ($lockedOrder->payment_status === 'paid') {

        if (
            $lockedOrder->payment_transaction_id !== null &&
            $lockedOrder->payment_transaction_id !== $transactionId
        ) {
            throw new \RuntimeException(
                'A different transaction is already recorded for this order.'
            );
        }

        $lockedOrder->update([
            'payment_transaction_id' => $transactionId,
            'paid_at' => $lockedOrder->paid_at ?? now(),
        ]);

        return;
    }

    if ($lockedOrder->payment_status !== 'pending') {
        throw new \RuntimeException(
            'Order payment status cannot be updated.'
        );
    }

    $lockedOrder->update([
        'payment_status' => 'paid',
        'payment_transaction_id' => $transactionId,
        'paid_at' => now(),
    ]);
});

        return redirect()->route('my.orders')
            ->with(
                'success',
                'Payment successfully verified and order updated.'
            );

    } catch (\Throwable $exception) {
        report($exception);

        return redirect()->route('my.orders')
            ->with(
                'error',
                'Unable to verify or update payment. Please try again later.'
            );
    }
}




private function hasValidRedirectSignature(Request $request): bool
{
    $apiKey = config('services.kashier.api_key');
    $receivedSignature = $request->query('signature');

    if (!$apiKey || !is_string($receivedSignature) || $receivedSignature === '') {
        return false;
    }

    $fields = [
        'paymentStatus',
        'cardDataToken',
        'maskedCard',
        'merchantOrderId',
        'orderId',
        'cardBrand',
        'orderReference',
        'transactionId',
        'amount',
        'currency',
    ];

    $parts = [];

    foreach ($fields as $field) {
        $value = $request->query($field, 'null');

        if (!is_scalar($value)) {
            return false;
        }

        $parts[] = $field . '=' . $value;
    }

    $payload = implode('&', $parts);

    $expectedSignature = hash_hmac(
        'sha256',
        $payload,
        $apiKey
    );

    return hash_equals(
        strtolower($expectedSignature),
        strtolower($receivedSignature)
    );
}


public function webhook(
    Request $request,
    KashierPaymentService $kashierPaymentService
) {
    $signatureValid = $this->hasValidSignature($request);

\Illuminate\Support\Facades\Log::info(
    'Kashier webhook received',
    [
        'event' => $request->input('event'),
        'merchant_order_id' => $request->input('data.merchantOrderId'),
        'transaction_id' => $request->input('data.transactionId'),
        'status' => $request->input('data.status'),
        'response_code' => $request->input('data.transactionResponseCode'),
        'is_test_webhook' => $request->input('data.isTestWebhook'),
        'signature_valid' => $signatureValid,
    ]
);

if (!$signatureValid) {
    return response()->json([
        'message' => 'Invalid signature',
    ], 401);
}

    $payload = $request->all();

    if (
        !isset($payload['data']) ||
        !is_array($payload['data']) ||
        ($payload['event'] ?? null) !== 'pay'
    ) {
        return response()->noContent(200);
    }

    $data = $payload['data'];

    if (($data['isTestWebhook'] ?? false) === true) {
        return response()->noContent(200);
    }

    if (
        ($data['status'] ?? null) !== 'SUCCESS' ||
        (string) ($data['transactionResponseCode'] ?? '') !== '00'
    ) {
        return response()->noContent(200);
    }

    $merchantOrderId = $data['merchantOrderId'] ?? null;
    $transactionId = $data['transactionId'] ?? null;

    if (
        !is_string($merchantOrderId) ||
        $merchantOrderId === '' ||
        !is_string($transactionId) ||
        $transactionId === '' ||
        ($data['merchantId'] ?? null) !== config('services.kashier.merchant_id') ||
        strtoupper((string) ($data['currency'] ?? '')) !== 'USD' ||
        !is_numeric($data['amount'] ?? null)
    ) {
        return response()->json([
            'message' => 'Invalid payment information',
        ], 422);
    }

    $order = Order::where(
        'payment_reference',
        $merchantOrderId
    )->first();

    if (
        !$order ||
        $order->payment_method !== 'kashier' ||
        !$order->payment_session_id
    ) {
        return response()->json([
            'message' => 'Order not found',
        ], 404);
    }

    $orderAmount = number_format(
        (float) $order->total_price,
        2,
        '.',
        ''
    );

    $webhookAmount = number_format(
        (float) $data['amount'],
        2,
        '.',
        ''
    );

    if ($webhookAmount !== $orderAmount) {
        return response()->json([
            'message' => 'Payment amount mismatch',
        ], 422);
    }

    try {
        $payment = $kashierPaymentService->getPaymentStatus($order);

        $capturedAmount = number_format(
            (float) ($payment['capturedAmount'] ?? 0),
            2,
            '.',
            ''
        );

        $refundedAmount = number_format(
            (float) ($payment['refundedAmount'] ?? 0),
            2,
            '.',
            ''
        );

        $apiAmount = number_format(
            (float) ($payment['amount'] ?? 0),
            2,
            '.',
            ''
        );

        $apiOrderId = $payment['orderId'] ?? null;

        if (
            ($payment['sessionId'] ?? null) !== $order->payment_session_id ||
            ($payment['merchantOrderId'] ?? null) !== $order->payment_reference ||
            ($payment['merchantId'] ?? null) !== config('services.kashier.merchant_id') ||
            strtoupper((string) ($payment['currency'] ?? '')) !== 'USD' ||
            $apiAmount !== $orderAmount ||
            $capturedAmount !== $orderAmount ||
            $refundedAmount !== '0.00' ||
            ($payment['targetTransactionId'] ?? null) !== $transactionId ||
            !is_string($apiOrderId) ||
            $apiOrderId === '' ||
            !isset($payment['history']) ||
            !is_array($payment['history'])
        ) {
            throw new \RuntimeException(
                'Kashier API payment verification failed.'
            );
        }

        $matchingTransaction = false;

        foreach ($payment['history'] as $historyItem) {
            if (
                is_array($historyItem) &&
                ($historyItem['operation'] ?? null) === 'pay' &&
                ($historyItem['status'] ?? null) === 'SUCCESS' &&
                (string) ($historyItem['transactionResponseCode'] ?? '') === '00' &&
                ($historyItem['transactionId'] ?? null) === $transactionId &&
                ($historyItem['orderId'] ?? null) === $apiOrderId &&
                number_format(
                    (float) ($historyItem['amount'] ?? 0),
                    2,
                    '.',
                    ''
                ) === $orderAmount
            ) {
                $matchingTransaction = true;
                break;
            }
        }

        if (!$matchingTransaction) {
            throw new \RuntimeException(
                'No matching successful payment found in Kashier history.'
            );
        }

        \Illuminate\Support\Facades\DB::transaction(function () use (
            $order,
            $transactionId
        ) {
            $lockedOrder = Order::whereKey($order->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($lockedOrder->payment_status === 'paid') {
                if (
                    $lockedOrder->payment_transaction_id !== $transactionId
                ) {
                    throw new \RuntimeException(
                        'A different transaction is already recorded.'
                    );
                }

                return;
            }

            if (
                $lockedOrder->payment_status !== 'pending' ||
                $lockedOrder->stock_released_at !== null
            ) {
                throw new \RuntimeException(
                    'Order cannot be marked as paid.'
                );
            }

            $lockedOrder->update([
                'payment_status' => 'paid',
                'payment_transaction_id' => $transactionId,
                'paid_at' => now(),
            ]);
        });

        return response()->noContent(200);

    } catch (\Throwable $exception) {
        report($exception);

        return response()->json([
            'message' => 'Payment processing failed',
        ], 500);
    }
}



private function hasValidSignature(Request $request): bool
{
    $payload = $request->all();

    // Transaction webhook: payload is inside "data".
    if (isset($payload['data']) && is_array($payload['data'])) {
        return $this->hasValidTransactionSignature($payload['data'], $request);
    }

    // Transfer webhook: payload is at the root level.
    if (isset($payload['signatureKeys'])) {
        return $this->hasValidTransferSignature($payload, $request);
    }

    return false;
}


private function hasValidTransactionSignature(
    array $data,
    Request $request
): bool {
    $signatureKeys = $data['signatureKeys'] ?? null;
    $receivedSignature = $request->header('x-kashier-signature');
    $apiKey = config('services.kashier.api_key');

    if (
        !is_array($signatureKeys) ||
        empty($signatureKeys) ||
        !is_string($receivedSignature) ||
        $receivedSignature === '' ||
        !is_string($apiKey) ||
        $apiKey === ''
    ) {
        return false;
    }

    foreach ($signatureKeys as $key) {
        if (
            !is_string($key) ||
            !array_key_exists($key, $data) ||
            !is_scalar($data[$key])
        ) {
            return false;
        }
    }

    sort($signatureKeys, SORT_STRING);

    $signatureParts = [];

    foreach ($signatureKeys as $key) {
        $value = $data[$key];

        if (is_bool($value)) {
            $value = $value ? 'true' : 'false';
        } else {
            $value = (string) $value;
        }

        $signatureParts[] = $key . '=' . rawurlencode($value);
    }

    $signaturePayload = implode('&', $signatureParts);

    $expectedSignature = hash_hmac(
        'sha256',
        $signaturePayload,
        $apiKey
    );

    return hash_equals(
        strtolower($expectedSignature),
        strtolower($receivedSignature)
    );
}

private function hasValidTransferSignature(
    array $payload,
    Request $request
): bool {
    $signatureKeys = $payload['signatureKeys'] ?? null;
    $receivedSignature = $request->header('x-kashier-signature');
    $transferApiKey = config('services.kashier.transfer_api_key');

    if (
        !is_array($signatureKeys) ||
        empty($signatureKeys) ||
        !is_string($receivedSignature) ||
        $receivedSignature === '' ||
        !is_string($transferApiKey) ||
        $transferApiKey === ''
    ) {
        return false;
    }

    $signatureParts = [];

    foreach ($signatureKeys as $key) {
        if (
            !is_string($key) ||
            !array_key_exists($key, $payload) ||
            !is_scalar($payload[$key])
        ) {
            return false;
        }

        $signatureParts[] = $key . '=' . $payload[$key];
    }

    $signaturePayload = implode('&', $signatureParts);

    $expectedSignature = hash_hmac(
        'sha256',
        $signaturePayload,
        $transferApiKey
    );

    return hash_equals(
        strtolower($expectedSignature),
        strtolower($receivedSignature)
    );
}


}
