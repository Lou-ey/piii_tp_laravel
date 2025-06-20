<?php

namespace App\Http\Controllers;

use App\Models\AlternativeRelation;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Foundation\Configuration\Exceptions;

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
            'is_premium' => 'nullable|boolean',
            'original_product_id' => 'nullable|exists:products,id',
        ]);

        if($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('prod_imgs', 'public');
        } else {
            $imagePath = null;
        }

        $isPremium = $request->boolean('is_premium');

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

        // Se for produto alternativo cria a relação
        if (!$isPremium && $request->filled('original_product_id')) {
            AlternativeRelation::create([
                'premium_product_id' => $validated['original_product_id'],
                'alternative_product_id' => $product->id,
            ]);
            // dd($alternativeRelations);
        }

        // se estiver tudo ok
        if ($product) {
            return redirect()->route('admin')->with('success', 'Produto adicionado com sucesso!');
        } else {
            return redirect()->route('admin')->with('error', 'Erro ao adicionar o produto.');
        }
    }

    public function showProducts() {
        $products = Product::where('is_premium', true)->get();
        return view('products', [
            'products' => $products,
            'category' => null // para a view saber que não há categoria específica
        ]);
    }

    public function showProductsByCategory($id) {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)
            ->where('is_premium', true)
            ->get();

        return view('products', [
            'products' => $products,
            'category' => $category
        ]);
    }

    public function showProductDetails($id) {
        $product = Product::with('category')->findOrFail($id);

        $alternatives = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get();

        $reviews = $product->reviews()->with('user')->get();

        // Se o utilizador autenticado já fez review
        $userReviewed = null;
        if (auth()->check()) {
            $userReviewed = $product->reviews()->where('user_id', auth()->id())->first(); //
        }

        return view('product_details', compact('product', 'alternatives', 'reviews', 'userReviewed'));
    }


    public function searchProducts(Request $request) {
        $query = $request->input('query');

        $products = Product::where(function ($q) use ($query) {
            $q->where('name', 'ILIKE', '%' . $query . '%')
            ->orWhere('brand', 'ILIKE', '%' . $query . '%')
                ->orWhere('description', 'ILIKE', '%' . $query . '%');
        })->get();

        return view('products', [
            'products' => $products,
            'category' => null
        ]);
    }


    public function getAlternativeProductsByOriginalProductId($originalProductId) {
        $alternativeProducts = AlternativeRelation::where('premium_product_id', $originalProductId)
            ->with('alternativeProduct')
            ->get()
            ->pluck('alternativeProduct');

        return response()->json($alternativeProducts);
    }
}
