<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\PaymentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('ngoRegister', [AuthController::class, 'ngoRegister']);
Route::post('ngoLogin', [AuthController::class, 'ngoLogin']);
//Route::get('ngoEmailVerification/{id}', [AuthController::class, 'ngoEmailVerification']);

//Route::get('postEmailVerificationCode/', [AuthController::class, 'postEmailVerificationCode']);


Route::post('check/transaction', [PaymentController::class, 'checkTransaction']);

Route::group(['middleware' => ['jwt.verify']], function() {


    Route::get('ngoProfile', [AuthController::class,'ngoProfile']);
    Route::get('ngo/profileEdit', [AuthController::class,'profileEdit']);
    Route::post('ngo/profileUpdate', [AuthController::class,'profileUpdate']);
    Route::get('ngo/logout', [AuthController::class,'logout']);



    Route::controller(MainController::class)->group(function () {

         Route::get('renewList', 'renewList');
         Route::get('nameChangeList', 'nameChangeList');
         Route::get('fdNineList', 'fdNineList');
         Route::get('fdNineOneList', 'fdNineOneList');

    });



});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
