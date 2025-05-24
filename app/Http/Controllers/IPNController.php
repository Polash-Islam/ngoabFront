<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\PaymentTransaction;

class IPNController extends Controller
{
    public function IPN(Request $request)
    {
        $data = $request->only([
            'Username',
            'Password',
            'Token',
            'InvoiceNo',
            'InvoiceDate',
            'TransactionId',
        ]);

        // Security check
        if ($data['Username'] !== 'YOURUSER' || $data['Password'] !== 'YOURPASS') {
            return response()->json(['Message' => 'Unauthorized', 'Status' => '401']);
        }

        // Check if transaction already exists
        $transaction = PaymentTransaction::where('transaction_id', $data['TransactionId'])->first();

        if ($transaction) {
            return response()->json(['Message' => 'Success', 'Status' => '200']);
        }

        // Transaction not found, call verify API 3.4
        $verifyResponse = Http::withHeaders([
            'Authorization' => 'Basic YOUR_AUTH_KEY',
            'Content-Type' => 'application/json',
        ])->post('https://spg.sonalibank.com.bd/api/v3/spgservice/TransactionVerificationWithToken', [
            'Token' => $data['Token'],
        ]);

        if (!$verifyResponse->successful()) {
            return response()->json(['Message' => 'Verification Failed', 'Status' => '400']);
        }

        $verifyData = $verifyResponse->json();

        if ($verifyData['Status'] === '200') {
            PaymentTransaction::create([
                'transaction_id' => $verifyData['TransactionId'],
                'invoice_no' => $verifyData['InvoiceNo'],
                'status' => $verifyData['Status'],
                'pay_mode' => $verifyData['PayMode'],
                'paid_amount' => $verifyData['CustomerPaidAmount'],
                'request_amount' => $verifyData['RequestTotalAmount'],
                'token' => $verifyData['Token'],
                'voucher_link' => $verifyData['SonaliVoucherLink'],
                'challan_link' => $verifyData['ChallanLink'],
                'response_data' => json_encode($verifyData),
            ]);
        }

        return response()->json(['Message' => 'Success', 'Status' => '200']);
    }
}
