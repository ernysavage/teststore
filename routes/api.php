<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;



Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('public')->group(function () {
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{slug}', [ProductController::class, 'show']);
    Route::get('product_categories', [ProductCategoryController::class, 'index']);
    Route::get('public/product_categories-with-products', [ProductCategoryController::class, 'withProducts']);

});


Route::prefix('admin')->middleware('auth:api')->group(function () {
    
    Route::post('product_categories', [ProductCategoryController::class, 'store']);
    Route::put('product_categories/{category}', [ProductCategoryController::class, 'update']);
    Route::delete('product_categories/{category}', [ProductCategoryController::class, 'destroy']);

    
    Route::post('products', [ProductController::class, 'store']);
    Route::put('products/{product}', [ProductController::class, 'update']);
    Route::delete('products/{product}', [ProductController::class, 'destroy']);
});
