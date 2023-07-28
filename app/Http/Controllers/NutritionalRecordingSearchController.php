<?php

namespace App\Http\Controllers;

use App\Http\Resources\NutritionalRecordingSearchEntry;
use App\Models\Food;
use App\Models\Meal;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NutritionalRecordingSearchController extends Controller {
    public function index(): AnonymousResourceCollection {
        return NutritionalRecordingSearchEntry::collection(Food::all()->toBase()->merge(Meal::all()));
    }
}
