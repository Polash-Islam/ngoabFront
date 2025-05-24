<?php

namespace App\Http\Controllers;

use App\Models\FdOneForm;
use App\Models\Fund;
use App\Models\PaymentTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exceptio\SonaliPayment\Http\Controllers\SonaliPaymentController;
use Exceptio\SonaliPayment\Http\Dtos\CreateRequestDto;
use Exceptio\SonaliPayment\Http\Dtos\CreditInformationDto;

class PaymentController extends Controller
{
    public function makePayment()
    {

        return view('front/payment/makePayment');
    }

    public function doCheckout(Request $request)
    {
        $sonaliPayment = new SonaliPaymentController();
        $user = Auth::user();
        try {
            $createRequestDto = new CreateRequestDto(
                "INV_" . uniqid(),                   // Invoice Number
                now()->format('Y-m-d'),                // Date
                57500.00,                     // Total Amount
                $user->user_name,                         // Name
                $user->user_phone,              // Mobile
                $user->email,                            // Email
                "Y",                 // Auto Redirect
                [
                    new CreditInformationDto(
                        1,
                        50000.00,
                        "TRN",
                        "0002601020864",
                        "John's Company"
                    ),
                    new CreditInformationDto(
                        2,
                        7500.00,
                        "TRN",
                        "0002601020865",
                        "John's Company"
                    )
                ],
                route('sonali-payment.callback')       // Callback Route
            );
        } catch (\Exception $e) {
            if (env('APP_DEBUG', true)) {
                echo 'Error: ' . $e->getMessage();
            } else {
                Log::info('Error: ' . $e->getMessage());
            }
        }

        $data = $sonaliPayment->checkout($createRequestDto);


        if (isset($data->Status) && $data->Status == 200) {
            $fund = new Fund();
            $fund->user_id = Auth::id();
            $fund->payment_token = $data->Token;
            $fund->remarks = 'register';
            $fund->save();
            return redirect()->to($data->RedirectToGateway);
        } else {
            return response()->json([
                'message' => 'Payment initiation failed',
                'response' => $data
            ]);
        }
    }
    public function renewPaymentCheckout(Request $request)
    {
        $sonaliPayment = new SonaliPaymentController();
        $user = Auth::user();
        try {
            $createRequestDto = new CreateRequestDto(
                "INV_" . uniqid(),                   // Invoice Number
                now()->format('Y-m-d'),                // Date
                34500.00,                     // Total Amount
                $user->user_name,                         // Name
                $user->user_phone,              // Mobile
                $user->email,                            // Email
                "Y",                 // Auto Redirect
                [
                    new CreditInformationDto(
                        1,
                        30000.00,
                        "TRN",
                        "0002601020864",
                        "John's Company"
                    ),
                    new CreditInformationDto(
                        2,
                        4500.00,
                        "TRN",
                        "0002601020865",
                        "John's Company"
                    )
                ],
                route('sonali-payment.callback')       // Callback Route
            );
        } catch (\Exception $e) {
            if (env('APP_DEBUG', true)) {
                echo 'Error: ' . $e->getMessage();
            } else {
                Log::info('Error: ' . $e->getMessage());
            }
        }

        $data = $sonaliPayment->checkout($createRequestDto);


        if (isset($data->Status) && $data->Status == 200) {
            $fund = new Fund();
            $fund->user_id = Auth::id();
            $fund->payment_token = $data->Token;
            $fund->remarks = 'renew';
            $fund->save();
            return redirect()->to($data->RedirectToGateway);
        } else {
            return response()->json([
                'message' => 'Payment initiation failed',
                'response' => $data
            ]);
        }
    }

    public function paymentCallback(Request $request)
    {
        if ($request->input('Mode') == 'success') {
            $sonaliPayment = new SonaliPaymentController();
            $data = $sonaliPayment->validate_response($request);

            $fund = Fund::where('payment_token', $data->Token)->first();
            $transaction = new Transaction();
            $transaction->fund_id = $fund->id;
            $transaction->user_id = Auth::id();
            $transaction->token = $data->Token;
            $transaction->trx_id = $data->TransactionId;
            $transaction->trx_date = $data->TransactionDate;
            $transaction->invoice_no = $data->InvoiceNo;
            $transaction->invoice_date = $data->InvoiceDate;
            $transaction->branch = $data->Branch;
            $transaction->request_amount = $data->RequestTotalAmount;
            $transaction->paid_amount = $data->CustomerPaidAmount;
            $transaction->extra_charge = $data->ExtraCharges;
            $transaction->settlement_done = $data->SettlementDone;
            $transaction->settlement_date = $data->SettlementDate;
            $transaction->pay_mode = $data->PayMode;
            $transaction->scroll_no = $data->ScrollNo;
            $transaction->Sonali_voucher_link = $data->SonaliVoucherLink;
            $transaction->challan_link = $data->ChallanLink;
            $transaction->party_name = $data->PartyName;
            $transaction->message = $data->Message;
            $transaction->remarks = $fund->remarks;
            $transaction->status = $data->Status;
            $transaction->save();

            if ($fund->remarks == 'register') {
                return redirect()->route('payment.success')->with('success', 'Payment completed successfully!');
            } elseif ($fund->remarks == 'renew') {
                return redirect()->route('renew.payment.success')->with('success', 'Payment completed successfully!');
            }
        } else {
            return "Failed Payment";
        }
    }

//    public function paymentSuccess()
//    {
//        return view('front/payment/success');
//    }

