<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_id',
        'client_name',
        'name',

    ];
    public function salesProducts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SaleProduct::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
