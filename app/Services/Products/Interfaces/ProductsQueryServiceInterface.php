<?php

namespace App\Services\Products\Interfaces;

use App\Models\Products\Product;
use App\System\Exceptions\ItemDoesNotExistException;

interface ProductsQueryServiceInterface
{
    public function getAllProducts(): array;

    /**
     * @throws ItemDoesNotExistException
     */
    public function getProductById(int $id): Product;
}
