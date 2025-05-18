<?php

namespace App\Http\Controllers;

use App\Models\FdOneForm;
use App\Models\Fund;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function paymentSuccess()
    {
        return view('front/payment/success');
    }

    public function renewPaymentSuccess()
    {
        $data['ngo_list_all'] = FdOneForm::where('user_id', Auth::user()->id)->first();
        return view('front/payment/renew_payment_success', $data);
    }
}
