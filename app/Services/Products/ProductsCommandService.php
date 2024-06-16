<?php

namespace App\Services\Products;

use App\Models\Products\CreateProductDTO;
use App\Models\Products\Product;
use App\Models\Products\UpdateProductDTO;
use App\Repository\Products\Interfaces\ProductsRepositoryInterface;
use App\Services\Products\Interfaces\ProductsCommandServiceInterface;
use App\System\Constants\ExceptionMessages;
use App\System\Exceptions\InvalidValueException;
use App\System\Exceptions\ItemDoesNotExistException;

class ProductsCommandService implements ProductsCommandServiceInterface
{
    protected $productRepository;

    public function __construct(ProductsRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createProduct(CreateProductDTO $dto): Product
    {
        if($dto->price <= 0) throw new InvalidValueException(ExceptionMessages::INVALID_PRODUCT_PRICE);

        return $this->productRepository->createProduct($dto);
    }

    public function updateProduct(UpdateProductDTO $dto): Product
    {
        if($dto->price <= 0) throw new InvalidValueException(ExceptionMessages::INVALID_PRODUCT_PRICE);

        if($this->productRepository->getProductById($dto->id) == null) throw new ItemDoesNotExistException(ExceptionMessages::PRODUCT_DOES_NOT_EXIST);

        return $this->productRepository->updateProduct($dto);
    }

    public function deleteProduct(int $id): Product
    {
        if($this->productRepository->getProductById($id) == null) throw new ItemDoesNotExistException(ExceptionMessages::PRODUCT_DOES_NOT_EXIST);

        return $this->productRepository->deleteProduct($id);
    }
}
