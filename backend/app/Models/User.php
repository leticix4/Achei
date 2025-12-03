<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ProductRating;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'cpf',
        'birth_date',
        'gender',
        'cnpj',
        'fantasy_name',
        'state_registration',
        'contact_name',
        'contact_cpf',
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
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
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
}
