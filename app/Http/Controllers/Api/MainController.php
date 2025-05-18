<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Models\FormEight;
use App\Models\FdOneForm;
use Auth;
use App;
use Session;
use DateTime;
use DateTimezone;
use App\Models\NgoNameChange;
use App\Models\NgoRenew;
use App\Models\Fd9Form;
use App\Models\Fd9OneForm;
use App\Http\Resources\NameChangeResource;
use App\Http\Resources\RenewResource;
use App\Http\Resources\FdNineResource;
use App\Http\Resources\FdNineOneResource;
use Validator;
use JWTAuth;
class MainController extends Controller
{


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


    public function nameChangeList(Request $request){


           //valid credential
      $validator = Validator::make($request->only('token'), [
        'token' => 'required'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 200);
    }

    $userId = JWTAuth::user()->id;

    $fdOneFormId = FdOneForm::where('user_id',$userId)->value('id');

    $ngoNameChangeStatus =  NgoNameChange::where('fd_one_form_id',$fdOneFormId)->latest()->get();

        return $this->sendResponse(NameChangeResource::collection($ngoNameChangeStatus), 'Name Change List fetched.');



    }


    public function renewList(Request $request){

           //valid credential
      $validator = Validator::make($request->only('token'), [
        'token' => 'required'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 200);
    }


    $userId = JWTAuth::user()->id;

    $fdOneFormId = FdOneForm::where('user_id',$userId)->value('id');

    $renewStatus =  NgoRenew::where('fd_one_form_id',$fdOneFormId)->latest()->get();

        return $this->sendResponse(RenewResource::collection($renewStatus), 'Renew List fetched.');



    }


    public function fdNineList(Request $request){


              //valid credential
      $validator = Validator::make($request->only('token'), [
        'token' => 'required'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 200);
    }


    $userId = JWTAuth::user()->id;

    $fdOneFormId = FdOneForm::where('user_id',$userId)->value('id');

    $fd9Status =  Fd9Form::where('fd_one_form_id',$fdOneFormId)->latest()->get();


    return $this->sendResponse(FdNineResource::collection($fd9Status), 'FD Nine List fetched.');


    }


    public function fdNineOneList(Request $request){

               //valid credential
      $validator = Validator::make($request->only('token'), [
        'token' => 'required'
    ]);

    //Send failed response if request is not valid
    if ($validator->fails()) {
        return response()->json(['error' => $validator->messages()], 200);
    }


    $userId = JWTAuth::user()->id;

    $fdOneFormId = FdOneForm::where('user_id',$userId)->value('id');



    $fd9OneStatus =  Fd9OneForm::where('fd_one_form_id',$fdOneFormId)->latest()->get();


    return $this->sendResponse(FdNineOneResource::collection($fd9OneStatus), 'FD Nine One List fetched.');



    }
}
