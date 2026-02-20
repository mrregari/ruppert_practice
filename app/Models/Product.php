<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'is_active',
    ];


    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeExpensive($query, $price)
    {
        return $query->where('price', '>=', $price);
    }

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'options' => 'array',
    ];
}
