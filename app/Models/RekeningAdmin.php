<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bank;

class RekeningAdmin extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
