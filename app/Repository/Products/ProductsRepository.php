<?php

namespace App\Repository\Products;

use App\Models\Products\CreateProductDTO;
use App\Models\Products\Product;
use App\Models\Products\UpdateProductDTO;
use App\Repository\Products\Interfaces\ProductsRepositoryInterface;

class ProductsRepository implements ProductsRepositoryInterface
{
    public function getAllProducts(): array
    {
        return Product::all()->toArray();
    }

    public function getProductById(int $id): ?Product
    {
        return Product::find($id);
    }

    public function createProduct(CreateProductDTO $dto): Product
    {
        return Product::create([
            'name' => $dto->name,
            'price' => $dto->price,
            'category' => $dto->category
        ]);
    }

    public function updateProduct(UpdateProductDTO $dto): Product
    {
        $product = Product::find($dto->id);

        $product->fill([
            'name' => $dto->name,
            'price' => $dto->price,
            'category' => $dto->category
        ]);

        $product->save();

        return $product;
    }

    public function deleteProduct(int $id): Product
    {
        $product = Product::find($id);

        $product->delete();

        return $product;
    }
}
