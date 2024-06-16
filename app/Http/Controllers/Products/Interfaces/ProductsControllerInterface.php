<?php

namespace App\Http\Controllers\Products\Interfaces;

use App\Models\Products\CreateProductRequest;
use App\Models\Products\UpdateProductRequest;
use Illuminate\Http\JsonResponse;

interface ProductsControllerInterface
{
    public function getProducts(): JsonResponse;
    public function getProduct(int $id): JsonResponse;
    public function createProduct(CreateProductRequest $request): JsonResponse;
    public function updateProduct(UpdateProductRequest $request): JsonResponse;
    public function deleteProduct(int $id): JsonResponse;
}
