<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {
    public function storeProduct(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_premium' => 'boolean',
        ]);

        Product::create([
            'name' => $validated['name'],
            'brand' => $validated['marca'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $request->file('image') ? $request->file('image')->store('images', 'public') : null,
            'is_premium' => $validated['is_premium'] ?? false,
        ]);

        return redirect()->route('admin')->with('success', 'Product created successfully!');
    }

    public function createRelation(Request $request) {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($validated['product_id']);
        $product->categories()->attach($validated['category_id']);

        return redirect()->route('admin')->with('success', 'Product-category relation created successfully!');
    }
}
