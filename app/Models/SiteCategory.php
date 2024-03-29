<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'category_id',
    ];
    public $table = 'sites_categories';
//    public function categories(): \Illuminate\Database\Eloquent\Relations\HasMany
//    {
//        return $this->hasMany(Category::class);
//    }
}
