<?php

namespace App\Http\Controllers;

use Illuminate\Http\{JsonResponse, Request};

class LoginController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        if (auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'token' => $request->user()->createToken('token')->plainTextToken,
                'message' => 'Success',
                'status' => 200,
            ]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
