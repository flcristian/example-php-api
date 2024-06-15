<?php

namespace App\Repository\Products\Interfaces;

use App\Models\Products\CreateProductDTO;
use App\Models\Products\Product;
use App\Models\Products\UpdateProductDTO;

interface ProductsRepositoryInterface
{
    public function getAllProducts(): array;
    public function getProductById(int $id): ?Product;
    public function createProduct(CreateProductDTO $dto): Product;
    public function updateProduct(UpdateProductDTO $dto): Product;
    public function deleteProduct(int $id): Product;
}
