<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\BankAccountInfo;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $locale = App::getLocale();
        $data['bankAccountInfo'] = BankAccountInfo::where('user_id', Auth::id())->first();

        if ($locale == 'en') {
            $data['banks'] = Bank::select('id', 'name_bn', 'status')
                ->orderBy('name_bn', 'asc')
                ->get();
        } else {
            $data['banks'] = Bank::select('id', 'name_en', 'status')
                ->orderBy('name_en', 'asc')
                ->get();
        }

        return view('front.profile.index', $data);
    }

    public function profileUpdate(Request $request, $id)
    {
        $filePath = "userImage";

        try {
            DB::beginTransaction();
            $ngo = User::find($id);
            $ngo->user_name = $request->name;
            $ngo->email = $request->email;
            $ngo->user_phone = $request->phone;
            $ngo->user_address = $request->address;
            $ngo->web_address = $request->web_address;

            if ($request->hasfile('ngo_logo')) {
                $file = $request->file('ngo_logo');
                $ngo->user_image = CommonController::imageUpload($request, $file, $filePath);
            }

            $ngo->save();
            DB::commit();

            return back()->with('success', 'updated Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }

    public function bankAccountUpdate(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            BankAccountInfo::updateOrCreate(
                ['user_id' => $id],
                [
                    'bank_id' => $request->bank_id,
                    'account_number' => $request->account_number,
                    'account_type' => $request->account_type,
                    'branch_name' => $request->branch_name,
                    'bank_address' => $request->bank_address,
                ]
            );


            DB::commit();

            return back()->with('success', 'updated Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }
}
