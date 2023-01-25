<?php

namespace App\Utils;

class Helper 
{
    public static function generateResponseError($validator)
    {
        $message = [];
        foreach ($validator->getRules() as $key => $value) {
            $message[$key] = $validator->errors()->first($key);
        }
    
        return $message;
    }
}