<?php

namespace App\Service;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login($fields)
    {
        if (! $token = auth()->guard('api')->attempt($fields)) {
            return response()
            ->json([
                'code'    => 401,
                'message' => 'Unauthorized'
                ]
              , 
              401);
        }
        
        return $this->createNewToken($token);
    }

    public function refresh() 
    {
        return $this->createNewToken(auth()->refresh());
    }

    protected function createNewToken($token)
    {
        return response()->json([
            'code'    => 200,
            'message' => 'success login',
            'data'    => [
                'accessToken'  => $token,
                'refreshToken' => auth()->refresh(),
                // 'token_type' => 'bearer',
                // 'expires_in' => auth()->factory()->getTTL() * 60,
                // 'user' => auth()->user()
            ]
        ], 200);
    }
}