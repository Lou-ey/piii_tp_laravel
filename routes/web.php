<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// GET register form
Route::get('/register', function () {
    return view('register');
})->name('register.form');

// POST register
Route::post('/register', [AuthController::class, 'register'])->name('register');

// GET login form
Route::get('/login', function () {
    return view('login');
})->name('login.form');

// POST login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// admin page
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/admin/create', function () {
    return view('admin_create');
})->name('admin.create');
