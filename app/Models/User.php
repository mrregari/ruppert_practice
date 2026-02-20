<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
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
}
