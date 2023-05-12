<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller {
    public function __construct(private readonly RegisterService $registerService) { }

    public function register(RegisterRequest $request): Response {
        $validated = $request->messages();

        DB::beginTransaction();

        $this->registerService->register($request->post());

        DB::rollBack();

        return response($validated, 201);
    }
}
