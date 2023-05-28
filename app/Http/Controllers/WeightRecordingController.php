<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightRecordingRequest;
use App\Models\User;
use App\Models\WeightRecording;
use App\Services\WeightRecordingService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class WeightRecordingController extends Controller {
    public function __construct(private readonly WeightRecordingService $weightRecordingService) { }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user): Collection {
        return $user->weightRecordings;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeightRecordingRequest $request, User $user): WeightRecording {
        return $this->weightRecordingService->create($request->validated(), $user);
    }

    /**
     * Display the specified resource.
     */
    public function show(WeightRecording $weightRecording): WeightRecording {
        return $weightRecording;
    }

    public function showLatest(User $user): WeightRecording {
        return $user->currentWeightRecording;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeightRecordingRequest $request, WeightRecording $weightRecording): WeightRecording {
        return $this->weightRecordingService->update($request->validated(), $weightRecording);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WeightRecording $weightRecording): Response {
        $weightRecording->delete();

        return response(status: Status::HTTP_NO_CONTENT);
    }
}
