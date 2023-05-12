<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class RegisterController extends Controller {
    public function __construct(private readonly RegisterService $registerService) { }

    public function register(RegisterRequest $request): Response {
        $validated = $request->messages();

        $this->registerService->register($request->post());

        return response($validated, Status::HTTP_CREATED);
    }
}
