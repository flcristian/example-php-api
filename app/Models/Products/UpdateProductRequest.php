<?php

namespace App\Models\Products;

class UpdateProductRequest extends FormRequest
{
    public function rules() {
        return [
            'id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string'
        ];
    }

    public function validatedDTO(): UpdateProductDTO {
        return new UpdateProductDTO(
            $this->input('id'),
            $this->input('name'),
            $this->input('price'),
            $this->input('category')
        );
    }
}
