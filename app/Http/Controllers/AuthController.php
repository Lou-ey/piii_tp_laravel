<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function register(Request $request) {
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

        return redirect()->route('login')->with('success', 'Registration successful!'); // Redirect to admin page after registration
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->is_admin === true) {
                return redirect()->route('admin')->with('success', 'Login as admin successful!');
            }

            return redirect()->route('home')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'The provided credentials are invalid.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }

    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin');
        } else if (Auth::check() && !Auth::user()->is_admin) {
            return redirect()->route('home');
        }

        // Se não for admin
        return view('login');
    }

    public function showRegisterForm()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin');
        } else if (Auth::check() && !Auth::user()->is_admin) {
            return redirect()->route('home');
        }

        return view('register');
    }
}
