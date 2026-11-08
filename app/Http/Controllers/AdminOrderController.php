<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderController extends Controller
{
    public function index()
    {
        $data = Order::with('items.product')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('AdminOrders.Admin_order_datails', [
            'data' => $data
        ]);
    }

    public function updateStatus(Request $request, string $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed',
        ]);

        $order = DB::transaction(function () use ($validated, $id) {

            $order = Order::whereKey($id)
                ->lockForUpdate()
                ->firstOrFail();

            $order->status = $validated['status'];

            $paymentMethod = strtolower(
                trim($order->payment_method ?? '')
            );

            $paymentMethod = str_replace(
                [' ', '-'],
                '_',
                $paymentMethod
            );

            $cashMethods = [
                'cash',
                'cash_on_delivery'
            ];

            if (
                in_array($paymentMethod, $cashMethods, true) &&
                $validated['status'] === 'completed'
            ) {
                $order->payment_status = 'paid';
            }

            $order->save();

            return $order;
        });

        return response()->json([
            'success' => true,
            'status' => $order->status,
            'payment_status' => $order->payment_status,
        ]);
    }
}
