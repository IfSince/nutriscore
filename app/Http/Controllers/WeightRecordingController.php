<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightRecordingRequest;
use App\Models\User;
use App\Models\WeightRecording;
use App\Services\WeightRecordingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class WeightRecordingController extends Controller {
    public function __construct(private readonly WeightRecordingService $weightRecordingService) { }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, int $userId): mixed {
        return WeightRecording::where('user_id', $userId)->get();
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
    public function show(int $userId, WeightRecording $weightRecording): WeightRecording {
        return $weightRecording;
    }

    public function showLatest(int $userId): mixed {
        return User::find($userId)->currentWeightRecording;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeightRecordingRequest $request, int $userId, WeightRecording $weightRecording) {
        $request->merge(['userId' => $userId]);
        return $this->weightRecordingService->update($request->all(), $weightRecording);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $userId, WeightRecording $weightRecording): Response {
        $this->weightRecordingService->delete($weightRecording);

        return response(status: Status::HTTP_NO_CONTENT);
    }
}
