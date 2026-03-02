<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Практика 6 - Задания 7, 8, 9, 10, 11
class User extends Model
{
    use HasFactory;

    // Практика 7 - Задания 4-19
    protected $fillable = [
        'first_name',
        'second_name',
        'birth_date',
        'age',
        'email',
        'avatar',
        'salary',
        'is_admin',
        'cities_id',
    ];

    protected $casts = [
        'birth_date' => 'datetime',
        'is_admin' => 'boolean',
    ];

    // Практика 8 - Задание 1
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // Практика 8 - Задание 2
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Практика 8 - Задание 3
    public function city()
    {
        return $this->belongsTo(City::class, 'cities_id');
    }
}
