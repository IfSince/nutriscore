<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class RegisterController extends Controller {
    public function __construct(private readonly RegisterService $registerService) { }

    public function register(RegisterRequest $request): Response {
        $this->registerService->register($request->validated());

        return response($request->messages(), Status::HTTP_CREATED);
    }
}
