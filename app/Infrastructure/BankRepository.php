<?php

namespace App\Infrastructure;

use App\Models\Bank;

class BankRepository
{
    public function getBankByName($name)
    {
        return Bank::where('nama', $name)
              ->first();
    }
}