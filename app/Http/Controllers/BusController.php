<?php
namespace App\Http\Controllers;
use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        return response()->json(Bus::all(), 200);
    }
    
    public function show($id)
    {
        $bus = Bus::findOrFail($id);
        return response()->json($bus, 200);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'registration_number' => 'required|string|unique:buses',
            'model' => 'required|string',
            'seats' => 'required|integer|min:1'
        ]);
        
        Bus::create($request->all());
        return response()->json(['status' => true], 201);
    }
}