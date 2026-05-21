<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['number_trip', 'bus_id', 'route_id', 'departure_date', 'arrival_date'];
    
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
    
    public function route()
    {
        return $this->belongsTo(Route::class);
    }
}