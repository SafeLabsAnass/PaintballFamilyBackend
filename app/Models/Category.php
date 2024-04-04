<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public static function where(string $string, int $id)
    {
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }


//    /**
//     * @param Builder $query
//     * @return Builder
//     */
//    public function scopeForUser(Builder $query): Builder
//    {
//        return $query->where('user_id', auth()->id());
//    }

//    /**
//     * @param Builder $query
//     * @param array $ids
//     * @return Collection
//     */
//    public function scopeForUserByIds(Builder $query, array $ids): Collection
//    {
//        return $query->find($ids)->where('user_id', auth()->id());
//    }
}
