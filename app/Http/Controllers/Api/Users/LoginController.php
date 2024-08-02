<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Requests\LoginRequest;
use App\Http\Services\ResponseMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class LoginController
{
    public function login(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->all())) {
            return response()->json(['message' => ResponseMessage::UNAUTHORIZED], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken('token', ['*'], now()->addDay());

        return response()->json([
            'data' => [
                'token' => $token->plainTextToken,
                'expires_at' => $token->accessToken->expires_at,
            ]
        ]);
    }

}