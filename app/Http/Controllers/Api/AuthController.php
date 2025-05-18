<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use App\Models\UserVerify;
use Hash;
use Illuminate\Support\Str;
use Mail;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Crypt;
use DB;
use Illuminate\Http\JsonResponse;
use JWTAuth;
use Carbon\Carbon;
use App\Models\NgoStatus;
use App\Models\FdOneForm;


class AuthController extends Controller
{

    public $token = true;
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }


    public function ngoRegister(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'ngo_name' => 'required',
            'email' => 'required|email|unique:users',
            'ngo_phone' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $password = bcrypt($input['password']);



        $createUser = new User;
        $createUser->user_name = $request->ngo_name;
        $createUser->non_verified_email = $request->email;
        $createUser->password = $password;
        $createUser->user_phone = $request->ngo_phone;
        $createUser->save();


        $token = random_int(100000, 999999);

        UserVerify::create([
              'user_id' => $createUser->id,
              'token' => $token
            ]);

        Mail::send('emails.appVerificationEmail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('NGOAB Registration Service || User Sign Up & Email Verification');
          });





        return response()->json([
            'success' => true,
            'message' => 'User register successfully.Check Email For Verification',
             //'token' => $token
            'data' => $createUser->id
        ], Response::HTTP_OK);


       // return $this->sendResponse($success, 'User register successfully.Check Email For Verification');
    }






    public function ngoLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
        return $credentials;
            return response()->json([
                    'success' => false,
                    'message' => 'Could not create token.',
                ], 500);
        }

        //

        $user_id = JWTAuth::user()->id;


        //use App\Models\NgoStatus;
$fdOneFormId = FdOneForm::where('user_id',$user_id)->value('id');
$ngoApprovedOrNot = NgoStatus::where('fd_one_form_id',$fdOneFormId)->value('status');


if($ngoApprovedOrNot == 'Accepted'){


    $ngoStatus = 'Approved';
    $submitStatus = 'Application Submitted';

}else{

    if(empty($ngoApprovedOrNot)){

        $ngoStatus = 'unApproved';
        $submitStatus = 'Application Not Submitted Yet, Or You Have Not Complete Forms';

    }else{

        $ngoStatus = $ngoApprovedOrNot;
        $submitStatus = 'Application Submitted';
    }



}



        //

        //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
            'token_type' => 'Bearer ',
            'ngoStatus' =>$ngoStatus,
            'submitStatus'=>$submitStatus
        ]);
    }



    public function logout(Request $request)
    {
        //valid credential
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

  //Request is validated, do logout
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function ngoProfile(Request $request)
    {
        //valid credential
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $user = JWTAuth::authenticate($request->token);

        return response()->json(['user' => $user]);
    }



    public function profileEdit(Request $request)
    {

       //valid credential
       $validator = Validator::make($request->only('token'), [
        'token' => 'required'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 200);
    }


        $user = User::find($request->id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user not found.'
            ], 400);
        }

        return $user;
    }


    public function profileUpdate(Request $request){


      //valid credential
      $validator = Validator::make($request->only('token'), [
        'token' => 'required'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 200);
    }




    $input = $request->all();



    $userEmailPrevious = User::where('id',$request->id)->value('email');


    if($userEmailPrevious == $request->email){




        $createUser = User::find($request->id);
        $createUser->user_name = $request->ngo_name;
        $createUser->non_verified_email = $request->email;

        if($request->password) {
        $password = bcrypt($input['password']);
        $createUser->password = $password;
        }

        $createUser->user_phone = $request->ngo_phone;
        $createUser->save();


        return response()->json([
            'success' => true,
            'message' => 'User Updated Successfully',
             //'token' => $token
            'data' => $createUser->id
        ], Response::HTTP_OK);





    }else{







    $createUser = new User;
    $createUser->user_name = $request->ngo_name;
    $createUser->non_verified_email = $request->email;

    if($request->password) {
    $password = bcrypt($input['password']);
    $createUser->password = $password;
    }

    $createUser->user_phone = $request->ngo_phone;
    $createUser->save();


    $token = random_int(100000, 999999);

    UserVerify::create([
          'user_id' => $createUser->id,
          'token' => $token
        ]);

    Mail::send('emails.appVerificationEmail', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('NGOAB Registration Service || User Sign Up & Email Verification');
      });





    return response()->json([
        'success' => true,
        'message' => 'User register successfully.Check Email For Verification',
         //'token' => $token
        'data' => $createUser->id
    ], Response::HTTP_OK);

}

    }
}
