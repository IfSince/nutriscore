<?php

use App\Http\Controllers\NutritionalDataController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('register', [RegisterController::class, 'register']);

Route::apiResource('users', UserController::class)
    ->only(['show', 'update', 'destroy']);


Route::apiResource('nutrition', NutritionalDataController::class)
    ->parameters(['nutrition' => 'nutritional-data'])
    ->only(['show', 'update']);


Route::fallback(function () {
    return 'This is my default not found response';
});
