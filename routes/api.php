<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\ProductsController;

Route::prefix('api/v1')->group(function () {
    Route::get('products', [ProductsController::class, 'getProducts']);
    Route::get('products/{id}', [ProductsController::class, 'getProduct']);
    Route::post('products', [ProductsController::class, 'createProduct']);
    Route::put('products/{id}', [ProductsController::class, 'updateProduct']);
    Route::delete('products/{id}', [ProductsController::class, 'deleteProduct']);
});
