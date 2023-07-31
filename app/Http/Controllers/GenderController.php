<?php

namespace App\Http\Controllers;

use App\Http\Resources\DescriptiveResource;
use App\Models\Gender;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GenderController extends Controller {
    public function index(): AnonymousResourceCollection {
        return DescriptiveResource::collection(Gender::all());
    }
}
