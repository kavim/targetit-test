<?php

namespace App\Services\Eloquent;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data): ?User
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'cpf'      => $data['cpf'],
            'password' => bcrypt($data['password']),
        ]);

        $user->token = $user->createToken('api-token')->plainTextToken;

        return $user;
    }

    public function login(array $data): ?User
    {
        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return null;
        }

        $user->token = $user->createToken('api-token')->plainTextToken;

        return $user;
    }

    public function logout($user): void
    {
        $user->tokens()->delete();
    }
}
