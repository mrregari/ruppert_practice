<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!$request->user() || !in_array($request->user()->status, $roles)) {
            return response()->json(['message' => 'You are not an authenticated user!'], 403);
        }
        return $next($request);
    }
}