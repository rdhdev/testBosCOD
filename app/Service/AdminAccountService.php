<?php

namespace App\Service;

use App\Infrastructure\AdminAccountRepository;

class AdminAccountService
{
    public $adminAccountRepository;

    public function __construct()
    {
        $this->adminAccountRepository = new AdminAccountRepository;
    }

    public function getAccount($userID, $bankID)
    {
        return $this->adminAccountRepository->getAccount($userID, $bankID);
    }
}