<?php

namespace App\Services\Products\Interfaces;

use App\Models\Products\CreateProductDTO;
use App\Models\Products\Product;
use App\Models\Products\UpdateProductDTO;
use App\System\Exceptions\InvalidValueException;
use App\System\Exceptions\ItemDoesNotExistException;

interface ProductsCommandServiceInterface
{
    /**
     * @throws InvalidValueException
     */
    public function createProduct(CreateProductDTO $dto): Product;

    /**
     * @throws ItemDoesNotExistException
     * @throws InvalidValueException
     */
    public function updateProduct(UpdateProductDTO $dto): Product;

    /**
     * @throws ItemDoesNotExistException
     */
    public function deleteProduct(int $id): Product;
}
