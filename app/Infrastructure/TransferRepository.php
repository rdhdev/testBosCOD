<?php

namespace App\Infrastructure;

use App\Models\TransaksiTransfers;

class TransferRepository
{
    public function store($field)
    {
        return TransaksiTransfers::create($field);
    }

    public function countTransfer()
    {
        return TransaksiTransfers::count();
    }
}