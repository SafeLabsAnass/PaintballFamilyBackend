<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'username',
        'phone',
        'gender',
        'email',
        'avatar',
        'password',
        'site_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    /**
//     * @return HasMany
//     */
//    public function categories(): HasMany
//    {
//        return $this->hasMany(Category::class);
//    }
//    public function categories_products(): HasMany
//    {
//        return $this->hasMany(CategoryProduct::class);
//    }

//    /**
//     * @return HasMany
//     */
//    public function products(): HasMany
//    {
//        return $this->hasMany(Product::class);
//    }
}
