<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\DefaultController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/cars', [CarsController::class, 'index']);
Route::post('/cars', [CarsController::class, 'store']);
Route::get('/cars/{cars}', [CarsController::class, 'show']);
Route::put('/cars/{cars}', [CarsController::class, 'update']);
Route::delete('/cars/{cars}', [CarsController::class, 'destroy']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('api/class', [DefaultController::class, 'index']);