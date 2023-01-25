<?php

namespace App\Service;

use App\Infrastructure\TransferRepository;
use \Carbon\Carbon;
use App\Service\AdminAccountService;
use App\Service\BankService;
use Illuminate\Support\Facades\Auth;


class TransferService 
{

    public $adminAccountService;
    public $bankService;
    public $transferRepository;

    public function __construct()
    {
        $this->adminAccountService = new AdminAccountService;
        $this->bankService = new BankService;
        $this->transferRepository = new TransferRepository;
    }
    private function uniqueCode()
    {
        return rand(100, 999);
    }

    private function expiredTransfer()
    {
        return Carbon::now()->addDays(1)->format('Y-m-d H:i:s');
    }

    private function transferNo()
    {
        $format  = "TF"; 
        $format .= Carbon::now()->format('ymd');
        $format .= sprintf('%05d',$this->transferRepository->countTransfer() + 1);

        return $format;
    }

    public function createTransfer($fields)
    {
        try {
            $bank_pengirim = $this->bankService->getBankByName($fields->bank_pengirim);
            $bank_tujuan   = $this->bankService->getBankByName($fields->bank_tujuan);
            $expired       = $this->expiredTransfer();
            $accountAdmin  = $this->adminAccountService->getAccount(Auth::user()->id, $bank_tujuan->id);
            $uniqueCode    = $this->uniqueCode();
            $id            = $this->transferNo();

            $transaction = [
                'id'                => $id,
                'bank_pengirim'     => $bank_pengirim->id,
                'bank_penerima'     => $bank_tujuan->id,
                'rekening_admin_id' => $accountAdmin->id,
                'nama_tujuan'       => $fields->atasnama_tujuan,
                'nilai_transfer'    => $fields->nilai_transfer,
                'kode_unik'         => $uniqueCode,
                'expired'           => $expired
            ];
            
            $this->transferRepository->store($transaction);

            return [
                'id_transaksi'       => $id,
                'nilai_transfer'     => $transaction['nilai_transfer'],
                'kode_unik'          => $transaction['kode_unik'],
                'biaya_admin'        => 0,
                'total_transfer'     => $transaction['nilai_transfer'] + $transaction['kode_unik'],
                'bank_perantara'     => $accountAdmin->bank->nama,
                'rekening_perantara' => $accountAdmin->nomor_rekening,
                'berlaku_hingga'     => $transaction['expired']
            ];

        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }
}