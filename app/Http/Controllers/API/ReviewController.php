<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller {
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        if ($request->user()->reviews()->where('product_id', $productId)->exists()) {
            return response()->json(['error' => 'You have already reviewed this product.'], 403);
        }

        $review = Review::create([
            'user_id' => $request->user()->id,
            'product_id' => $productId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return response()->json($review, 201);
    }

    public function index($productId)
    {
        $reviews = Review::with('user')->where('product_id', $productId)->get();
        return response()->json($reviews);
    }
}
