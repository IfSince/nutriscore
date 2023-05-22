<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as Status;

class AuthController extends Controller {
    public function login(LoginRequest $request): JsonResponse {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid login credentials'], Status::HTTP_UNAUTHORIZED);
        }

        $user = User::where('email', $request->validated('email'))->firstOrFail();

        $token = $user->createToken('access_token')->plainTextToken;

        return response()->json(['access_token' => $token])->header('Content-Type', 'application/json');
    }

    public function logout(Request $request): Response {
        $request->user()->tokens()->delete();

        return response(['success' => 'Logout successful']);
    }
}
