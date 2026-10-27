<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
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

public function showUsers()
    {
        $data = DB::table('table_users')
            ->orderByDesc('id')
            ->get();

        return view('AdminUsers.Admin_users', compact('data'));
    }
}
