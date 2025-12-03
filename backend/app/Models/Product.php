<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ProductRating;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'name',
        'description',
        'image_url',
        'price',
        'quantity_available',
        'brand',
        'category',
        'sku',
        'is_available'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'quantity_available' => 'integer',
        'is_available' => 'boolean'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true)
                    ->where('quantity_available', '>', 0);
    }

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where(function($q) use ($searchTerm) {
            $q->where('name', 'LIKE', "%{$searchTerm}%")
              ->orWhere('description', 'LIKE', "%{$searchTerm}%")
              ->orWhere('brand', 'LIKE', "%{$searchTerm}%");
        });
    }
    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }

        // média simples
    public function getRatingAvgAttribute()
    {
         return $this->ratings()->avg('stars') ?: 0;
    }

    // quantidade de avaliações
    public function getRatingCountAttribute()
    {
        return $this->ratings()->count();
    }
    
    
}