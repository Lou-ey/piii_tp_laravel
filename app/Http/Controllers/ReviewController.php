<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller {
    public function storeReview(Request $request, $product_id) {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $user_id = auth()->id();

        if (Review::where('user_id', $user_id)->where('product_id', $product_id)->exists()) {
            return redirect()->route('productDetails', ['id' => $product_id])
                ->with('error', 'Já deixaste uma review para este produto.');
        }

        Review::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->route('productDetails', ['id' => $product_id])
                         ->with('success', 'Review added successfully!');
    }
}
