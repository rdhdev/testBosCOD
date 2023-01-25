<?php

namespace App\Http\Controllers;

use App\Http\Request\TransferRequest;
use App\Service\TransferService;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    private $transferRequest;
    private $transferService;

    public function __construct()
    {
        $this->transferRequest = new TransferRequest;
        $this->transferService = new TransferService;
    }
    public function create(Request $request)
    {
        $validate = $this->transferRequest->validate($request);

        if ($validate['code'] == 400) {
            return response($validate, 400);
        }

        $transfer = $this->transferService->createTransfer($request);

        return response()->json(
            ['code'=>201, 'message'=>'created','data'=>$transfer],
            201
        );
    }
}
