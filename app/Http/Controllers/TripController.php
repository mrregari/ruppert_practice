<?php
namespace App\Http\Controllers;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'number_trip' => 'required|string|unique:trips',
            'bus_id' => 'required|exists:buses,id',
            'route_id' => 'required|exists:routes,id',
            'departure_date' => 'required|date',
            'arrival_date' => 'required|date|after:departure_date'
        ]);
        
        Trip::create($request->all());
        return response()->json(['status' => true], 201);
    }
    
    public function update(Request $request)
    {
        $request->validate(['id' => 'required|exists:trips,id']);
        $trip = Trip::findOrFail($request->id);
        $trip->update($request->only(['number_trip', 'bus_id', 'route_id', 'departure_date', 'arrival_date']));
        return response()->json(['status' => true], 200);
    }
    
    public function destroy(Request $request)
    {
        $request->validate(['id' => 'required|exists:trips,id']);
        Trip::destroy($request->id);
        return response()->json(['status' => true], 204);
    }
}