<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'category_id'
    ];


    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeForUser(Builder $query): Builder
    {
        return $query->where('user_id', auth()->id());
    }
}
