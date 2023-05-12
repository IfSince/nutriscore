<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Response;

class UserController extends Controller {
    public function __construct(private readonly UserService $userService) {}

    public function get(User $user): User {
        return $user;
    }

    public function post(UserRequest $request): Response {
        $user = $this->userService->update($request->post());

        return response($user);
    }
}
