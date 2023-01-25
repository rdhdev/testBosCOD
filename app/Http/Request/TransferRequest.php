<?php

namespace App\Http\Request;

use App\Utils\Helper;
use Illuminate\Support\Facades\Validator;

class TransferRequest 
{
    private function rules()
    {
        return [
            'nilai_transfer'  => 'required|integer',
            'bank_tujuan'     => 'required|exists:banks,nama',
            'atasnama_tujuan' => 'required|max:50',
            'bank_pengirim'   => 'required|exists:banks,nama'
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