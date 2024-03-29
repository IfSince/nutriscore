<?php

use App\Http\Controllers\ActivityLevelController;
use App\Http\Controllers\AllergenicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalculationTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodRecordingController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MealRecordingController;
use App\Http\Controllers\NutritionalDataController;
use App\Http\Controllers\NutritionalRecordingController;
use App\Http\Controllers\NutritionalRecordingSearchController;
use App\Http\Controllers\NutritionTypeController;
use App\Http\Controllers\ProfileMetadataController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserNutritionalMetadataController;
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

// Enum Tables
Route::get('categories', [CategoryController::class, 'index']);
Route::get('allergenics', [AllergenicController::class, 'index']);
Route::get('nutrition-types', [NutritionTypeController::class, 'index']);
Route::get('genders', [GenderController::class, 'index']);
Route::get('calculation-types', [CalculationTypeController::class, 'index']);
Route::get('activity-levels', [ActivityLevelController::class, 'index']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    // User
    Route::apiResource('users', UserController::class)->only(['show', 'update', 'destroy']);
    Route::get('users/{user}/profile-metadata', [ProfileMetadataController::class, 'get']);
    Route::get('users/{user}/nutritional-metadata', [UserNutritionalMetadataController::class, 'show']);
    Route::get('users/{user}/nutritional-recordings', [NutritionalRecordingController::class, 'show']);
    Route::get('users/{user}/nutrition', [NutritionalDataController::class, 'showByUser']);
    Route::get('users/{user}/allergenics', [AllergenicController::class, 'showByUser']);
    Route::put('users/{user}/allergenics', [AllergenicController::class, 'updateByUser']);

    // Weight Recordings
    Route::get('users/{user}/weight-recordings/latest', [WeightRecordingController::class, 'showLatest']);
    Route::apiResource('users.weight-recordings', WeightRecordingController::class)->shallow();

    // Nutrition
    Route::apiResource('nutrition', NutritionalDataController::class)->only(['show', 'update'])
        ->parameters(['nutrition' => 'nutritional-data']);

    // Food
    Route::apiResource('foods', FoodController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

    // Meals
    Route::get('meals', [MealController::class, 'indexAll']);
    Route::apiResource('users.meals', MealController::class)->shallow();

    // FoodRecordings
    Route::apiResource('users.food-recordings', FoodRecordingController::class)
        ->only(['store', 'show', 'update', 'destroy'])
        ->shallow();

    // MealRecordings
    Route::apiResource('users.meal-recordings', MealRecordingController::class)
        ->only(['store', 'show', 'update', 'destroy'])
        ->shallow();

    // Nutritional Recordings Search
    Route::get('nutritional-recordings/search', [NutritionalRecordingSearchController::class, 'index']);
});

// Fallback
Route::fallback(function () {
    return response(content: ['message' => ['This is my default not found response']], status: Status::HTTP_NOT_FOUND);
});
