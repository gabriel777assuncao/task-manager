<?php

namespace App\Http\Controllers;

use Illuminate\Http\{JsonResponse, Request};
use Illuminate\Validation\UnauthorizedException;

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

        throw new UnauthorizedException('Invalid credentials');
    }
}
