<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['number_route', 'start_stop', 'end_stop', 'price'];
    
    public function trips()
    {
        return $this->hasMany(Trip::class)->select('id', 'number_trip', 'departure_date', 'arrival_date', 'bus_id', 'route_id');
    }
}