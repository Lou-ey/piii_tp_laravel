<?php

use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json(['message' => 'API está a funcionar']);
});

Route::get('/products', [ProductController::class, 'index']);




