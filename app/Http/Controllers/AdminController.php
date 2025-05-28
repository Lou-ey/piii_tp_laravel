<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!auth()->check() || !auth()->user()->is_admin) {
            //abort(403, 'Acesso não autorizado.');
            return redirect()->route('login');
        }

        $users = User::all();
        $categories = Category::all();
        $originalProducts = Product::where('is_premium', true)->get();
        $products = Product::all();
        return view('admin', compact('users', 'categories', 'originalProducts', 'products'));
    }

    public function storeUser(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'is_admin' => 'boolean',
        ]);

        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_admin' => $validated['is_admin'] ?? false,
        ]);

        return redirect()->route('admin')->with('success', 'User created successfully!');
    }
}
