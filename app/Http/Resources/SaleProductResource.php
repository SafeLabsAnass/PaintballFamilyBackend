<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleProductResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
//        $sale = Sale::where('id',$this->sale_id)->first();
        $product = Product::where('id',$this->product_id)->first();
        return [
            'id' => $this->id,
            'product' => $product->name,
            'price' => $product->price,
            'quantity' => $this->quantity,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
        ];
    }
}
