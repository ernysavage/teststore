<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

    class AuthService
{
    public function login(array $data): ?User
    {
        // Берём пользователя
        return User::where('email', $data['email'])->first();
    }

    public function createToken(User $user): string
    {
        return JWTAuth::fromUser($user); // user должен быть моделью User
    }
}

