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
        'login',
        'password',
        'name',
        'city_id',
        'position_id',
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

    // Практика 8 - Задание 3 (profile)
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Практика 8 - Задание 24 (country через city)
    public function country()
    {
        return $this->belongsTo(Country::class, 'city_id');
    }

    // Практика 8 - Задание 24 (position)
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    // Практика 8 - Задание 26-28 (roles)
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
