<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Практика 6 - Задания 14, 15
class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Практика 8 - Задание 4
    public function users()
    {
        return $this->hasMany(User::class, 'cities_id');
    }
}
