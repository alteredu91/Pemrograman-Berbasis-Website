<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Store $store)
    {
        $products = $store->products()->latest()->paginate(12);
        return view('products.index', compact('store', 'products'));
    }

    public function create(Store $store)
    {
        return view('products.create', compact('store'));
    }

    public function store(Request $request, Store $store)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['name']);
        $validated['store_id'] = $store->id;

        Product::create($validated);

        return redirect()->route('stores.products.index', $store)
            ->with('success', 'Product created successfully.');
    }

    public function show(Store $store, Product $product)
    {
        return view('products.show', compact('store', 'product'));
    }

    public function edit(Store $store, Product $product)
    {
        return view('products.edit', compact('store', 'product'));
    }

    public function update(Request $request, Store $store, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $validated['slug'] = Str::slug($validated['name']);
        $product->update($validated);

        return redirect()->route('stores.products.index', $store)
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Store $store, Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();

        return redirect()->route('stores.products.index', $store)
            ->with('success', 'Product deleted successfully.');
    }
}