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
        'country_id',
    ];

    // Практика 8 - Задание 4
    public function users()
    {
        return $this->hasMany(User::class, 'cities_id');
    }

    // Практика 8 - Задание 18-20
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
