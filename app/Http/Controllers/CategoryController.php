<?php

namespace App\Http\Controllers;

use App\Http\Resources\DescriptiveResource;
use App\Models\FoodCategory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller {
    public function index(): AnonymousResourceCollection {
        return DescriptiveResource::collection(FoodCategory::all());
    }
}