    public function renewPaymentSuccess()
    {
        $data['ngo_list_all'] = FdOneForm::where('user_id', Auth::user()->id)->first();
        return view('front/payment/renew_payment_success', $data);
    }


    // new payment method
    public function processPayment(Request $request)
    {
        $invoiceNo = 'INV' . rand(10000, 99999);
        $invoiceDate = now()->format('Y-m-d');
        $responseUrl = route('payment.response');

        $data = [
            "InvoiceNo" => $invoiceNo,
            "InvoiceDate" => $invoiceDate,
            "RequestTotalAmount" => 1500.00,
            "CustomerName" => "Rajiur Rahman",
            "CustomerContactNo" => "01318948051",
            "CustomerAddress" => "Dhaka, Bangladesh",
            "Email" => "rajiur@abc.com",
            "ResponseUrl" => $responseUrl,
            "AllowDuplicateInvoiceNoDate" => "Y",
            "CreditInformations" => [
                [
                    "SerialNo" => 1,
                    "CrAccountOrChallanNo" => "0002601020864",
                    "CrAmount" => 1000.00,
                    "TranMode" => "TRN",
                    "Onbehalf" => "Rajiur Rahman",
                ],
                [
                    "SerialNo" => 2,
                    "CrAccountOrChallanNo" => "0002601020871",
                    "CrAmount" => 500.00,
                    "TranMode" => "TRN",
                    "Onbehalf" => "Rajiur Rahman"
                ],
            ]
        ];

        $apiUrl = "https://spgapiuat.sonalibank.com.bd/api/v3/spgservice/CreatePaymentRequest";

        $response = Http::withHeaders([
            "Authorization" => "Basic ZHVVc2VyMjAxNDE6ZHVVc2VyUGF5bWVudDIwMTQ=",
            "Content-Type" => "application/json"
        ])->post($apiUrl, $data);

        $result = $response->json();

        if (isset($result['Status']) && $result['Status'] === '200') {

            DB::transaction(function () use ($result, $data) {
                // Save main transaction
                $transaction = PaymentTransaction::create([
                    'user_id' => Auth::id(),
                    'invoice_no' => $data['InvoiceNo'],
                    'invoice_date' => $data['InvoiceDate'],
                    'request_amount' => $data['RequestTotalAmount'],
                    'response_url' => $data['ResponseUrl'],
                    'token' => $result['Token'],
                    'redirect_to_gateway' => $result['RedirectToGateway'],
                    'status' => $result['Status'] == '200' ? 'processing' : 'failed',
                    'remarks' => 'register',
                ]);


                // Save credits
                foreach ($data['CreditInformations'] as $credit) {
                    if ($credit['CrAmount'] < 1000) {
                        $purpose = 'vat';
                    } else {
                        $purpose = 'main';
                    }

                    $transaction->credits()->create([
                        'serial_no' => $credit['SerialNo'],
                        'cr_account_or_challan_no' => $credit['CrAccountOrChallanNo'],
                        'cr_amount' => $credit['CrAmount'],
                        'tran_mode' => $credit['TranMode'],
                        'onbehalf' => $credit['Onbehalf'],
                        'purpose' => $purpose,
                    ]);
                }
            });

            return redirect()->away($result['RedirectToGateway']);

        } else {
            return back()->with('error', $result['Message'] ?? 'Payment initiation failed.');
        }
    }

    public function paymentResponse(Request $request)
    {
        $token = $request->query('Token');
        $mode = $request->query('Mode');

        if (!$token) {
            return response()->json(['error' => 'Token missing'], 400);
        }

        $transaction = PaymentTransaction::where('token', $token)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found.'], 404);
        }

        $transaction->mode = $mode;
        $transaction->status = 'processing';
        $transaction->save();

        return redirect()->route('transaction.verify', ['token' => $token, 'mode' => $mode]);
    }

    public function verifyTransaction($token, $mode)
    {
        // API 3.4 call
        $response = Http::withHeaders([
            'Authorization' => 'Basic ZHVVc2VyMjAxNDE6ZHVVc2VyUGF5bWVudDIwMTQ=',
            'Content-Type' => 'application/json',
        ])->post('https://spg.sonalibank.com.bd/api/v3/spgservice/TransactionVerificationWithToken', [
            'Token' => $token,
        ]);

        $data = $response->json();

        if (!$response->successful() || empty($data['TransactionId'])) {
            return response()->json(['error' => 'Payment Verification failed'], 500);
        }

        // Update or create Transaction
        $transaction = PaymentTransaction::updateOrCreate(
            ['token' => $token],
            [
                'transaction_id' => $data['TransactionId'],
                'transaction_date' => $data['TransactionDate'],
                'status' => $data['Status'],
                'status_message' => $data['Message'],
                'invoice_no' => $data['InvoiceNo'],
                'invoice_date' => $data['InvoiceDate'],
                'request_amount' => $data['RequestTotalAmount'],
                'paid_amount' => $data['CustomerPaidAmount'],
                'extra_charges' => $data['ExtraCharges'],
                'branch_code' => $data['Branch'],
                'party_name' => $data['PartyName'],
                'settlement_done' => $data['SettlementDone'] === 'Y',
                'settlement_date' => $data['SettlementDate'],
                'pay_mode' => $data['PayMode'],
                'scroll_no' => $data['ScrollNo'],
                'voucher_link' => $data['SonaliVoucherLink'],
                'challan_link' => $data['ChallanLink'],
                'mode' => $mode,
            ]
        );

        return redirect()->route('payment.success', ['id' => $transaction->id]);
    }

    public function paymentSuccess()
    {
        return view('front.payment.success');
    }


}
