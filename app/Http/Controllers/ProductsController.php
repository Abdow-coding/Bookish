<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductValidationRequest;
use App\Models\Product;
use App\Models\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Product::where('condition','New')->orderBy('id','desc')->get();
        return view('AdminProducts.Products_page',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminProducts.Add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(ProductValidationRequest $request)
{
    try{
         $validated = $request->validated();

    $cover = $request->file('cover');

    $coverName = time() . '_' . $cover->getClientOriginalName();

    $cover->move(public_path('assets/images/'), $coverName);

    Product::create([
        'cover'     => $coverName,
        'title'     => $validated['title'],
        'author'    => $validated['author'],
        'category'  => $validated['category'],
        'price'     => $validated['price'],
        'stock'     => $validated['stock'],
        'condition' => $validated['condition'],
        'status'    => $validated['status'],
        'description'    => $validated['description'],
    ]);

    return redirect()
        ->route('Product')
        ->with('success', 'Product added successfully.');

    }
    catch (Exception $e){
        echo 'The Error is'.$e->getMessage();

    }

}

    /**
     * Display the specified resource.
     */
    public function show()
{
    $data = Product::where('status', 'active')->orderBy('id','desc')->get();

    return view('shop_page', ['data' => $data]);
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Product::find($id);
        return view('AdminProducts.Update_product_page',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductValidationRequest $request, string $id)
{
    $product = Product::findOrFail($id);

    $validated = $request->validated();

    if ($request->hasFile('cover')) {
        $cover = $request->file('cover');

        $coverName = time() . '_' . $cover->getClientOriginalName();

        $cover->move(public_path('assets/images/'), $coverName);

        $validated['cover'] = $coverName;
    } else {
        unset($validated['cover']);
    }

    $product->update($validated);

    return redirect()
        ->route('Product')
        ->with('success', 'Product updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product =Product::find($id);
        $product->delete();
        return redirect()->route('Product')->with('Delete','Product Deleted Successfully');
    }
   public function details(string $id)
{
    $product = Product::where('status', 'active')
        ->findOrFail($id);

    return view('One_product_layout', ['product' => $product]);
}

 public function search(Request $request)
{
    $query = Product::where('status', 'active');

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%")
              ->orWhere('author', 'LIKE', "%{$search}%")
              ->orWhere('category', 'LIKE', "%{$search}%")
              ->orWhere('price', 'LIKE', "%{$search}%");
        });
    }

    if ($request->filled('condition')) {
        $query->where('condition', $request->condition);
    }

    $products = $query->get();

    return response()->json($products);
}

public function usedbooks (){
    $data=Product::where('condition','Used')->get();
    return view('AdminProducts.Used_products', compact('data'));
}




public function sell(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric|min:0.01',
            'stock' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'cover' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $coverName = uniqid() . '.' . $request->file('cover')->extension();

        $request->file('cover')->move(
            public_path('assets/images'),
            $coverName
        );

        $product = $request->user()->products()->create([
            'cover' => $coverName,
            'title' => $validated['title'],
            'author' => $validated['author'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'condition' => 'Used',
            'status' => 'Non Active',
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->back()->with(
            'success',
            'Your book has been submitted successfully and is waiting for admin approval.'
        );
    }

    public function listing()
    {
         $products = Auth::user()
            ->products()
            ->latest()
            ->get();

        return view('my-listings', compact('products'));
    }
}

