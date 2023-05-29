<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealRecordingRequest;
use App\Models\MealRecording;
use App\Models\User;
use App\Services\MealRecordingService;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class MealRecordingController extends Controller {
    public function __construct(private readonly MealRecordingService $mealRecordingService) { }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MealRecordingRequest $request, User $user): MealRecording {
        return $this->mealRecordingService->create($request->validated(), $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(MealRecording $mealRecording): MealRecording {
        return $mealRecording;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MealRecordingRequest $request, MealRecording $mealRecording): MealRecording {
        return $this->mealRecordingService->update($request->validated(), $mealRecording);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MealRecording $mealRecording): Response {
        $mealRecording->delete();

        return response(status: Status::HTTP_NO_CONTENT);
    }
}
