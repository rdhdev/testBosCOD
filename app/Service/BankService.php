<?php

namespace App\Service;

use App\Infrastructure\BankRepository;

class BankService
{
    public $bankRepository;

    public function __construct()
    {
        $this->bankRepository = new BankRepository;
    }

    public function getBankByName($name)
    {
        return $this->bankRepository->getBankByName($name);
    }
}