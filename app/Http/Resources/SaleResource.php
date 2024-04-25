<?php

namespace App\Http\Resources;

use App\Models\Payment;
use App\Models\SaleProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SaleResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        $payment = Payment::where('id',$this->payment_id)->first();
        $user = User::where('id',$this->user_id)->first();
        return [
            'id' => $this->id,
            'matricule' => $this->matricule,
            'user' => $user->username,
            'payment_type' => $payment->type,
            'client_name' => $this->client_name,
            'total_paid' => $this->total_paid,
            'created_at' => $this->created_at,
            'sales_products' => SaleProductResource::collection($this->salesProducts),

        ];
    }
}
