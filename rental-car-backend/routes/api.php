<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController; 
use App\Http\Controllers\ReservationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

Route::get('cars', [CarController::class, 'index']);
Route::post('cars', [CarController::class, 'store']);
Route::get('cars/{id}', [CarController::class, 'show']);
Route::put('cars/{id}', [CarController::class, 'update']);
Route::delete('cars/{id}', [CarController::class, 'destroy']);



// API routes for reservations
Route::prefix('reservations')->group(function () {
    Route::get('/', [ReservationController::class, 'index']); // List all reservations
    Route::post('/', [ReservationController::class, 'store']); // Create a new reservation
    Route::get('/{reservation}', [ReservationController::class, 'show']); // Show a specific reservation
    Route::put('/{reservation}', [ReservationController::class, 'update']); // Update a specific reservation
    Route::delete('/{reservation}', [ReservationController::class, 'destroy']); // Delete a specific reservation
});

/* Route::middleware('auth:sanctum')->group(function () { */
/* }); */