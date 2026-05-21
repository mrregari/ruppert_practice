<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, BusController, RouteController, TripController, UserController};

// Гость
Route::get('/bus', [BusController::class, 'index']);
Route::get('/bus/{id}', [BusController::class, 'show']);
Route::get('/route', [RouteController::class, 'index']);
Route::get('/route/{id}', [RouteController::class, 'show']);

// Авторизация
Route::post('/login', [AuthController::class, 'login']);

// Диспетчер + Админ
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/bus', [BusController::class, 'store']);
    
    Route::post('/route', [RouteController::class, 'store']);
    Route::put('/route', [RouteController::class, 'update']);
    Route::delete('/route', [RouteController::class, 'destroy']);
    
    Route::post('/trip', [TripController::class, 'store']);
    Route::put('/trip', [TripController::class, 'update']);
    Route::delete('/trip', [TripController::class, 'destroy']);
});

// Только админ
Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    Route::delete('/user', [UserController::class, 'destroy']);
    Route::put('/password', [UserController::class, 'changePassword']);
});