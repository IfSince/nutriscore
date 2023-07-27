<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\NutritionalMetadata\UserNutritionalMetadataLoadService;
use Illuminate\Http\Response;

class UserNutritionalMetadataController extends Controller {
    public function __construct(private readonly UserNutritionalMetadataLoadService $userNutritionalMetadataService) {

    }
    public function show(User $user): Response {
        return response(content: $this->userNutritionalMetadataService->loadNutritionalMetadataForUser($user));
    }
}
