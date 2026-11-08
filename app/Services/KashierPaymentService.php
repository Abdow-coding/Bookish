<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class KashierPaymentService
{
    public function createSession(Order $order): array
    {
$user = $order->users()->first();

if (!$user || !$user->email) {
    throw new RuntimeException('Customer email is required.');
}

        if (!$order->payment_reference) {
            throw new RuntimeException('Payment reference is missing.');
        }

        $response = Http::timeout(30)->withHeaders([
            'Authorization' => config('services.kashier.secret_key'),
            'api-key' => config('services.kashier.api_key'),
            'Content-Type' => 'application/json',
        ])->post(
            config('services.kashier.base_url') . '/v3/payment/sessions',
            [
                'expireAt' => now()->addMinutes(30)->toIso8601String(),
                'maxFailureAttempts' => 3,
                'amount' => number_format((float) $order->total_price, 2, '.', ''),
                'currency' => 'USD',
                'order' => $order->payment_reference,
                'merchantId' => config('services.kashier.merchant_id'),
                'merchantRedirect' => route('payment.callback'),

                'display' => 'en',
                'type' => 'one-time',
                'allowedMethods' => 'card,wallet',
                'customer' => [
    'email' => $user->email,
    'reference' => (string) $user->id,
],
            ]
        );

        if ($response->failed()) {
            throw new RuntimeException(
                'Kashier request failed: ' . $response->body()
            );
        }

        $data = $response->json();

        if (empty($data['sessionUrl']) || empty($data['_id'])) {
            throw new RuntimeException('Invalid response from Kashier.');
        }

        $order->update([
            'payment_session_id' => $data['_id'],
        ]);

        return [
            'session_url' => $data['sessionUrl'],
            'session_id' => $data['_id'],
        ];
    }


    public function getSession(Order $order): array
{
    if (!$order->payment_session_id) {
        throw new RuntimeException('Payment session ID is missing.');
    }

    $response = Http::timeout(30)->get(
        rtrim(config('services.kashier.base_url'), '/') .
        '/v3/payment/sessions/' .
        rawurlencode($order->payment_session_id)
    );

    if ($response->failed()) {
        throw new RuntimeException(
            'Kashier session retrieval failed: ' . $response->body()
        );
    }

    $responseData = $response->json();
    $data = $responseData['data'] ?? null;

    if (
        !is_array($data) ||
        ($data['_id'] ?? null) !== $order->payment_session_id ||
        empty($data['status'])
    ) {
        throw new RuntimeException('Invalid session data from Kashier.');
    }

    $sessionUrl = rtrim(config('services.kashier.checkout_url'), '/')
    . '/session/'
    . rawurlencode($data['_id'])
    . '?mode=test';

return [
    'session_id' => $data['_id'],
    'status' => $data['status'],
    'expire_at' => $data['expireAt'] ?? null,
    'session_url' => $sessionUrl,
];
}


public function getPaymentStatus(Order $order): array
{
    if (!$order->payment_session_id) {
        throw new RuntimeException('Payment session ID is missing.');
    }

    $response = Http::timeout(30)
        ->withHeaders([
            'Authorization' => config('services.kashier.secret_key'),
        ])
        ->get(
            rtrim(config('services.kashier.base_url'), '/') .
            '/v3/payment/sessions/' .
            rawurlencode($order->payment_session_id) .
            '/payment'
        );

    if ($response->failed()) {
        throw new RuntimeException(
            'Kashier payment status retrieval failed: ' .
            $response->body()
        );
    }

    $responseData = $response->json();
    $data = $responseData['data'] ?? null;

    if (
        !is_array($data) ||
        ($data['sessionId'] ?? null) !== $order->payment_session_id ||
        ($data['merchantOrderId'] ?? null) !== $order->payment_reference ||
        !isset($data['status'])
    ) {
        throw new RuntimeException('Invalid payment data from Kashier.');
    }

    return $data;
}

}
