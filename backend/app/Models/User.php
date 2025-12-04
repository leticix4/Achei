<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ProductRating;
use App\Models\Store;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',           // pf ou pj
        'cpf',
        'birth_date',
        'gender',
        'phone',
        'phone_secondary',
        'zip_code',
        'address',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'reference',
        'role',           // user ou store
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birth_date' => 'date',
        ];
    }

    public function productRatings()
    {
        return $this->hasMany(ProductRating::class);
    }

    public function store()
    {
        return $this->hasOne(Store::class);
    }
}
