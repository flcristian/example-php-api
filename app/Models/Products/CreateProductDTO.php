<?php

namespace App\Models\Products;

class CreateProductDTO
{
    public $name;
    public $price;
    public $category;

    public function __construct(string $name, float $price, string $category)
    {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }


}
