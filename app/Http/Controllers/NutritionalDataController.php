<?php

namespace App\Http\Controllers;

use App\Http\Requests\NutritionalDataRequest;
use App\Models\NutritionalData;
use App\Services\NutritionalDataService;

class NutritionalDataController extends Controller {
    public function __construct(private readonly NutritionalDataService $nutritionalDataService) {}

    /**
     * Display the specified resource.
     */
    public function show(NutritionalData $nutritionalData): NutritionalData {
        return $nutritionalData;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NutritionalDataRequest $request, NutritionalData $nutritionalData): NutritionalData {
        return $this->nutritionalDataService->update($request->post(), $nutritionalData);
    }
}
