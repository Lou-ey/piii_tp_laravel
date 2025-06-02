<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;

//Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
//});


Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin');
    Route::post('/admin/users', [AdminController::class, 'storeUser'])->name('admin.storeUser');
    Route::post('/admin/categories', [CategoryController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::post('/admin/products', [ProductController::class, 'storeProduct'])->name('admin.storeProduct');
    Route::delete('/admin/delete-user/{id}', [AdminController::class, 'removeUser'])->name('admin.removeUser');
});

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/home/products/search', [ProductController::class, 'searchProducts'])->name('searchProducts');
Route::get('/home/products', [ProductController::class, 'showProducts'])->name('showProducts');
Route::get('/home/category/{id}/products', [ProductController::class, 'showProductsByCategory'])->name('productsByCategory');
Route::get('/home/products/{id}', [ProductController::class, 'showProductDetails'])->name('productDetails');
Route::post('/products/{productId}/review', [ReviewController::class, 'storeReview'])->name('product.review');
