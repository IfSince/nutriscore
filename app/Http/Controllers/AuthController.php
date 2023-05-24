<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as Status;

class AuthController extends Controller {
    public function login(LoginRequest $request): JsonResponse {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return response()->json([],Status::HTTP_CREATED);
        }

        return response()->json(['The provided credentials do not match our records.'], Status::HTTP_UNAUTHORIZED);
    }


    public function logout(Request $request): Response {
        Auth::guard('web')->logout();
        $request->session()->regenerate();

        return response(['success' => 'Logout successful']);
    }
}
