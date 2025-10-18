<?php
namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\AuthResource;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected AuthService $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function login(LoginRequest $request)
{
    $user = $this->service->login($request->validated());
    $token = $this->service->createToken($user);

    return new AuthResource([
        'user' => $user,
        'access_token' => $token
    ]);
}
}
