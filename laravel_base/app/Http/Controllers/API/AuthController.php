<?php

namespace App\Http\Controllers\API;

use App\Actions\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request, RegisterAction $registerAction) {
        $result = $registerAction($request->email, $request->password, $request->name);
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'user' => $result
        ], 201);
    }

    public function login(UserLoginRequest $request) {
        $loginService = new LoginService($request->email, $request->password);
        $result = $loginService->login();
        return response()->json($result, $result['status'] ?? 200);
    }

    public function logout() {
        Auth::user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'Logout successfully'
        ]);
    }
}
