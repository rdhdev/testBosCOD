<?php

namespace App\Http\Request;

use App\Utils\Helper;
use Illuminate\Support\Facades\Validator;

class LoginRequest 
{
    private function rules()
    {
        return [
            'username' => 'required|email',
            'password' => 'required'
        ];
    }

    public function validate($fields)
    {
        $errors = null;

        $validator = Validator::make($fields->all(), $this->rules());

        if ($validator->fails()) {
            $errors = Helper::generateResponseError($validator);
        }

        return [
            'code'   => $validator->fails() ? 400 : 200,
            'errors' => $errors
        ];
    }
}