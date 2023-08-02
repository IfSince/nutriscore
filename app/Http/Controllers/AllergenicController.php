<?php

namespace App\Http\Controllers;

use App\Http\Resources\DescriptiveResource;
use App\Models\Allergenic;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AllergenicController extends Controller {
    public function index(): AnonymousResourceCollection {
        return DescriptiveResource::collection(Allergenic::all());
    }
}
