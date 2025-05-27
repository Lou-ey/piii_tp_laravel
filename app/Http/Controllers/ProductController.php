<?php

namespace App\Http\Controllers;

use App\Models\AlternativeRelation;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
    public function storeProduct(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|image|max:2048',
            'original_product_id' => 'nullable|exists:products,id',
            'is_premium' => 'nullable|boolean',
        ]);

        if($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('prod_imgs', 'public');
        } else {
            $imagePath = null;
        }

        $isPremium = $request->boolean('is_premium'); // da

        // Criar produto
        $product = Product::create([
            'name' => $validated['name'],
            'brand' => $validated['brand'],
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'img_url' => $imagePath,
            'is_premium' => $isPremium,
        ]);
        // dd($product);

        // Se for produto alternativo, cria a relação
        if (!$isPremium && $request->filled('original_product_id')) {
            AlternativeRelation::create([
                'product_id' => $validated['original_product_id'],
                'alternative_id' => $product->id,
            ]);
        }

        return redirect()->route('admin')->with('success', 'Produto adicionado com sucesso!');
    }
}
