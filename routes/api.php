<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodRecordingController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MealRecordingController;
use App\Http\Controllers\NutritionalDataController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeightRecordingController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response as Status;

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

// Auth
Route::put('register', [RegisterController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::apiResource('users', UserController::class)->only(['show', 'update', 'destroy']);

    Route::get('users/{user}/nutrition', [NutritionalDataController::class, 'showByUser']);
    Route::apiResource('nutrition', NutritionalDataController::class)->only(['show', 'update'])
        ->parameters(['nutrition' => 'nutritional-data']);

    Route::get('users/{user}/weight-recordings/latest', [WeightRecordingController::class, 'showLatest']);
    Route::apiResource('users.weight-recordings', WeightRecordingController::class)->shallow();

    Route::apiResource('foods', FoodController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

    Route::get('meals', [MealController::class, 'indexAll']);
    Route::apiResource('users.meals', MealController::class)->shallow();

    Route::apiResource('users.food-recordings', FoodRecordingController::class)
        ->only(['store', 'show', 'update', 'destroy'])
        ->shallow();

    Route::apiResource('users.meal-recordings', MealRecordingController::class)
        ->only(['store', 'show', 'update', 'destroy'])
        ->shallow();
});

// Fallback
Route::fallback(function () {
    return response(content: ['message' => ['This is my default not found response']], status: Status::HTTP_NOT_FOUND);
});
