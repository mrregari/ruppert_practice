<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Практика 7 - Задания 2, 13, 18
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

    // Практика 8 - Задание 6
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    // Практика 8 - Задание 7
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class, 'product_warehouse')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
