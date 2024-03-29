<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiteCategoryResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        $site = Site::where('id',$this->site_id)->first();
        $category = Category::where('id',$this->category_id)->first();
        return [
            'id' => $this->id,
            'category' => $category->name,
            'created_at' => $this->created_at,
        ];
    }
}
