<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleProductRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'sale_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            ];
    }
}
