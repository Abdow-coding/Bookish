<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('Cart.cart_page', [
            'data' => $cartItems,
            'total' => $total,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'sometimes|integer|min:1',
        ]);

        $userId = Auth::id();
        $quantity = $validated['quantity'] ?? 1;

        try {
            $cartItem = DB::transaction(function () use ($validated, $userId, $quantity) {
                $product = Product::whereKey($validated['product_id'])
                    ->lockForUpdate()
                    ->firstOrFail();
                $cartItem = Cart::where('user_id', $userId)
                    ->where('product_id', $product->id)
                    ->first();

                $newQuantity = ($cartItem?->quantity ?? 0) + $quantity;

                if ($newQuantity > $product->stock) {
                    throw new \RuntimeException('Not enough stock available.');
                }

                if ($cartItem) {
                    $cartItem->increment('quantity', $quantity);
                } else {
                    $cartItem = Cart::create([
                        'user_id' => $userId,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                    ]);
                }

                return $cartItem;
            });


return response()->json([
    'success' => true,
    'message' => $cartItem->product->title . ' added successfully!',
    'cart_count' => Cart::where('user_id', Auth::id())
        ->sum('quantity'),
]);

        } catch (\RuntimeException $e) {

return response()->json([
    'success' => false,
    'message' => $e->getMessage(),
], 422);

        }
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::with('product')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        if ($validated['quantity'] > $cartItem->product->stock) {
            return response()->json([
                'success' => false,
                'message' => 'Not enough stock available.',
            ], 422);
        }

        $cartItem->update([
            'quantity' => $validated['quantity'],
        ]);

        $subtotal = $cartItem->quantity * $cartItem->product->price;

        $total = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get()
            ->sum(function ($item) {
                return $item->quantity * $item->product->price;
            });

        return response()->json([
    'success' => true,
    'quantity' => $cartItem->quantity,
    'subtotal' => $subtotal,
    'total' => $total,
    'cart_count' => Cart::where('user_id', Auth::id())->sum('quantity'),
]);
    }

    public function destroy(string $id)
{
    $cartItem = Cart::where('user_id', Auth::id())
        ->findOrFail($id);

    $cartItem->delete();

    $cartItems = Cart::with('product')
        ->where('user_id', Auth::id())
        ->get();

    $total = $cartItems->sum(function ($item) {
        return $item->quantity * $item->product->price;
    });

    return response()->json([
        'success' => true,
        'message' => 'Product deleted successfully',
        'id' => $id,
        'cart_count' => $cartItems->sum('quantity'),
        'total' => $total,
    ]);
}
}
