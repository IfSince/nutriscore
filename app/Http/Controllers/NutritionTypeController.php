<?php

namespace App\Http\Controllers;

use App\Http\Resources\NutritionTypeResource;
use App\Models\NutritionType;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NutritionTypeController extends Controller {
    public function index(): AnonymousResourceCollection {
        return NutritionTypeResource::collection(NutritionType::all());
    }
}
