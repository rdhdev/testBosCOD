<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\LoginRequest;
use App\Http\Request\RefreshTokenRequest;
use App\Service\AuthService;

class AuthController extends Controller
{
    private $loginRequest;
    private $refreshTokenRequest;
    private $authService;

    public function __construct()
    {
        $this->loginRequest = new LoginRequest;
        $this->refreshTokenRequest = new RefreshTokenRequest;
        $this->authService = new AuthService;
        $this->middleware('auth:api', ['except' => ['login', 'updateToken']]);
    }
    
    public function login(Request $request)
    {
        $validate =  $this->loginRequest->validate($request);

        if ($validate['code'] == 400) {
            return response($validate, 400);
        }

        $fields = $request->only(['username', 'password']);

        return $this->authService->login($fields);
    }

    public function updateToken(Request $request)
    {
        $validate =  $this->refreshTokenRequest->validate($request);

        if ($validate['code'] == 400) {
            return response($validate, 400);
        }

        $fields = $request->only(['token']);

        return $this->authService->refresh($fields);
    }

}
