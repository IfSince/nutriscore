<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as Status;

class UserController extends Controller {
    public function __construct(private readonly UserService $userService) {}

    /**
     * Display the specified resource.
     */
    public function show(User $user): UserResource {
        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): UserResource {
        return UserResource::make($this->userService->update($request->validated(), $user));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): Response {
        $this->userService->delete($user);

        return response(status: Status::HTTP_NO_CONTENT);
    }
}
