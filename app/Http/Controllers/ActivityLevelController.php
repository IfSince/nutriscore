<?php

namespace App\Http\Controllers;

use App\Http\Resources\DescriptiveResource;
use App\Models\ActivityLevel;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ActivityLevelController extends Controller {
    public function index(): AnonymousResourceCollection {
        return DescriptiveResource::collection(ActivityLevel::all());
    }
}
