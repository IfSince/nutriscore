<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ProfileMetadata\ProfileMetadataService;
use Illuminate\Http\Response;

class ProfileMetadataController extends Controller {
    public function __construct(
        private readonly ProfileMetadataService $profileMetadataService,
    ) {
    }

    public function get(User $user): Response {
        return response(content: $this->profileMetadataService->loadProfileMetadataForUser($user));
    }
}
