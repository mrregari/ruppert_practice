<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
        
        $field = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $user = User::where($field, $request->login)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        
        return response()->json([
            'token' => $user->createToken('api-token')->plainTextToken,
            'name' => $user->name
        ], 200);
    }
}