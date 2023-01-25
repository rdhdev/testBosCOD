<?php

namespace App\Infrastructure;

use App\Models\RekeningAdmin;

class AdminAccountRepository
{
    public function getAccount($userID, $bankID)
    {
        return RekeningAdmin::with('bank')->where('user_id', $userID)
            ->where('bank_id', $bankID)
            ->first();
    }
}