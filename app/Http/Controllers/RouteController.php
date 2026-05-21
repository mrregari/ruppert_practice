<?php
namespace App\Http\Controllers;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return response()->json(Route::with('trips')->get(), 200);
    }
    
    public function show($id)
    {
        return response()->json(Route::with('trips')->findOrFail($id), 200);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'number_route' => 'required|string|max:10|unique:routes',
            'start_stop' => 'required|string',
            'end_stop' => 'required|string',
            'price' => 'required|integer|min:0'
        ]);
        
        Route::create($request->all());
        return response()->json(['status' => true], 201);
    }
    
    public function update(Request $request)
    {
        $request->validate(['id' => 'required|exists:routes,id']);
        $route = Route::findOrFail($request->id);
        
        $data = $request->only(['number_route', 'start_stop', 'end_stop', 'price']);
        $route->update(array_filter($data, fn($v) => $v !== null));
        
        return response()->json(['status' => true], 200);
    }
    
    public function destroy(Request $request)
    {
        $request->validate(['id' => 'required|exists:routes,id']);
        Route::destroy($request->id);
        return response()->json(['status' => true], 204);
    }
}