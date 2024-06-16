<?php

namespace App\Services\Products;

use App\Models\Products\Product;
use App\Repository\Products\Interfaces\ProductsRepositoryInterface;
use App\Services\Products\Interfaces\ProductsQueryServiceInterface;
use App\System\Constants\ExceptionMessages;
use App\System\Exceptions\ItemDoesNotExistException;

class ProductsQueryService implements ProductsQueryServiceInterface
{
    protected $productRepository;

    public function __construct(ProductsRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts(): array
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductById(int $id): Product
    {
        $product = $this->productRepository->getProductById($id);

        if($product == null) throw new ItemDoesNotExistException(ExceptionMessages::PRODUCT_DOES_NOT_EXIST);

        return $product;
    }
}
