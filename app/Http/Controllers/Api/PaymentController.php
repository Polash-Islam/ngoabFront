<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkTransaction(Request $request)
    {
        $userId = User::where('email', $request->Username)->pluck('id')->first();
        $transaction = Transaction::where('user_id', $userId)->where('trx_id', $request->TransactionId)->where('token', $request->Token)->where('invoice_no', $request->InvoiceNo)->first();

        if ($transaction && $transaction->status != null && $transaction->status == "200") {
            return response([
                'Message' => 'success',
                'status' => '200',
            ]);
        } elseif (!$transaction){
            return response([]);
        } else {
            return response([
                'Message' => 'failed',
                'status' => '400',
            ]);
        }

    }
}
