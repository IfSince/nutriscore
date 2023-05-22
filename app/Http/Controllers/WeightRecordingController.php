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
    public function store(WeightRecordingRequest $request, int $userId): WeightRecording {
        $request->merge(['userId' => $userId]);
        return $this->weightRecordingService->create($request->all());
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
    public function update(WeightRecordingRequest $request, WeightRecording $weightRecording) {
        return $this->weightRecordingService->update($request->validated(), $weightRecording);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WeightRecording $weightRecording): Response {
        $this->weightRecordingService->delete($weightRecording);

        return response(status: Status::HTTP_NO_CONTENT);
    }
}
