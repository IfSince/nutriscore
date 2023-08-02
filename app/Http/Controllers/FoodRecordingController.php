<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRecordingRequest;
use App\Http\Resources\FoodRecordingResource;
use App\Models\FoodRecording;
use App\Models\User;
use App\Services\FoodRecordingService;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class FoodRecordingController extends Controller {
    public function __construct(private readonly FoodRecordingService $foodRecordingService) { }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FoodRecordingRequest $request, User $user): FoodRecordingResource {
        return FoodRecordingResource::make($this->foodRecordingService->create($request->validated(), $user));
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodRecording $foodRecording): FoodRecordingResource {
        return FoodRecordingResource::make($foodRecording);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FoodRecordingRequest $request, FoodRecording $foodRecording): FoodRecordingResource {
        return FoodRecordingResource::make($this->foodRecordingService->update($request->validated(), $foodRecording));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodRecording $foodRecording): Response {
        $foodRecording->delete();

        return response(status: Status::HTTP_NO_CONTENT);
    }
}
