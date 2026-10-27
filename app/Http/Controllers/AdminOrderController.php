<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(){
        $data = Order::with('items.product')->orderBy('created_at', 'desc')->get();
        return view('AdminOrders.Admin_order_datails',['data'=>$data]);
    }
public function updateStatus(Request $request, string $id)
{
    $validated = $request->validate([
        'status' => 'required|in:pending,processing,completed',
    ]);

    $order = Order::findOrFail($id);

    $order->status = $validated['status'];
    $order->save();

    return response()->json([
        'success' => true,
        'status' => $order->status,
    ]);
}
}
