<?php

namespace App\Http\Controllers;
use App\Models\AlternativeRelation;
use Illuminate\Http\Request;

class AlternativeRelationController extends Controller {
    /*public function storeAlternativeRelation(Request $Request) {
        $validated = $Request->validate([
            'product_id' => 'required|exists:products,id',
            'alternative_id' => 'required|exists:products,id',
        ]);

        AlternativeRelation::create([
            'product_id' => $validated['product_id'],
            'alternative_id' => $validated['alternative_id'],
        ]);

        return redirect()->route('admin')->with('success', 'Alternative relation created successfully!');
    }*/
}
