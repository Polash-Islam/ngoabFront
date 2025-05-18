<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FormCompleteStatus;
use App\Models\SystemInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;
use App\Models\UserVerify;

//use Hash;
use Illuminate\Support\Str;

//use Mail;
//use DB;
use App\Models\NgoTypeAndLanguage;
use App\Models\NgoNameChange;
use App\Models\NgoRenew;
use App\Models\RenewalFile;
use App\Models\FormEight;
use App\Models\FdOneForm;
use App\Models\FdOneOtherPdfList;
use App\Models\FormOneOtherPdfList;
use App\Models\FormOneBankAccount;
use App\Models\Fdoneformadviser;
use App\Models\FdOneSourceOfFund;
use App\Models\FdOneMemberList;
use App\Models\NgoMemberNidPhoto;
use App\Models\NgoOtherDoc;
use App\Http\Controllers\NGO\CommonController;

class AuthController extends Controller
{

    public function passwordChangeConfirmed(Request $request)
    {
        try {

            DB::beginTransaction();

            $get_all_data = User::find($request->id);
            $get_all_data->password = Hash::make($request->password);
            $get_all_data->save();

            DB::commit();

            return redirect('/login')->with('success', 'Password Successfully Changed!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }

    public function passwordResetPage($id)
    {

        $id = $id;

        return view('front.auth_page.password_reset_page', compact('id'));

    }

    public function checkMailFromList(Request $request)
    {

        $type_email = $request->type_email;
        $data = User::where('email', $type_email)->value('email');

        return response()->json($data);

    }


    public function checkMailAlreadyRegisteredOrNot(Request $request)
    {

        $main_data = User::where('email', $request->pass)->value('email');

        if (empty($main_data)) {

            $data = '<span style="color:green;">Email Available</span>';

        } else {

            $data = '<span style="color:red;">Email Already In Used</span>';

        }

        return $data;

    }


    public function sendMailGetFromList(Request $request)
    {
        try {

            $useremail = $request->email;
            $main_data = User::where('email', $useremail)->first();
            $id = $main_data->id;
            $email = $main_data->email;

            Mail::send('emails.passwordResetEmail', ['id' => $id], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('NGOAB Registration Service || Password Reset ');
            });

            return redirect('/login')->with('success', 'Email Sent Successfully!');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }

    public function showLinkRequestForm()
    {

        return view('front.auth_page.showLinkRequestForm');
    }

    public function index()
    {
        $systemInformation = SystemInformation::first();
        return view('front.auth_page.login', compact('systemInformation'));
    }

    public function registration()
    {
        $systemInformation = SystemInformation::first();
        return view('front.auth_page.register', compact('systemInformation'));
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required | string',
            'password' => 'required|string',
        ];

        $systemInformation = SystemInformation::first();
        if ($systemInformation->reCaptcha_status_login) {
            $rules['g-recaptcha-response'] = 'sometimes|required|captcha';
        }

        Validator::make($request->all(), $rules)->validate();

        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {

                return redirect()->intended('dashboard')->with('success', 'You have Successfully logged in');
            }

            return redirect("login")->with('error', 'Opps! You have entered invalid credentials');

        } catch (\Exception $e) {
            return redirect()->route('error_404');
        }
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    public function postRegistration(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone' => 'required|digits:11',
            'password' => 'required|min:5',
        ];

        $systemInformation = SystemInformation::first();
        if ($systemInformation->reCaptcha_status_registration) {
            $rules['g-recaptcha-response'] = 'sometimes|required|captcha';
        }

        Validator::make($request->all(), $rules)->validate();


//        try {

            DB::beginTransaction();

            $createUser = new User;
            $createUser->user_name = $request->name;
            $createUser->non_verified_email = $request->email;
            $createUser->password = Hash::make($request->password);
            $createUser->user_phone = $request->phone;
            $createUser->web_address = $request->web_address;
            $createUser->save();

            $token = Str::random(10);

            UserVerify::create([
                'user_id' => $createUser->id,
                'token' => $token
            ]);

            Mail::send('emails.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('
                NGOAB Registration Service || User Sign Up & Email Verification');
            });

            DB::commit();
            return redirect("emailVerifyPage");

//        } catch (\Exception $e) {
//            DB::rollBack();
//            return redirect()->route('error_404');
//        }

    }


