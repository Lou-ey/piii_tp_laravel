<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// Mostrar o formulário
Route::get('/register', function () {
    return view('register');
})->name('register.form');

// Submeter o formulário
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Mostrar login
Route::get('/login', function () {
    return view('login');
})->name('login.form');

// Submeter login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Página admin
Route::get('/admin', function () {
    return view('admin');
})->name('admin');
