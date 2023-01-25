<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\LoginRequest;
use App\Service\AuthService;

class AuthController extends Controller
{
    private $loginRequest;
    private $authService;

    public function __construct()
    {
        $this->loginRequest = new LoginRequest;
        $this->authService = new AuthService;
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    public function login(Request $request)
    {
        $validate =  $this->loginRequest->validate($request);

        if ($validate['code'] == 400) {
            return response($validate, 400);
        }

        $fiedls = $request->only(['username', 'password']);

        return $this->authService->login($fiedls);
    }

}
