<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\NutritionalMetadata\UserNutritionalMetadataService;
use Illuminate\Http\Response;

class UserNutritionalMetadataController extends Controller {
    public function __construct(private readonly UserNutritionalMetadataService $userNutritionalMetadataService) {

    }
    public function show(User $user): Response {
        return response(content: $this->userNutritionalMetadataService->createNutritionalMetadataForUser($user));
    }
}
