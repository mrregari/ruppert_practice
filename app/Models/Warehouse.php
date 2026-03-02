<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Практика 7 - Задание 10
class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
    ];

    // Практика 8 - Задание 7
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_warehouse')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
