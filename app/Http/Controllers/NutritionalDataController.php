<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateNutritionalDataRequest;
use App\Models\NutritionalData;
use App\Services\NutritionalDataService;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class NutritionalDataController extends Controller {
    public function __construct(private readonly NutritionalDataService $nutritionalDataService) {}

    /**
     * Display the specified resource.
     */
    public function show(NutritionalData $nutritionalData) {
        return $nutritionalData;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNutritionalDataRequest $request, NutritionalData $nutritionalData): NutritionalData {
        return $this->nutritionalDataService->update($request->post(), $nutritionalData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NutritionalData $nutritionalData): Response {
        $nutritionalData->delete();

        return response(status: Status::HTTP_NO_CONTENT)->noContent();
    }
}
