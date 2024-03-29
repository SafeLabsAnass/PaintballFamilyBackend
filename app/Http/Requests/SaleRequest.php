<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'client_name' => 'required|min:4',
            'amount' => 'required|numeric',
            'user_id' => 'required|numeric',
            'payment_id' => 'required|numeric',
        ];
    }
}
