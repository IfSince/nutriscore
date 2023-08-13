<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeightRecordingRequest;
use App\Http\Resources\WeightRecordingResource;
use App\Models\User;
use App\Models\WeightRecording;
use App\Services\WeightRecordingService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class WeightRecordingController extends Controller {
    public function __construct(private readonly WeightRecordingService $weightRecordingService) { }

    /**
     * Display a listing of the resource.
     */
    public function index(User $user): AnonymousResourceCollection {
        return WeightRecordingResource::collection($user->weightRecordings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeightRecordingRequest $request, User $user): WeightRecordingResource {
        return WeightRecordingResource::make($this->weightRecordingService->create($request->validated(), $user));
    }

    /**
     * Display the specified resource.
     */
    public function show(WeightRecording $weightRecording): WeightRecordingResource {
        return WeightRecordingResource::make($weightRecording);
    }

    public function showLatest(User $user): WeightRecordingResource {
        return WeightRecordingResource::make($user->currentWeightRecording);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeightRecordingRequest $request, WeightRecording $weightRecording): WeightRecordingResource {
        return WeightRecordingResource::make($this->weightRecordingService->update($request->validated(), $weightRecording));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WeightRecording $weightRecording): Response {
        $weightRecording->delete();

        return response(status: Status::HTTP_NO_CONTENT);
    }
}
