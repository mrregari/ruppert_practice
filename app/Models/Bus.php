<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = ['registration_number', 'model', 'seats'];
    
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}