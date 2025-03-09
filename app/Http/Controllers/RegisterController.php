<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthorizationRequest;
use App\Models\User;
use Illuminate\Http\{JsonResponse};

class RegisterController extends Controller
{
    public function __invoke(AuthorizationRequest $request): JsonResponse
    {
        User::create($request->only('name', 'email') + [
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'status' => 201,
        ]);
    }
}
