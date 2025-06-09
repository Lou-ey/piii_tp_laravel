<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json(['message' => 'API está a funcionar']);
});

Route::get('/get/products', [ProductController::class, 'index'])->name('api.products.index'); // List all products

Route::get('/get/products/{id}', [ProductController::class, 'show'])->name('api.products.show'); // Show a specific product by ID

Route::get('/get/products/category/{id}', [ProductController::class, 'showProductsByCategory'])->name('api.products.category'); // Show products by category ID

Route::get('/get/categories', [CategoryController::class, 'index'])->name('api.categories.index');

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::get('/products/{id}/reviews', [ReviewController::class, 'index'])->name('api.products.reviews.index');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/products/{id}/reviews', [ReviewController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
});
