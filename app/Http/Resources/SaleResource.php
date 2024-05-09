<?php

namespace App\Http\Resources;

use App\Models\Payment;
use App\Models\SaleProduct;
use App\Models\Site;
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
        $site = Site::where('id',$user->site_id)->first();
        return [
            'id' => $this->id,
            'matricule' => $this->matricule,
            'facture_id' => $this->facture_id,
            'user' => $user->username,
            'adresse' => $site->adresse,
            'payment_type' => $payment->type,
            'amount_given' => $this->amount_given,
            'income' => $this->income,
            'client_name' => $this->client_name,
            'total_amount' => $this->total_amount,
            'status' => $this->status,
            'total_paid' => $this->total_paid,
            'created_at' => $this->created_at,
            'sales_products' => SaleProductResource::collection($this->salesProducts),
        ];
    }
}
