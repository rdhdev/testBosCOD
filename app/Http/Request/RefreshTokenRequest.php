<?php

namespace App\Http\Request;

use App\Utils\Helper;
use Illuminate\Support\Facades\Validator;

class RefreshTokenRequest 
{
    private function rules()
    {
        return [
            'token' => 'required',
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