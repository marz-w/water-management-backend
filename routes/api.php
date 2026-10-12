<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

Route::post('/locations', [LocationController::class, 'createLocation']);
Route::get('/locations', [LocationController::class, 'readAllLocations']);
Route::get('/locations', [LocationController::class, 'readAllLocations']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
