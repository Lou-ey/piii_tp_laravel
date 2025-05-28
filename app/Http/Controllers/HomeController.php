<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
        $originalProducts = Product::where('is_premium', true)->get();
        $products = Product::all();
        $categories = Category::all();
        return view('home', compact('originalProducts', 'products', 'categories'));
    }
}
