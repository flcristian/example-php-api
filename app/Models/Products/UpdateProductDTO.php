<?php

namespace App\Models\Products;

class UpdateProductDTO
{
    public $id;
    public $name;
    public $price;
    public $category;

    public function __construct(int $id, string $name, float $price, string $category) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }
}