    public function updateRegistration(Request $request)
    {
        $filePath = "userImage";
        $get_previous_email_all = User::where('id', $request->id)->value('email');

        if ($get_previous_email_all == $request->email) {

            try {
                $get_all_data = User::find($request->id);
                $get_all_data->user_name = $request->name;
                $get_all_data->user_phone = $request->phone;
                $get_all_data->user_address = $request->address;
                $get_all_data->email = $request->email;

                if ($request->hasfile('user_image')) {

                    $file = $request->file('user_image');
                    $get_all_data->user_image = CommonController::imageUpload($request, $file, $filePath);

                }

                if ($request->password) {
                    $get_all_data->password = Hash::make($request->password);
                }

                $get_all_data->save();


                return Redirect()->back()->with('success', 'updated Successfully');


            } catch (\Exception $e) {

                return redirect()->route('error_404');
            }

        } else {

            try {


                $get_all_data = User::find($request->id);
                $get_all_data->user_name = $request->name;
                $get_all_data->user_phone = $request->phone;
                $get_all_data->user_address = $request->address;
                $get_all_data->email = $request->email;
                $get_all_data->is_email_verified = 0;
                if ($request->hasfile('user_image')) {

                    $file = $request->file('user_image');
                    $get_all_data->user_image = CommonController::imageUpload($request, $file, $filePath);

                }
                if ($request->password) {
                    $get_all_data->password = Hash::make($request->password);
                }
                $get_all_data->save();

                $token = Str::random(10);

                UserVerify::where('user_id', $request->id)->delete();

                UserVerify::create([
                    'user_id' => $request->id,
                    'token' => $token
                ]);

                Mail::send('emails.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject('NGOAB Registration Service || User Sign Up & Email Verification');
                });

                Session::flush();
                Auth::logout();
                DB::commit();

                return Redirect('login')->with('success', 'Please Check Mail For Varification');;
            } catch (\Exception $e) {

                return redirect()->route('error_404');
            }

        }
    }


    public function create(array $data)
    {
        return User::create([
            'user_name' => $data['name'],
            'email' => $data['email'],
            'user_phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
//        try {
            $fdOneForm = FdOneForm::where('user_id', Auth::id())->first();
            $data['form_complete_statuses'] = FormCompleteStatus::where('user_id', Auth::user()->id)->first();
//            dd($data['form_complete_statuses']);
            $data['first_one_form_check_status'] = NgoTypeAndLanguage::where('user_id', Auth::user()->id)->value('first_one_form_check_status');
            if (Auth::check()) {

                $ngo_list_all = FdOneForm::where('user_id', Auth::user()->id)->value('id');
                $newOldNgo = CommonController::newOldNgo();

                if ($newOldNgo != 'Old') {
                    $ngo_status_list = DB::table('ngo_statuses')->where('fd_one_form_id', $ngo_list_all)->value('status');
                } else {
                    $ngo_status_list = DB::table('ngo_renews')->where('fd_one_form_id', $ngo_list_all)->value('status');
                }


                if (empty($ngo_status_list) || $ngo_status_list == 'Ongoing' || $ngo_status_list == 'Correct' || $ngo_status_list == 'Rejected' || $ngo_status_list == 'Old Ngo Renew') {

                    $get_reg_id = DB::table('ngo_statuses')->where('fd_one_form_id', $ngo_list_all)->value('status');
                    $mainNgoType = CommonController::changeView();
                    if ($mainNgoType == 'দেশিও') {
                        return view('front.dashboard.dashboard', $data, compact('ngo_status_list', 'get_reg_id', 'fdOneForm'));
                    } else {
                        return view('front.dashboard.foreign.dashboard', $data, compact('ngo_status_list', 'get_reg_id', 'fdOneForm'));
                    }

                } else {
                    $ngo_list_all = FdOneForm::where('user_id', Auth::user()->id)->first();
                    $name_change_list_r = NgoRenew::where('fd_one_form_id', $ngo_list_all->id)->get();
                    $name_change_list = NgoNameChange::where('fd_one_form_id', $ngo_list_all->id)->get();
                    $ngo_list_all_form_eight = FormEight::where('fd_one_form_id', $ngo_list_all->id)->first();
                    $form_member_data_doc = NgoMemberNidPhoto::where('fd_one_form_id', $ngo_list_all->id)->get();
                    $form_ngo_data_doc = NgoOtherDoc::where('fd_one_form_id', $ngo_list_all->id)->get();
                    $all_source_of_fund = FdOneSourceOfFund::where('fd_one_form_id', $ngo_list_all->id)->get();
                    $get_all_data_other = FdOneOtherPdfList::where('fd_one_form_id', $ngo_list_all->id)->get();
                    $oldOrNewStatus = NgoTypeAndLanguage::where('user_id', Auth::user()->id)->first();

                    CommonController::checkNgotype(1);
                    $mainNgoType = CommonController::changeView();
                    $ngoOtherDocLists = RenewalFile::where('fd_one_form_id', $ngo_list_all->id)->latest()->get();

                    if ($mainNgoType == 'দেশিও') {
                        return view('front.dashboard.accept_dashboard', $data, compact('ngo_status_list', 'ngoOtherDocLists', 'oldOrNewStatus', 'name_change_list_r', 'name_change_list', 'get_all_data_other', 'all_source_of_fund', 'form_ngo_data_doc', 'ngo_list_all_form_eight', 'ngo_list_all', 'form_member_data_doc', 'fdOneForm'));
                    } else {
                        return view('front.dashboard.foreign.accept_dashboard', $data, compact('ngo_status_list', 'ngoOtherDocLists', 'oldOrNewStatus', 'name_change_list_r', 'name_change_list', 'get_all_data_other', 'all_source_of_fund', 'form_ngo_data_doc', 'ngo_list_all_form_eight', 'ngo_list_all', 'form_member_data_doc', 'fdOneForm'));
                    }

                }
            }

            return redirect("login")->with('error', 'Opps! You do not have access');

//        } catch (\Exception $e) {
//            return redirect()->route('error_404');
//        }
    }

    public function logout()
    {

        Auth::logout();

        return Redirect('login');
    }


    public function verifyAccount($token)
    {
        try {

            DB::beginTransaction();

            $verifyUser = UserVerify::where('token', $token)->first();
            $message = 'Sorry your email cannot be identified.';

            if (!is_null($verifyUser)) {

                $user = $verifyUser->user;

                if (!$user->is_email_verified) {
                    $verifyUser->user->email = $verifyUser->user->non_verified_email;
                    $verifyUser->user->is_email_verified = 1;
                    $verifyUser->user->save();
                    $message = "Your e-mail is verified. You can now login.";
                } else {
                    $message = "Your e-mail is already verified. You can now login.";
                }
            }

            DB::commit();
            return redirect("emailVerifiedPage");

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }
}
