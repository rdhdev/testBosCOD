<?php

namespace App\Service;

use Carbon\Carbon;
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
        try {
            return $this->createNewToken(auth()->refresh());
        } catch (\Exception $e) {
            return response()->json([
                'code'    => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
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