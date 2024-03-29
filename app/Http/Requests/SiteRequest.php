<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:4',
            'address' => 'required|min:10',
            'phone' => 'required|min:10',
        ];
    }
}
