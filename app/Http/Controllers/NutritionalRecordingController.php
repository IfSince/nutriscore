<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\NutritionalRecordings\NutritionalRecordingsLoadService;
use Illuminate\Http\Response;

class NutritionalRecordingController extends Controller {
    public function __construct(private readonly NutritionalRecordingsLoadService $nutritionalRecordingsLoadService) { }

    public function show(User $user): Response {
        return response(content: $this->nutritionalRecordingsLoadService->loadNutritionalRecordingsForUser($user));
    }
}
