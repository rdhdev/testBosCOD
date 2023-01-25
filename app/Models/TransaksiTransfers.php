<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiTransfers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bank_pengirim',
        'bank_penerima',
        'rekening_admin_id',
        'nama_tujuan',
        'nilai_transfer',
        'kode_unik',
        'expired'
    ];
}
