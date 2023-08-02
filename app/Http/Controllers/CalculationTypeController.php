<?php

namespace App\Http\Controllers;

use App\Http\Resources\DescriptiveResource;
use App\Models\CalculationType;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CalculationTypeController extends Controller {
    public function index(): AnonymousResourceCollection {
        return DescriptiveResource::collection(CalculationType::all());
    }
}
