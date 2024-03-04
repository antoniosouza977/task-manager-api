<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class LoginController
{
    public function login(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->all())) {
            return response()->json(['message' => 'unauthorized'], 401);
        }

        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken('token', ['*'], now()->addDay());

        return response()->json(['data' => ['token' => $token->plainTextToken]]) ;

    }

}