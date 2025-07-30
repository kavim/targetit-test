<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Services\Eloquent\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->authService->register($request->validated());
        return response()->json(new AuthResource($user), 201);
    }

    public function login(LoginRequest $request)
    {
        if (! $user = $this->authService->login($request->validated())) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        return new AuthResource($user);
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request->user());
        return response()->json(['message' => 'Desconectado com sucesso']);
    }
}
