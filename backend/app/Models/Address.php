<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'street',
        'zip_code',
        'number',
        'complement',
        'landmark',
        'neighborhood',
        'city',
        'state',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
