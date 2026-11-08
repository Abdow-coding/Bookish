<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\KashierPaymentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserOrders extends Controller
{
    public function myOrders()
    {
        $data = Order::with('items.product')
            ->where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('My_orders', compact('data'));
    }


public function retryPayment(
    int $orderId,
    KashierPaymentService $kashierPaymentService
) {
    $order = Order::where('user_id', Auth::id())
        ->findOrFail($orderId);

    if (
        $order->payment_method !== 'kashier' ||
        $order->payment_status !== 'pending' ||
        $order->stock_released_at !== null
    ) {
        return back()->with(
            'error',
            'This order cannot be paid again.'
        );
    }

    try {
        if ($order->payment_session_id) {

            $payment = $kashierPaymentService->getPaymentStatus($order);

            $paymentAmount = number_format(
                (float) ($payment['amount'] ?? 0),
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
                $paymentAmount !== $orderAmount ||
                strtoupper((string) ($payment['currency'] ?? '')) !== 'USD'
            ) {
                throw new \RuntimeException(
                    'Payment amount or currency does not match the order.'
                );
            }

            if (
                strtoupper($payment['status']) === 'PAID' ||
                (float) ($payment['capturedAmount'] ?? 0) > 0 ||
                ($payment['hasSuccessfulAuthorization'] ?? false) === true
            ) {
                return back()->with(
                    'error',
                    'Payment may already have been completed. Please wait for verification.'
                );
            }

            if (strtoupper($payment['status']) !== 'EXPIRED') {

                $session = $kashierPaymentService->getSession($order);

                if (
                    $session['status'] === 'OPENED' &&
                    $session['expire_at'] &&
                    \Illuminate\Support\Carbon::parse(
                        $session['expire_at']
                    )->isFuture()
                ) {
                    return redirect()->away($session['session_url']);
                }

                return back()->with(
                    'error',
                    'The payment session is not available for retry yet.'
                );
            }
        }

        $session = $kashierPaymentService->createSession($order);

        return redirect()->away($session['session_url']);

    } catch (\Throwable $exception) {
        report($exception);

        return back()->with(
            'error',
            'Unable to process the payment session. Please try again later.'
        );
    }
}


    public function showUsers()
    {
        $data = DB::table('table_users')
            ->orderByDesc('id')
            ->get();

        return view('AdminUsers.Admin_users', compact('data'));
    }
}
