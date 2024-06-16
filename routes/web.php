<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\ProductsController;

Route::prefix('api/v1')->group(function () {
    Route::get('products/all', [ProductsController::class, 'getProducts']);
    Route::get('products/product/{id}', [ProductsController::class, 'getProduct']);
    Route::post('products/create', [ProductsController::class, 'createProduct']);
    Route::put('products/update', [ProductsController::class, 'updateProduct']);
    Route::delete('products/delete/{id}', [ProductsController::class, 'deleteProduct']);
});

Route::get('/', function () {
    return view('welcome');
});
