<?php

namespace App\Services\Eloquent;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\AuthServiceInterface;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\LoginRequest;

class AuthService implements AuthServiceInterface
{
    public function __construct(private UserRepositoryInterface $repo){}

    public function login(array $credentials)
    {
        if (!$token = JWTAuth::attempt($credentials)) {
            abort(401, 'Unauthorized');
        }
        return $token;
    }
}

