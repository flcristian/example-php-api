<?php

namespace App\Models\Products;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function rules() {
        return [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string'
        ];
    }

    public function validatedDTO(): CreateProductDTO {
        return new CreateProductDTO(
            $this->input('name'),
            $this->input('price'),
            $this->input('category')
        );
    }
}
