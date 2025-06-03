<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function show($id) {
        $product = Product::with('alternatives')->find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    function showProductsByCategory($id) {
        $products = Product::where('category_id', $id)->get();
        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found for this category'], 404);
        }
        return response()->json($products);
    }
}

