<?php

namespace App\Repository\Products;

use App\Models\Products\CreateProductDTO;
use App\Models\Products\UpdateProductDTO;
use App\Repository\Products\Interfaces\ProductsRepositoryInterface;
use App\Models\Products\Product;

class ProductsRepository implements ProductsRepositoryInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function getAllProducts(): array
    {
        return $this->product->all()->toArray();
    }

    public function getProductById(int $id): ?Product
    {
        return $this->product->find($id);
    }

    public function createProduct(CreateProductDTO $dto): Product
    {
        return $this->product->create([
            'name' => $dto->name,
            'price' => $dto->price,
            'category' => $dto->category
        ]);
    }

    public function updateProduct(UpdateProductDTO $dto): Product
    {
        $product = $this->product->find($dto->id);

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
        $product = $this->product->find($id);

        $product->delete();

        return $product;
    }
}
