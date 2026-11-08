<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckOutValidationRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Services\KashierPaymentService;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $data = Cart::with('product')
        ->where('user_id', Auth::id())
        ->get();

    if ($data->isEmpty()) {
        return redirect()
            ->route('cart.index')
            ->with('error', 'Your Cart is Empty');
    }

    $unavailable = $data->contains(function ($item) {
        return !$item->product ||
            $item->product->status !== 'Active';
    });

    if ($unavailable) {
        return redirect()
            ->route('cart.index')
            ->with('error', 'One or more books are currently unavailable. Please review your order.');
    }

    $total = $data->sum(function ($item) {
        return $item->product->price * $item->quantity;
    });

    return view('checkout_page', [
        'data' => $data,
        'total' => $total,
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */

public function store(CheckOutValidationRequest $request,KashierPaymentService $kashierPaymentService)

{
    $userId = Auth::id();

    $validated = $request->validated();

    $order = DB::transaction(function () use ($request, $userId, $validated) {

        $cartItems = Cart::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            throw ValidationException::withMessages([
                'cart' => 'Your cart is empty.',
            ]);
        }

        $products = collect();
        $total = 0;

        foreach ($cartItems as $item) {
            $product = Product::whereKey($item->product_id)
                ->lockForUpdate()
                ->first();

            if (!$product) {
                throw ValidationException::withMessages([
                    'stock' => 'A product in your cart no longer exists.',
                ]);
            }

            if (strtolower(trim($product->status)) !== 'active') {
                throw ValidationException::withMessages([
                    'status' => "The book '{$product->title}' is currently unavailable.",
                ]);
            }

            if ($item->quantity <= 0 || $product->stock < $item->quantity) {
                throw ValidationException::withMessages([
                    'stock' => "Insufficient stock for {$product->title}. Available: {$product->stock}.",
                ]);
            }

            $products->put($item->id, $product);
            $total += $product->price * $item->quantity;
        }

        $order = Order::create([
    'user_id' => $userId,
    'payment_reference' => 'BOOKISH-' . strtoupper((string) Str::uuid()),

    'first_name' => $validated['first_name'],
    'last_name' => $validated['last_name'],
    'phone' => $validated['phone'],
    'country' => $validated['country'],
    'city' => $validated['city'],
    'address' => $validated['address'],
    'address_details' => $validated['address_details'] ?? null,
    'notes' => $validated['notes'] ?? null,
    'total_price' => $total,
    'order_date' => now(),
    'payment_method' => $validated['payment_method'],
    'payment_status' => 'pending',
]);

        foreach ($cartItems as $item) {
            $product = $products->get($item->id);

            $order->items()->create([
                'product_id' => $product->id,
                'quantity' => $item->quantity,
                'unit_price' => $product->price,
            ]);

            $product->decrement('stock', $item->quantity);
        }

        Cart::where('user_id', $userId)->delete();

        return $order;
    });

    if ($order->payment_method === 'kashier') {
    $session = $kashierPaymentService->createSession($order);

    return redirect()->away($session['session_url']);
}

return redirect()->route('thankyou', [
    'id' => $order->id,
]);
}




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function thankyou( string $id)
{
    $order = Order::with('items.product')
        ->where('user_id', Auth::id())
        ->findOrFail($id);

    return view('Thank_you', compact('order'));
}
}
