<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
             'phone' => $this->phone,
            'address' => $this->address,
            'created_at' => $this->created_at,
            'categories' => SiteCategoryResource::collection($this->sitesCategories),
            'users' => AuthResource::collection($this->users),
        ];
    }
}
