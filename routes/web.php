<?php

use App\Http\Controllers\NGO\ProfileController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\NGO\OtherformController;
use App\Http\Controllers\NGO\CeoInfoController;
use App\Http\Controllers\NGO\FormeightController;
use App\Http\Controllers\NGO\NgomemberController;
use App\Http\Controllers\NGO\NgomemberdocController;
use App\Http\Controllers\NGO\NgodocumentController;
use App\Http\Controllers\NGO\FdoneformController;
use App\Http\Controllers\NGO\RegsubmitController;
use App\Http\Controllers\NGO\NamechangeController;
use App\Http\Controllers\NGO\RenewController;
use App\Http\Controllers\NGO\NVisaController;
use App\Http\Controllers\NGO\Fd9Controller;
use App\Http\Controllers\NGO\Fd9OneController;
use App\Http\Controllers\NGO\Fd2FormController;
use App\Http\Controllers\NGO\Fd6FormController;
use App\Http\Controllers\NGO\Fd7FormController;
use App\Http\Controllers\NGO\Fc1FormController;
use App\Http\Controllers\NGO\Fc2FormController;
use App\Http\Controllers\NGO\Fd3FormController;
use App\Http\Controllers\NGO\OLDNGO\FD8Controller;
use App\Http\Controllers\NGO\ApprovalOfConstitutionController;
use App\Http\Controllers\NGO\DuplicateCertificateController;
use App\Http\Controllers\NGO\ExecutiveComitteeApprovalController;
use App\Http\Controllers\NGO\FdFiveFormController;
use App\Http\Controllers\Front\ComplainMonitorController;
use App\Http\Controllers\NGO\FormNoSevenController;
use App\Http\Controllers\NGO\FormNoFiveController;
use App\Http\Controllers\NGO\FormNoFourController;
use App\Http\Controllers\NGO\FdFourFormController;
use App\Http\Controllers\NGO\FdFourOneController;
use App\Http\Controllers\NGO\Fd6FormPartTwoController;
use App\Http\Controllers\BankController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'clear cache';
});

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('index');

});

Route::controller(NamechangeController::class)->group(function () {


    Route::put('nameChangeSingleFile/{id}', 'nameChangeSingleFile')->name('nameChangeSingleFile');
    Route::get('addOtherDocEdit/{id}', 'addOtherDocEdit')->name('addOtherDocEdit');
    Route::delete('namechangeApplicationDelete/{id}', 'namechangeApplicationDelete')->name('namechangeApplicationDelete');
    Route::get('namechangeApplicationEdit/{id}', 'namechangeApplicationEdit')->name('namechangeApplicationEdit');
    Route::post('namechangeApplicationUpdate', 'namechangeApplicationUpdate')->name('namechangeApplicationUpdate');


    Route::get('finalNamechangeSubmit/{id}', 'finalNamechangeSubmit')->name('finalNamechangeSubmit');

    Route::get('addOtherDoc', 'addOtherDoc')->name('addOtherDoc');
    Route::post('storeOtherDoc', 'storeOtherDoc')->name('storeOtherDoc');
    Route::post('updateOtherDoc', 'updateOtherDoc')->name('updateOtherDoc');
    Route::get('finalSubmitNameChange', 'finalSubmitNameChange')->name('finalSubmitNameChange');
    Route::get('allNgoRelatedDocument', 'allNgoRelatedDocument')->name('allNgoRelatedDocument');
    Route::get('ngoMemberNidAndImage', 'ngoMemberNidAndImage')->name('ngoMemberNidAndImage');
    Route::get('ngoMemberNidAndImageAdd', 'ngoMemberNidAndImageAdd')->name('ngoMemberNidAndImageAdd');
    Route::post('ngoMemberNidAndImageStore', 'ngoMemberNidAndImageStore')->name('ngoMemberNidAndImageStore');
    Route::post('ngoMemberNidAndImageUpdate', 'ngoMemberNidAndImageUpdate')->name('ngoMemberNidAndImageUpdate');
    Route::get('formEightData', 'formEightData')->name('formEightData');
    Route::get('formEightDataAdd', 'formEightDataAdd')->name('formEightDataAdd');
    Route::get('formEightDataEdit/{id}', 'formEightDataEdit')->name('formEightDataEdit');
    Route::post('formEightDataStore', 'formEightDataStore')->name('formEightDataStore');
    Route::post('formEightDataUpdate', 'formEightDataUpdate')->name('formEightDataUpdate');
    Route::post('formEightDataDelete/{id}', 'delete')->name('formEightDataDelete');
    Route::get('ngoCommitteMember', 'ngoCommitteMember')->name('ngoCommitteMember');
    Route::get('ngoCommitteMemberAdd', 'ngoCommitteMemberAdd')->name('ngoCommitteMemberAdd');
    Route::get('ngoCommitteMemberEdit/{id}', 'ngoCommitteMemberEdit')->name('ngoCommitteMemberEdit');
    Route::post('ngoCommitteMemberStore', 'ngoCommitteMemberStore')->name('ngoCommitteMemberStore');
    Route::post('ngoCommitteMemberUpdate', 'ngoCommitteMemberUpdate')->name('ngoCommitteMemberUpdate');
    Route::get('nameChangeDocDownload/{id}', 'nameChangeDocDownload')->name('nameChangeDocDownload');
    Route::get('nameChange/{id}', 'nameChangeView')->name('nameChange.view');
    Route::get('sendNameChange', 'sendNameChange')->name('sendNameChange');
    Route::get('nameChange', 'nameChange')->name('nameChange');
    Route::get('/formOnePdf/{main_id}/{id}', 'formOnePdf')->name('formOnePdf');
    Route::get('/formEightPdf/{main_id}', 'formEightPdf')->name('formEightPdf');
    Route::get('/sourceOfFund/{id}', 'sourceOfFund')->name('sourceOfFund');
    Route::get('/otherPdfFromFDOneForm/{id}', 'otherPdfFromFDOneForm')->name('otherPdfFromFDOneForm');
    Route::get('/ngoOtherDocument/{id}', 'ngoOtherDocument')->name('ngoOtherDocument');
    Route::get('/ngoMemberDocument/{id}', 'ngoMemberDocument')->name('ngoMemberDocument');
});


Route::controller(RenewController::class)->group(function () {

    Route::get('finalRenewApplicationSubmit/{id}', 'finalRenewApplicationSubmit')->name('finalRenewApplicationSubmit');

    Route::get('fileListForNameChange', 'fileListForNameChange')->name('fileListForNameChange');
    Route::get('foreignNgoType', 'foreignNgoType')->name('foreignNgoType');
    Route::get('localNgoType', 'localNgoType')->name('localNgoType');
    Route::get('changeAcNumberDownload/{id}', 'changeAcNumberDownload')->name('changeAcNumberDownload');
    Route::get('dueVatPdfDownload/{id}', 'dueVatPdfDownload')->name('dueVatPdfDownload');
    Route::get('copyOfChalanPdfDownload/{id}', 'copyOfChalanPdfDownload')->name('copyOfChalanPdfDownload');
    Route::get('yearlyBudgetPdfDownload/{id}', 'yearlyBudgetPdfDownload')->name('yearlyBudgetPdfDownload');
    Route::get('foreginPdfDownload/{id}', 'foreginPdfDownload')->name('foreginPdfDownload');
    Route::post('verifiedFdEightDownload', 'verifiedFdEightDownload')->name('verifiedFdEightDownload');
    Route::get('downloadRenewPdf/{id}', 'downloadRenewPdf')->name('downloadRenewPdf');
    Route::get('renewChief', 'renewChief')->name('renewChief');
    Route::get('renewInfo/{id}', 'renewInfo')->name('renewInfo');
    Route::get('renew', 'renew')->name('renew');

    Route::get('renewPaymentInfo', 'renewPaymentInfo')->name('renewPaymentInfo');

    Route::get('ngoRenewStepAdd', 'ngoRenewStepAdd')->name('ngoRenewStepAdd');
    Route::get('ngoRenewStepOne', 'ngoRenewStepOne')->name('ngoRenewStepOne');
    Route::get('ngoRenewStepTwo/{id}', 'ngoRenewStepTwo')->name('ngoRenewStepTwo');
    Route::post('ngoRenewStepTwoPost', 'ngoRenewStepTwoPost')->name('ngoRenewStepTwoPost');
    Route::post('ngoRenewStepTwoUpdate', 'ngoRenewStepTwoUpdate')->name('ngoRenewStepTwoUpdate');

    Route::get('ngoRenewStepFour/{id}', 'ngoRenewStepFour')->name('ngoRenewStepFour');
    Route::post('ngoRenewStepFourPost', 'ngoRenewStepFourost')->name('ngoRenewStepFourPost');
    Route::post('ngoRenewStepFourUpdate', 'ngoRenewStepFourUpdate')->name('ngoRenewStepFourUpdate');


    Route::post('storeRenewInformationList', 'storeRenewInformationList')->name('storeRenewInformationList');
    Route::post('updateRenewInformationList', 'updateRenewInformationList')->name('updateRenewInformationList');
    Route::get('allStaffInformationForRenew', 'allStaffInformationForRenew')->name('allStaffInformationForRenew');
    Route::post('allStaffInformationForRenewStore', 'allStaffInformationForRenewStore')->name('allStaffInformationForRenewStore');
    Route::get('otherInformationForRenew', 'otherInformationForRenew')->name('otherInformationForRenew');
    Route::post('otherInformationForRenewNewPost', 'otherInformationForRenewNewPost')->name('otherInformationForRenewNewPost');
    Route::post('otherInformationForRenewGet', 'otherInformationForRenewGet')->name('otherInformationForRenewGet');
});


Route::controller(RegsubmitController::class)->group(function () {

    Route::get('regSubmitList', 'regSubmitList')->name('regSubmitList');
});

Route::controller(AuthController::class)->group(function () {

    //Route::get('ngoCeoInformation','ngoCeoInformation')->name('ngoCeoInformation');

    Route::get('/checkMailAlreadyRegisteredOrNot', 'checkMailAlreadyRegisteredOrNot')->name('checkMailAlreadyRegisteredOrNot');
    Route::get('/checkMailFromList', 'checkMailFromList')->name('checkMailFromList');
    Route::post('/sendMailGetFromList', 'sendMailGetFromList')->name('sendMailGetFromList');
    Route::get('/passwordResetPage/{id}', 'passwordResetPage')->name('passwordResetPage');
    Route::get('/successfullyMailSend/{id}', 'successfullyMailSend')->name('successfullyMailSend');
    Route::post('/passwordChangeConfirmed', 'passwordChangeConfirmed')->name('passwordChangeConfirmed');
    Route::get('/passwordReset', 'showLinkRequestForm')->name('admin.password.request');
    Route::get('login', 'index')->name('login');
    Route::post('postLogin', 'postLogin')->name('login.post');
    Route::get('registration', 'registration')->name('register');
    Route::post('postRegistration', 'postRegistration')->name('register.post');
    Route::post('updateRegistration', 'updateRegistration')->name('register.update');
    Route::get('logout', 'logout')->name('logout');

    /* New Added Routes */
    Route::get('dashboard', 'dashboard')->middleware(['auth', 'is_verify_email'])->name('dashboard');
    Route::get('account/verify/{token}', 'verifyAccount')->name('user.verify');

});

Route::controller(OtherformController::class)->group(function () {

    Route::post('oott', 'oott')->name('oott');


    Route::get('signature_modal', 'signature_modal')->name('signature_modal');
    Route::get('seal_modal', 'seal_modal')->name('seal_modal');
    Route::get('error_404', 'error_404')->name('error_404');

    Route::post('signatureCrop', 'signatureCrop')->name('signatureCrop');
    Route::post('sealCrop', 'sealCrop')->name('sealCrop');


    /// 12 february code start
    Route::get('ngoInstructionPageApply', 'ngoInstructionPageApply')->name('ngoInstructionPageApply');
    Route::get('ngoInstructionPageaRenew', 'ngoInstructionPageaRenew')->name('ngoInstructionPageaRenew');
    Route::get('ngoInstructionPageNameChange', 'ngoInstructionPageNameChange')->name('ngoInstructionPageNameChange');
    ///12 february code end

    Route::get('allNoticeBoard', 'allNoticeBoard')->name('allNoticeBoard');
    Route::get('viewNotice/{id}', 'viewNotice')->name('viewNotice');
    Route::get('informationResetPage', 'informationResetPage')->name('informationResetPage');
    Route::get('frequentlyAskQuestion', 'frequentlyAskQuestion')->name('frequentlyAskQuestion');
    Route::post('checkStatusRegFrom', 'checkStatusRegFrom')->name('checkStatusRegFrom');
    Route::get('statusPage', 'statusPage')->name('statusPage');
    Route::get('emailVerifyPage', 'emailVerifyPage')->name('emailVerifyPage');
    Route::get('emailVerifiedPage', 'emailVerifiedPage')->name('emailVerifiedPage');
    Route::get('ngoInstructionPage', 'ngoInstructionPage')->name('ngoInstructionPage');
    Route::get('ngoRegistrationFeeList', 'ngoRegistrationFeeList')->name('ngoRegistrationFeeList');
    Route::get('lang/change', 'change')->name('changeLang');
    Route::get('changeLanguage/{lan}', 'changeLanguage')->name('changeLanguage');

    Route::group(['middleware' => ['auth']], function () {

        Route::post('finalSubmitRegForm', 'finalSubmitRegForm')->name('finalSubmitRegForm');
        Route::post('renewalSubmitForOld', 'renewalSubmitForOld')->name('renewalSubmitForOld');
        Route::post('updateUser', 'updateUser')->name('updateUser');
        Route::post('resetAllData', 'resetAllData')->name('resetAllData');
        Route::post('ngoTypeAndLanguagePost', 'ngoTypeAndLanguagePost')->name('ngoTypeAndLanguagePost');
        Route::post('ngoTypeAndLanguageDelete/{id}', 'ngoTypeAndLanguageDelete')->name('ngoTypeAndLanguageDelete');
        Route::get('ngoTypeAndLanguage', 'ngoTypeAndLanguage')->name('ngoTypeAndLanguage');
        Route::get('ngoRegistrationFirstInfo', 'ngoRegistrationFirstInfo')->name('ngoRegistrationFirstInfo');
        Route::post('ngoRegistrationFirstInfoPost', 'ngoRegistrationFirstInfoPost')->name('ngoRegistrationFirstInfoPost');
        Route::get('ngoAllRegistrationForm', 'ngoAllRegistrationForm')->name('ngoAllRegistrationForm');
        Route::get('reSubmitNgoRegistration', 'reSubmitNgoRegistration')->name('reSubmitNgoRegistration');
    });


    // Registration Payment Route
    Route::get('ngo/registration/payment', [PaymentController::class, 'makePayment'])->name('ngoNibondhonPayment');
    Route::get('/payment/checkout', [PaymentController::class, 'doCheckout'])->name('doCheckout');
    Route::get('/payment/callback', [PaymentController::class, 'paymentCallback'])->name('sonali-payment.callback');
    Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

    // payment update route
//    Route::get('/payment/initiate', [PaymentController::class, 'initiateForm'])->name('payment.initiate');
    Route::get('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment/response', [PaymentController::class, 'paymentResponse'])->name('payment.response');
    Route::get('/transaction/verify/{token}/{mode}', [PaymentController::class, 'verifyTransaction'])->name('transaction.verify');
    Route::get('/payment/success/{id}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

    // Renew Payment Route
    Route::get('renew/payment/checkout', [PaymentController::class, 'renewPaymentCheckout'])->name('renewPaymentCheckout');
    Route::get('renew/payment/success', [PaymentController::class, 'renewPaymentSuccess'])->name('renew.payment.success');

});


Route::group(['middleware' => ['auth']], function () {

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile/update/{id}', [ProfileController::class, 'profileUpdate'])->name('profile.update');

    Route::post('bank/account/update/{id}', [ProfileController::class, 'bankAccountUpdate'])->name('bank.account.update');

    Route::resource('ngoCeoInfo', CeoInfoController::class);
    Route::controller(CeoInfoController::class)->group(function () {

        Route::get('ceoInfoUpdate/{id}', 'ceoInfoUpdate')->name('ceoInfoUpdate');

    });
    Route::resource('complain', ComplainMonitorController::class);

    Route::controller(FD8Controller::class)->group(function () {

        Route::get('updateDataStepOneFd8/{id}', 'updateDataStepOneFd8')->name('updateDataStepOneFd8');
        Route::get('updateDataStepTwoFd8/{id}', 'updateDataStepTwoFd8')->name('updateDataStepTwoFd8');
        Route::get('updateDataStepThreeFd8/{id}', 'updateDataStepThreeFd8')->name('updateDataStepThreeFd8');
        Route::get('updateDataStepFourFd8/{id}', 'updateDataStepFourFd8')->name('updateDataStepFourFd8');
        Route::get('addDataStepOneFd8/{id}', 'addDataStepOneFd8')->name('addDataStepOneFd8');
        Route::get('addDataStepTwoFd8/{id}', 'addDataStepTwoFd8')->name('addDataStepTwoFd8');
        Route::get('addDataStepThreeFd8/{id}', 'addDataStepThreeFd8')->name('addDataStepThreeFd8');
        Route::get('addDataStepFourFd8/{id}', 'addDataStepFourFd8')->name('addDataStepFourFd8');
    });


    Route::resource('fdFourForm', FdFourFormController::class);
    Route::resource('fdFourOneForm', FdFourOneController::class);
    Route::resource('formNoSeven', FormNoSevenController::class);
    Route::resource('formNoFive', FormNoFiveController::class);
    Route::resource('formNoFour', FormNoFourController::class);

    Route::controller(FdFourOneController::class)->group(function () {
        Route::get('fd4Onepdfview/{id}', 'fd4Onepdfview')->name('fd4Onepdfview');
        Route::get('fdFourOneExpendatureDelete', 'fdFourOneExpendatureDelete')->name('fdFourOneExpendatureDelete');
        Route::post('fdFourOneExpendaturePost', 'fdFourOneExpendaturePost')->name('fdFourOneExpendaturePost');
        Route::post('fdFourOneExpendatureUpdate', 'fdFourOneExpendatureUpdate')->name('fdFourOneExpendatureUpdate');
        Route::get('fdFourOneSend/{id}', 'fdFourOneSend')->name('fdFourOneSend');
    });

    Route::controller(FdFourFormController::class)->group(function () {
        Route::get('fd4pdfview/{id}', 'fd4pdfview')->name('fd4pdfview');
        Route::get('addFdFourFormData/{id}', 'addFdFourFormData')->name('addFdFourFormData');
        Route::get('editFdFourFormData/{id}', 'editFdFourFormData')->name('editFdFourFormData');
        Route::get('fdFourSend/{id}', 'fdFourSend')->name('fdFourSend');

        Route::get('fdFourOneDataPost/{id}', 'fdFourOneDataPost')->name('fdFourOneDataPost');
        Route::get('fdFourOneDataUpdate/{id}', 'fdFourOneDataUpdate')->name('fdFourOneDataUpdate');

    });

    Route::controller(FormNoFourController::class)->group(function () {

        Route::get('formNoFourPdfDownload/{id}', 'formNoFourPdfDownload')->name('formNoFourPdfDownload');
        Route::get('formNoFourSend/{id}', 'formNoFourSend')->name('formNoFourSend');
        Route::get('getDistrictListForFormFour', 'getDistrictListForFormFour')->name('getDistrictListForFormFour');
        //Route::get('formNoFourPdfDownload/{id}', 'formNoFourPdfDownload')->name('formNoFourPdfDownload');
    });

    Route::controller(FormNoSevenController::class)->group(function () {

        Route::get('formNoSevenPdfDownload/{id}', 'formNoSevenPdfDownload')->name('formNoSevenPdfDownload');
        Route::get('formNoSevenSend/{id}', 'formNoSevenSend')->name('formNoSevenSend');
        Route::get('getDistrictListForFormSeven', 'getDistrictListForFormSeven')->name('getDistrictListForFormSeven');
        Route::get('formNoSevenPdfDownload/{id}', 'formNoSevenPdfDownload')->name('formNoSevenPdfDownload');
    });

    Route::controller(FormNoFiveController::class)->group(function () {


        Route::get('formNoFiveSend/{id}', 'formNoFiveSend')->name('formNoFiveSend');
        Route::get('formNoFiveRetaltedPdf/{title}/{id}', 'formNoFiveRetaltedPdf')->name('formNoFiveRetaltedPdf');
        Route::get('formNoFiveStepThreeExtra', 'formNoFiveStepThreeExtra')->name('formNoFiveStepThreeExtra');

        Route::get('formNoFiveStepTwo/{id}', 'formNoFiveStepTwo')->name('formNoFiveStepTwo');
        Route::post('formNoFiveStepTwoPost', 'formNoFiveStepTwoPost')->name('formNoFiveStepTwoPost');

        Route::post('formNoFiveStepTwoUpdate', 'formNoFiveStepTwoUpdate')->name('formNoFiveStepTwoUpdate');
        Route::delete('formNoFiveStepTwoDelete/{id}', 'formNoFiveStepTwoDelete')->name('formNoFiveStepTwoDelete');

        Route::get('formNoFiveStepThree/{id}', 'formNoFiveStepThree')->name('formNoFiveStepThree');
        Route::post('formNoFiveStepThreePost', 'formNoFiveStepThreePost')->name('formNoFiveStepThreePost');


        Route::post('formNoFiveStepThreeUpdate', 'formNoFiveStepThreeUpdate')->name('formNoFiveStepThreeUpdate');
        Route::delete('formNoFiveStepThreeDelete/{id}', 'formNoFiveStepThreeDelete')->name('formNoFiveStepThreeDelete');


        Route::get('formNoFiveStepFour/{id}', 'formNoFiveStepFour')->name('formNoFiveStepFour');
        Route::post('formNoFiveStepFourPost', 'formNoFiveStepFourPost')->name('formNoFiveStepFourPost');


        Route::post('formNoFiveStepFourUpdate', 'formNoFiveStepFourUpdate')->name('formNoFiveStepFourUpdate');
        Route::delete('formNoFiveStepFourDelete/{id}', 'formNoFiveStepFourDelete')->name('formNoFiveStepFourDelete');


        Route::post('formNoFiveStepFourPostAjax', 'formNoFiveStepFourPostAjax')->name('formNoFiveStepFourPostAjax');
        Route::post('formNoFiveStepFivePostAjax', 'formNoFiveStepFivePostAjax')->name('formNoFiveStepFivePostAjax');

        Route::post('formNoFiveStepSixPostAjax', 'formNoFiveStepSixPostAjax')->name('formNoFiveStepSixPostAjax');


        Route::get('formNoFiveStepFive/{id}', 'formNoFiveStepFive')->name('formNoFiveStepFive');
        Route::post('formNoFiveStepFivePost', 'formNoFiveStepFivePost')->name('formNoFiveStepFivePost');

        Route::post('formNoFiveStepFiveUpdate', 'formNoFiveStepFiveUpdate')->name('formNoFiveStepFiveUpdate');
        Route::get('formNoFiveStepFiveDelete', 'formNoFiveStepFiveDelete')->name('formNoFiveStepFiveDelete');


        Route::post('formNoFiveStepSixUpdate', 'formNoFiveStepSixUpdate')->name('formNoFiveStepSixUpdate');
        Route::get('formNoFiveStepSixDelete', 'formNoFiveStepSixDelete')->name('formNoFiveStepSixDelete');

        Route::get('formNoFivePdfDownload/{id}', 'formNoFivePdfDownload')->name('formNoFivePdfDownload');
    });

    Route::resource('fd3Form', Fd3FormController::class);

    Route::controller(Fd3FormController::class)->group(function () {

        Route::get('fd2pdfviewdfd3/{id}', 'fd2pdfviewdfd3')->name('fd2pdfviewdfd3');
        Route::get('fd3formextrapdf/{title}/{id}', 'fd3formextrapdf')->name('fd3formextrapdf');
        Route::get('fd3pdfview/{id}', 'fd3pdfview')->name('fd3pdfview');


        Route::get('fd3OtherFileModal', 'fd3OtherFileModal')->name('fd3OtherFileModal');

        Route::get('fd3OtherFileDownload/{id}', 'fd3OtherFileDownload')->name('fd3OtherFileDownload');
        Route::get('fd3OtherFileDelete/{id}', 'fd3OtherFileDelete')->name('fd3OtherFileDelete');
        Route::get('fd3OtherFileUpdate', 'fd3OtherFileUpdate')->name('fd3OtherFileUpdate');

        Route::get('fd3FormSend/{id}', 'fd3FormSend')->name('fd3FormSend');
        Route::get('fd3PdfDownload/{id}', 'fd3PdfDownload')->name('fd3PdfDownload');
        Route::get('verifiedFdThreeForm/{id}', 'verifiedFdThreeForm')->name('verifiedFdThreeForm');


        Route::get('fd3FormSendEmployeeDelete', 'fd3FormSendEmployeeDelete')->name('fd3FormSendEmployeeDelete');
        Route::post('fd3FormSendEmployeeUpdate', 'fd3FormSendEmployeeUpdate')->name('fd3FormSendEmployeeUpdate');
        Route::post('fd3FormSendEmployeePost', 'fd3FormSendEmployeePost')->name('fd3FormSendEmployeePost');

    });


    Route::resource('fc1Form', Fc1FormController::class);

    Route::controller(Fc1FormController::class)->group(function () {
        Route::get('finalFcOneApplicationSubmit/{id}', 'finalFcOneApplicationSubmit')->name('finalFcOneApplicationSubmit');
        Route::get('fc1PdfDownload/{id}', 'fc1PdfDownload')->name('fc1PdfDownload');
        Route::get('verifiedFcOneForm/{id}', 'verifiedFcOneForm')->name('verifiedFcOneForm');
        Route::get('fc1FormStepTwo/{id}', 'fc1FormStepTwo')->name('fc1FormStepTwo');
        Route::get('fc1FormStepThree/{id}', 'fc1FormStepThree')->name('fc1FormStepThree');


        Route::get('fc1pdfview/{id}', 'fc1pdfview')->name('fc1pdfview');
        Route::get('fc1formextrapdf/{title}/{id}', 'fc1formextrapdf')->name('fc1formextrapdf');
        Route::get('fd2pdfviewdfc1/{id}', 'fd2pdfviewdfc1')->name('fd2pdfviewdfc1');


        Route::post('fcOneOtherPdfListUpdate', 'fcOneOtherPdfListUpdate')->name('fcOneOtherPdfListUpdate');
        Route::get('fcOneOtherPdfList', 'fcOneOtherPdfList')->name('fcOneOtherPdfList');
        Route::get('fcOneOtherPdfListdownload/{id}', 'fcOneOtherPdfListdownload')->name('fcOneOtherPdfListdownload');
        Route::get('fcOneOtherPdfListdelete/{id}', 'fcOneOtherPdfListdelete')->name('fcOneOtherPdfListdelete');


        Route::post('lastExtraUpdate', 'lastExtraUpdate')->name('lastExtraUpdate');
        Route::get('goToNextPageFcOneStepTwo', 'goToNextPageFcOneStepTwo')->name('goToNextPageFcOneStepTwo');

        Route::get('fc1FormStepTwoDonorDelete', 'fc1FormStepTwoDonorDelete')->name('fc1FormStepTwoDonorDelete');
        Route::post('fc1FormStepTwoDonor', 'fc1FormStepTwoDonor')->name('fc1FormStepTwoDonor');
        Route::post('fc1FormStepTwoDonorUpdate', 'fc1FormStepTwoDonorUpdate')->name('fc1FormStepTwoDonorUpdate');


        Route::get('fc1FormStepTwoSDGDelete', 'fc1FormStepTwoSDGDelete')->name('fc1FormStepTwoSDGDelete');
        Route::post('fc1FormStepTwoSDG', 'fc1FormStepTwoSDG')->name('fc1FormStepTwoSDG');
        Route::post('fc1FormStepTwoSDGUpdate', 'fc1FormStepTwoSDGUpdate')->name('fc1FormStepTwoSDGUpdate');


        Route::get('fc1FormStepTwoBudgetDelete', 'fc1FormStepTwoBudgetDelete')->name('fc1FormStepTwoBudgetDelete');
        Route::post('fc1FormStepTwoBudget', 'fc1FormStepTwoBudget')->name('fc1FormStepTwoBudget');
        Route::post('fc1FormStepTwoBudgetUpdate', 'fc1FormStepTwoBudgetUpdate')->name('fc1FormStepTwoBudgetUpdate');

        Route::get('prokolpoAreaForFc1Delete', 'prokolpoAreaForFc1Delete')->name('prokolpoAreaForFc1Delete');
        Route::post('prokolpoAreaForFc1', 'prokolpoAreaForFc1')->name('prokolpoAreaForFc1');
        Route::post('prokolpoAreaForFc1Update', 'prokolpoAreaForFc1Update')->name('prokolpoAreaForFc1Update');

    });


    Route::resource('fc2Form', Fc2FormController::class);

    Route::controller(Fc2FormController::class)->group(function () {


        Route::get('fc2FormStepTwo/{id}', 'fc2FormStepTwo')->name('fc2FormStepTwo');
        Route::get('fc2FormStepThree/{id}', 'fc2FormStepThree')->name('fc2FormStepThree');
        Route::get('fc2pdfview/{id}', 'fc2pdfview')->name('fc2pdfview');
        Route::get('fc2formextrapdf/{title}/{id}', 'fc2formextrapdf')->name('fc2formextrapdf');
        Route::get('fd2pdfviewdfc2/{id}', 'fd2pdfviewdfc2')->name('fd2pdfviewdfc2');
        Route::post('lastExtraUpdateFcTwo', 'lastExtraUpdateFcTwo')->name('lastExtraUpdateFcTwo');
        Route::get('goToNextPageFcTwoStepTwo', 'goToNextPageFcTwoStepTwo')->name('goToNextPageFcTwoStepTwo');
        Route::get('fc2FormStepTwoDonorDelete', 'fc2FormStepTwoDonorDelete')->name('fc2FormStepTwoDonorDelete');
        Route::post('fc2FormStepTwoDonor', 'fc2FormStepTwoDonor')->name('fc2FormStepTwoDonor');
        Route::post('fc2FormStepTwoDonorUpdate', 'fc2FormStepTwoDonorUpdate')->name('fc2FormStepTwoDonorUpdate');
        Route::get('fc2FormStepTwoSDGDelete', 'fc2FormStepTwoSDGDelete')->name('fc2FormStepTwoSDGDelete');
        Route::post('fc2FormStepTwoSDG', 'fc2FormStepTwoSDG')->name('fc2FormStepTwoSDG');
        Route::post('fc2FormStepTwoSDGUpdate', 'fc2FormStepTwoSDGUpdate')->name('fc2FormStepTwoSDGUpdate');
        Route::get('fc2FormStepTwoBudgetDelete', 'fc2FormStepTwoBudgetDelete')->name('fc2FormStepTwoBudgetDelete');
        Route::post('fc2FormStepTwoBudget', 'fc2FormStepTwoBudget')->name('fc2FormStepTwoBudget');
        Route::post('fc2FormStepTwoBudgetUpdate', 'fc2FormStepTwoBudgetUpdate')->name('fc2FormStepTwoBudgetUpdate');
        Route::get('prokolpoAreaForFc2Delete', 'prokolpoAreaForFc2Delete')->name('prokolpoAreaForFc2Delete');
        Route::post('prokolpoAreaForFc2', 'prokolpoAreaForFc2')->name('prokolpoAreaForFc2');
        Route::post('prokolpoAreaForFc2Update', 'prokolpoAreaForFc2Update')->name('prokolpoAreaForFc2Update');
        Route::get('finalFcTwoApplicationSubmit/{id}', 'finalFcTwoApplicationSubmit')->name('finalFcTwoApplicationSubmit');
        Route::get('fc2PdfDownload/{id}', 'fc2PdfDownload')->name('fc2PdfDownload');
        Route::get('verifiedFcTwoForm/{id}', 'verifiedFcTwoForm')->name('verifiedFcTwoForm');
        Route::get('fc2FormStepTwo/{id}', 'fc2FormStepTwo')->name('fc2FormStepTwo');
        Route::get('fc2FormStepThree/{id}', 'fc2FormStepThree')->name('fc2FormStepThree');
    });

    Route::controller(Fd2FormController::class)->group(function () {

        Route::get('addFd2DetailForFd3/{id}', 'addFd2DetailForFd3')->name('addFd2DetailForFd3');
        Route::get('editFd2DetailForFd3/{id}', 'editFd2DetailForFd3')->name('editFd2DetailForFd3');
        Route::post('updateFd2DetailForFd3', 'updateFd2DetailForFd3')->name('updateFd2DetailForFd3');
        Route::post('storeFd2DetailForFd3', 'storeFd2DetailForFd3')->name('storeFd2DetailForFd3');
        Route::get('addFd2DetailForFc2/{id}', 'addFd2DetailForFc2')->name('addFd2DetailForFc2');
        Route::get('editFd2DetailForFc2/{id}', 'editFd2DetailForFc2')->name('editFd2DetailForFc2');
        Route::post('updateFd2DetailForFc2', 'updateFd2DetailForFc2')->name('updateFd2DetailForFc2');
        Route::post('storeFd2DetailForFc2', 'storeFd2DetailForFc2')->name('storeFd2DetailForFc2');
        Route::get('addFd2DetailForFc1/{id}', 'addFd2DetailForFc1')->name('addFd2DetailForFc1');
        Route::get('editFd2DetailForFc1/{id}', 'editFd2DetailForFc1')->name('editFd2DetailForFc1');
        Route::post('updateFd2DetailForFc1', 'updateFd2DetailForFc1')->name('updateFd2DetailForFc1');
        Route::post('storeFd2DetailForFc1', 'storeFd2DetailForFc1')->name('storeFd2DetailForFc1');

    });


    Route::resource('fd2Form', Fd2FormController::class);
    Route::resource('fd6Form', Fd6FormController::class);
    Route::resource('fd6FormPartTwo', Fd6FormPartTwoController::class);
    Route::resource('fd7Form', Fd7FormController::class);

    Route::controller(Fd6FormPartTwoController::class)->group(function () {

        Route::get('fd6NewDataEditup', 'fd6NewDataEditup')->name('fd6NewDataEditup');

        Route::get('fd6SourceOfFundDelete', 'fd6SourceOfFundDelete')->name('fd6SourceOfFundDelete');

        Route::get('fd6pdfview/{id}', 'fd6pdfview')->name('fd6pdfview');

        Route::get('fd2pdfviewdfd6/{id}', 'fd2pdfviewdfd6')->name('fd2pdfviewdfd6');

        Route::get('allPdfForFd6/{title}/{id}', 'allPdfForFd6')->name('allPdfForFd6');

        Route::post('fd6StepTwoMainUpdate', 'fd6StepTwoMainUpdate')->name('fd6StepTwoMainUpdate');
        Route::post('fd6StepThreeMainUpdate', 'fd6StepThreeMainUpdate')->name('fd6StepThreeMainUpdate');
        Route::post('fd6StepFourMainUpdate', 'fd6StepFourMainUpdate')->name('fd6StepFourMainUpdate');
        Route::post('fd6StepFiveMainUpdate', 'fd6StepFiveMainUpdate')->name('fd6StepFiveMainUpdate');


        Route::get('fd6StepTwoEdit/{id}', 'fd6StepTwoEdit')->name('fd6StepTwoEdit');
        Route::get('fd6StepThreeEdit/{id}', 'fd6StepThreeEdit')->name('fd6StepThreeEdit');
        Route::get('fd6StepFourEdit/{id}', 'fd6StepFourEdit')->name('fd6StepFourEdit');
        Route::get('fd6StepFiveEdit/{id}', 'fd6StepFiveEdit')->name('fd6StepFiveEdit');

        Route::post('detailsOfForm6DataPost', 'detailsOfForm6DataPost')->name('detailsOfForm6DataPost');
        Route::get('detailsOfForm6DataDelete', 'detailsOfForm6DataDelete')->name('detailsOfForm6DataDelete');
        Route::post('detailsOfForm6DataUpdate', 'detailsOfForm6DataUpdate')->name('detailsOfForm6DataUpdate');

        Route::post('adjoiningSixDataPost', 'adjoiningSixDataPost')->name('adjoiningSixDataPost');
        Route::get('adjoiningSixDataDelete', 'adjoiningSixDataDelete')->name('adjoiningSixDataDelete');
        Route::post('adjoiningSixDataUpdate', 'adjoiningSixDataUpdate')->name('adjoiningSixDataUpdate');


        Route::post('dinpunjjiDataPost', 'dinpunjjiDataPost')->name('dinpunjjiDataPost');
        Route::get('dinpunjjiDataDelete', 'dinpunjjiDataDelete')->name('dinpunjjiDataDelete');
        Route::post('dinpunjjiDataUpdate', 'dinpunjjiDataUpdate')->name('dinpunjjiDataUpdate');


    });
    Route::controller(Fd7FormController::class)->group(function () {

        Route::get('finalFdSevenApplicationSubmit/{id}', 'finalFdSevenApplicationSubmit')->name('finalFdSevenApplicationSubmit');


    });

    Route::resource('fdFiveForm', FdFiveFormController::class);

    Route::controller(FdFiveFormController::class)->group(function () {

        Route::get('fdFiveReceivedGoodsPost', 'fdFiveReceivedGoodsPost')->name('fdFiveReceivedGoodsPost');
        Route::post('fdFiveReceivedGoodsUpdate', 'fdFiveReceivedGoodsUpdate')->name('fdFiveReceivedGoodsUpdate');
        Route::get('fdFiveReceivedGoodsDelete', 'fdFiveReceivedGoodsDelete')->name('fdFiveReceivedGoodsDelete');
        Route::post('fdFiveReceivedGoodsUsedPost', 'fdFiveReceivedGoodsUsedPost')->name('fdFiveReceivedGoodsUsedPost');
        Route::post('fdFiveReceivedGoodsUsedUpdate', 'fdFiveReceivedGoodsUsedUpdate')->name('fdFiveReceivedGoodsUsedUpdate');
        Route::get('fdFiveReceivedGoodsUsedDelete', 'fdFiveReceivedGoodsUsedDelete')->name('fdFiveReceivedGoodsUsedDelete');
        Route::get('fdFiveReceivedGoodsUsedpdf/{title}/{id}', 'fdFiveReceivedGoodsUsedpdf')->name('fdFiveReceivedGoodsUsedpdf');
        Route::get('fdFiveFormSend/{id}', 'fdFiveFormSend')->name('fdFiveFormSend');
        Route::get('fdFiveFormPdf/{id}', 'fdFiveFormPdf')->name('fdFiveFormPdf');
    });


    Route::resource('approvalOfConstitution', ApprovalOfConstitutionController::class);
    Route::resource('duplicateCertificate', DuplicateCertificateController::class);
    Route::resource('executiveCommitteeApproval', ExecutiveComitteeApprovalController::class);

    Route::controller(DuplicateCertificateController::class)->group(function () {

        Route::get('duplicateCertificate/{id}/{title}', 'duplicateCertificate')->name('duplicateCertificate');
    });


    Route::controller(ApprovalOfConstitutionController::class)->group(function () {

        Route::get('approvalOfConstitution/{id}/{title}', 'approvalOfConstitution')->name('approvalOfConstitution');
    });


    Route::controller(ExecutiveComitteeApprovalController::class)->group(function () {

        Route::get('executiveCommitteeApproval/{id}/{title}', 'executiveCommitteeApproval')->name('executiveCommitteeApproval');


    });

    Route::controller(Fd7FormController::class)->group(function () {


        Route::get('viewFd7EditDataAjax', 'viewFd7EditDataAjax')->name('viewFd7EditDataAjax');


        Route::get('reliefAssistanceProjectProposalPdf/{id}', 'reliefAssistanceProjectProposalPdf')->name('reliefAssistanceProjectProposalPdf');
        Route::get('authorizationLetter/{id}', 'authorizationLetter')->name('authorizationLetter');
        Route::get('letterFromDonorAgency/{id}', 'letterFromDonorAgency')->name('letterFromDonorAgency');

        Route::get('deleteDistribution', 'deleteDistribution')->name('deleteDistribution');
        Route::post('postDistribution', 'postDistribution')->name('postDistribution');
        Route::post('updateDistribution', 'updateDistribution')->name('updateDistribution');

        Route::get('deleteProkolpoArea', 'deleteProkolpoArea')->name('deleteProkolpoArea');
        Route::post('postProkolpoArea', 'postProkolpoArea')->name('postProkolpoArea');
        Route::post('updateProkolpoArea', 'updateProkolpoArea')->name('updateProkolpoArea');

        Route::get('fd2pdfview/{id}', 'fd2pdfview')->name('fd2pdfview');
        Route::get('fd7pdfview/{id}', 'fd7pdfview')->name('fd7pdfview');
        Route::get('fd7formextrapdf/{title}/{id}', 'fd7formextrapdf')->name('fd7formextrapdf');


    });


    Route::controller(Fd2FormController::class)->group(function () {


        Route::get('fd2formextrapdffd6/{title}/{id}', 'fd2formextrapdffd6')->name('fd2formextrapdffd6');

        Route::get('fd2formextrapdf/{title}/{id}', 'fd2formextrapdf')->name('fd2formextrapdf');
        Route::get('fd2formextrapdffc2/{title}/{id}', 'fd2formextrapdffc2')->name('fd2formextrapdffc2');
        Route::get('fd2formextrapdffd3/{title}/{id}', 'fd2formextrapdffd3')->name('fd2formextrapdffd3');

        Route::get('deletelastYearDetail', 'deletelastYearDetail')->name('deletelastYearDetail');
        Route::post('addlastYearDetail', 'addlastYearDetail')->name('addlastYearDetail');
        Route::post('updatelastYearDetail', 'updatelastYearDetail')->name('updatelastYearDetail');


        Route::get('fd2PdfUpdateModalFd7', 'fd2PdfUpdateModalFd7')->name('fd2PdfUpdateModalFd7');

        Route::get('downloadFd2DetailForFd3/{id}', 'downloadFd2DetailForFd3')->name('downloadFd2DetailForFd3');
        Route::get('downloadFd2DetailForFc2Other/{id}', 'downloadFd2DetailForFc2Other')->name('downloadFd2DetailForFc2Other');
        Route::get('downloadFd2DetailForFd3Other/{id}', 'downloadFd2DetailForFd3Other')->name('downloadFd2DetailForFd3Other');
        Route::get('downloadFd2DetailForFc2/{id}', 'downloadFd2DetailForFc2')->name('downloadFd2DetailForFc2');
        Route::get('deleteFd2DetailForFc2/{id}', 'deleteFd2DetailForFc2')->name('deleteFd2DetailForFc2');
        Route::post('fd2ForFc2PdfUpdate', 'fd2ForFc2PdfUpdate')->name('fd2ForFc2PdfUpdate');
        Route::get('downloadFd2DetailForFc1Other/{id}', 'downloadFd2DetailForFc1Other')->name('downloadFd2DetailForFc1Other');
        Route::get('deleteFd2DetailForFd3/{id}', 'deleteFd2DetailForFd3')->name('deleteFd2DetailForFd3');
        Route::get('downloadFd2DetailForFc1/{id}', 'downloadFd2DetailForFc1')->name('downloadFd2DetailForFc1');
        Route::get('deleteFd2DetailForFc1/{id}', 'deleteFd2DetailForFc1')->name('deleteFd2DetailForFc1');
        Route::post('fd2ForFc1PdfUpdate', 'fd2ForFc1PdfUpdate')->name('fd2ForFc1PdfUpdate');
        Route::post('fd2ForFd3PdfUpdate', 'fd2ForFd3PdfUpdate')->name('fd2ForFd3PdfUpdate');
        Route::get('downloadFd2DetailForFd7Other/{id}', 'downloadFd2DetailForFd7Other')->name('downloadFd2DetailForFd7Other');
        Route::get('downloadFd2DetailForFd7/{id}', 'downloadFd2DetailForFd7')->name('downloadFd2DetailForFd7');
        Route::get('deleteFd2DetailForFd7/{id}', 'deleteFd2DetailForFd7')->name('deleteFd2DetailForFd7');
        Route::post('fd2ForFd7PdfUpdate', 'fd2ForFd7PdfUpdate')->name('fd2ForFd7PdfUpdate');
        Route::get('addFd2DetailForFd7/{id}', 'addFd2DetailForFd7')->name('addFd2DetailForFd7');
        Route::get('editFd2DetailForFd7/{id}', 'editFd2DetailForFd7')->name('editFd2DetailForFd7');
        Route::post('updateFd2DetailForFd7', 'updateFd2DetailForFd7')->name('updateFd2DetailForFd7');
        Route::post('storeFd2DetailForFd7', 'storeFd2DetailForFd7')->name('storeFd2DetailForFd7');
        Route::post('fd2PdfUpdate', 'fd2PdfUpdate')->name('fd2PdfUpdate');

        Route::get('fd2PdfUpdateModal', 'fd2PdfUpdateModal')->name('fd2PdfUpdateModal');


        Route::get('fd2MainPdfDownload/{id}', 'fd2MainPdfDownload')->name('fd2MainPdfDownload');
        Route::get('fd2PdfDownload/{id}', 'fd2PdfDownload')->name('fd2PdfDownload');
        Route::get('fd2PdfDestroy/{id}', 'fd2PdfDestroy')->name('fd2PdfDestroy');
        Route::get('addFd2Detail/{id}', 'addFd2Detail')->name('addFd2Detail');

    });

    Route::controller(Fd6FormController::class)->group(function () {


        Route::get('getTargetFromGoal', 'getTargetFromGoal')->name('getTargetFromGoal');
        Route::get('getIndicatorFromTarget', 'getIndicatorFromTarget')->name('getIndicatorFromTarget');


        Route::get('checkProkolpoYear', 'checkProkolpoYear')->name('checkProkolpoYear');


        Route::get('employeeDataPost', 'employeeDataPost')->name('employeeDataPost');
        Route::get('employeeDataDelete', 'employeeDataDelete')->name('employeeDataDelete');
        Route::post('employeeDataUpdate', 'employeeDataUpdate')->name('employeeDataUpdate');


        Route::post('partnerDataPost', 'partnerDataPost')->name('partnerDataPost');
        Route::post('partnerDataUpdate', 'partnerDataUpdate')->name('partnerDataUpdate');
        Route::get('partnerDataDelete', 'partnerDataDelete')->name('partnerDataDelete');

        Route::get('districtWiseDelete', 'districtWiseDelete')->name('districtWiseDelete');
        Route::post('districtWise', 'districtWise')->name('districtWise');
        Route::post('districtWiseUpdate', 'districtWiseUpdate')->name('districtWiseUpdate');

        Route::get('fd6ExpectedResultDelete', 'fd6ExpectedResultDelete')->name('fd6ExpectedResultDelete');
        Route::post('fd6ExpectedResultTarget', 'fd6ExpectedResultTarget')->name('fd6ExpectedResultTarget');
        Route::post('fd6ExpectedResultUpdate', 'fd6ExpectedResultUpdate')->name('fd6ExpectedResultUpdate');

        Route::get('fd6TargetDelete', 'fd6TargetDelete')->name('fd6TargetDelete');
        Route::post('fd6Target', 'fd6Target')->name('fd6Target');
        Route::post('fd6TargetUpdate', 'fd6TargetUpdate')->name('fd6TargetUpdate');

        Route::get('fd6FormStepTwoSDGDelete', 'fd6FormStepTwoSDGDelete')->name('fd6FormStepTwoSDGDelete');
        Route::get('fd6FormStepTwoSDG', 'fd6FormStepTwoSDG')->name('fd6FormStepTwoSDG');
        Route::post('fd6FormStepTwoSDGUpdate', 'fd6FormStepTwoSDGUpdate')->name('fd6FormStepTwoSDGUpdate');


        Route::post('showExpenseDataInModal', 'showExpenseDataInModal')->name('showExpenseDataInModal');
        Route::get('estimatedExpensesFd6Delete', 'estimatedExpensesFd6Delete')->name('estimatedExpensesFd6Delete');
        Route::get('estimatedExpensesFd6', 'estimatedExpensesFd6')->name('estimatedExpensesFd6');
        Route::post('estimatedExpensesFd6Update', 'estimatedExpensesFd6Update')->name('estimatedExpensesFd6Update');


        Route::get('prokolpoAreaForFd6Delete', 'prokolpoAreaForFd6Delete')->name('prokolpoAreaForFd6Delete');
        Route::post('prokolpoAreaForFd6', 'prokolpoAreaForFd6')->name('prokolpoAreaForFd6');
        Route::post('prokolpoAreaForFd6Update', 'prokolpoAreaForFd6Update')->name('prokolpoAreaForFd6Update');


        Route::post('fd6StepTwoMainPost', 'fd6StepTwoMainPost')->name('fd6StepTwoMainPost');
        Route::post('fd6StepThreeMainPost', 'fd6StepThreeMainPost')->name('fd6StepThreeMainPost');
        Route::post('fd6StepFourMainPost', 'fd6StepFourMainPost')->name('fd6StepFourMainPost');
        Route::post('fd6StepFiveMainPost', 'fd6StepFiveMainPost')->name('fd6StepFiveMainPost');


        Route::get('fd6StepTwo/{id}', 'fd6StepTwo')->name('fd6StepTwo');
        Route::get('fd6StepThree/{id}', 'fd6StepThree')->name('fd6StepThree');
        Route::get('fd6StepFour/{id}', 'fd6StepFour')->name('fd6StepFour');
        Route::get('fd6StepFive/{id}', 'fd6StepFive')->name('fd6StepFive');

        Route::get('finalFdSixApplicationSubmit/{id}', 'finalFdSixApplicationSubmit')->name('finalFdSixApplicationSubmit');
        Route::get('ProjectProposalFormPdfDownload/{id}', 'ProjectProposalFormPdfDownload')->name('ProjectProposalFormPdfDownload');
        Route::get('getDistrictList', 'getDistrictList')->name('getDistrictList');
        Route::get('getCityCorporationList', 'getCityCorporationList')->name('getCityCorporationList');

        Route::get('getUpozilaList', 'getUpozilaList')->name('getUpozilaList');
        Route::get('getUpozilaListNew', 'getUpozilaListNew')->name('getUpozilaListNew');


    });

    Route::resource('nVisa', NVisaController::class);

    Route::controller(NVisaController::class)->group(function () {

        Route::get('addnVisaDetail/{id}', 'addnVisaDetail')->name('addnVisaDetail');
        Route::get('/nVisaDocumentDownload/{cat}/{id}', 'nVisaDocumentDownload')->name('nVisaDocumentDownload');
        Route::get('/fd9FormExtraPdfDownload/{cat}/{id}', 'fd9FormExtraPdfDownload')->name('fd9FormExtraPdfDownload');
    });

    Route::resource('fdNineForm', Fd9Controller::class);

    Route::controller(Fd9Controller::class)->group(function () {

        Route::get('finalFdNineApplicationSubmit/{id}', 'finalFdNineApplicationSubmit')->name('finalFdNineApplicationSubmit');
        Route::get('/singlePdfDownload/{id}', 'singlePdfDownload')->name('singlePdfDownload');
        Route::get('/singlePdfDelete', 'singlePdfDelete')->name('singlePdfDelete');
        Route::get('/singlePdfUpdate/{data}', 'singlePdfUpdate')->name('singlePdfUpdate');
        Route::post('/mainFd9PdfUpload', 'mainFd9PdfUpload')->name('mainFd9PdfUpload');
        Route::get('fd9Chief', 'fd9Chief')->name('fd9Chief');
        Route::get('/mainFd9PdfDownload/{id}', 'mainFd9PdfDownload')->name('mainFd9PdfDownload');
    });
    Route::resource('fdNineOneForm', Fd9OneController::class);

    Route::controller(Fd9OneController::class)->group(function () {


        Route::get('finalFdNineOneApplicationSubmit/{id}', 'finalFdNineOneApplicationSubmit')->name('finalFdNineOneApplicationSubmit');
        Route::get('/fd9OneFormExtraPdfDownload/{cat}/{id}', 'fd9OneFormExtraPdfDownload')->name('fd9OneFormExtraPdfDownload');
        Route::get('fd9OneChief', 'fd9OneChief')->name('fd9OneChief');
        Route::post('/mainPdfUpload', 'mainPdfUpload')->name('mainPdfUpload');
        Route::get('/mainPdfDownload/{id}', 'mainPdfDownload')->name('mainPdfDownload');
        Route::get('/niyogPotroDownload/{id}', 'niyogPotroDownload')->name('niyogPotroDownload');
        Route::get('/formNinePdfDownload/{id}', 'formNinePdfDownload')->name('formNinePdfDownload');
        Route::get('/nVisaCopyDownload/{id}', 'nVisaCopyDownload')->name('nVisaCopyDownload');
    });

    Route::controller(FdoneformController::class)->group(function () {
        Route::get('fromEightChiefForOldNgo', 'fromEightChiefForOldNgo')->name('fromEightChiefForOldNgo');
        Route::get('fromOneChief', 'fromOneChief')->name('fromOneChief');
        Route::get('attachTheSupportingPaper/{id}', 'attachTheSupportingPaper')->name('attachTheSupportingPaper');
        Route::get('planOfOperation/{id}', 'planOfOperation')->name('planOfOperation');
        Route::post('/uploadFromOnePdf', 'uploadFromOnePdf')->name('uploadFromOnePdf');
        Route::post('/uploadFromEightPdfOld', 'uploadFromEightPdfOld')->name('uploadFromEightPdfOld');
        Route::get('/backFromStepTwo', 'backFromStepTwo')->name('backFromStepTwo');
        Route::get('/sourceOfFundDocDownload/{id}', 'sourceOfFundDocDownload')->name('sourceOfFundDocDownload');
        Route::get('/otherInfoFromOneDownload/{id}', 'otherInfoFromOneDownload')->name('otherInfoFromOneDownload');
        Route::get('/adviserDataDelete', 'adviserDataDelete')->name('adviserDataDelete');
        Route::get('/adviserDataUpdate', 'adviserDataUpdate')->name('adviserDataUpdate');
        Route::get('/otherInformationADelete', 'otherInformationADelete')->name('otherInformationADelete');
        Route::post('/otherInformationAUpdate', 'otherInformationAUpdate')->name('otherInformationAUpdate');

        Route::post('/otherInformationAStore', 'otherInformationAStore')->name('otherInformationAStore');

        Route::get('/sourceOfFundDelete', 'sourceOfFundDelete')->name('sourceOfFundDelete');
        Route::post('/sourceOfFundUpdate', 'sourceOfFundUpdate')->name('sourceOfFundUpdate');
        Route::get('/fdOneFormEdit', 'fdOneFormEdit')->name('fdOneFormEdit');
        Route::get('/fdFormOneInfoPdf', 'fdFormOneInfoPdf')->name('fdFormOneInfoPdf');
        Route::get('/fdFormEightInfoPdfOld', 'fdFormEightInfoPdfOld')->name('fdFormEightInfoPdfOld');
        Route::get('/fdFormOneInfo', 'fdFormOneInfo')->name('fdFormOneInfo');
        Route::get('/particularsOfOrganisation', 'particularsOfOrganisation')->name('particularsOfOrganisation');
        Route::post('/particularsOfOrganisationPost', 'particularsOfOrganisationPost')->name('particularsOfOrganisationPost');
        Route::post('/particularsOfOrganisationUpdate', 'particularsOfOrganisationUpdate')->name('particularsOfOrganisationUpdate');
        Route::get('/fieldOfProposedActivities', 'fieldOfProposedActivities')->name('fieldOfProposedActivities');
        Route::post('/fieldOfProposedActivitiesPost', 'fieldOfProposedActivitiesPost')->name('fieldOfProposedActivitiesPost');
        Route::post('/fieldOfProposedActivitiesUpdate', 'fieldOfProposedActivitiesUpdate')->name('fieldOfProposedActivitiesUpdate');
        Route::get('/allStaffDetailsInformation', 'allStaffDetailsInformation')->name('allStaffDetailsInformation');
        Route::post('/allStaffDetailsInformationPost', 'allStaffDetailsInformationPost')->name('allStaffDetailsInformationPost');
        Route::post('/allStaffDetailsInformationUpdate', 'allStaffDetailsInformationUpdate')->name('allStaffDetailsInformationUpdate');
        Route::get('/othersInformation', 'othersInformation')->name('othersInformation');
        Route::post('/othersInformationPost', 'othersInformationPost')->name('othersInformationPost');
        Route::post('/othersInformationUpdate', 'othersInformationUpdate')->name('othersInformationUpdate');


        Route::put('/singleStaffDetailsInformationUpdateRenew/{id}', 'singleStaffDetailsInformationUpdateRenew')->name('singleStaffDetailsInformationUpdateRenew');
        Route::put('/singleStaffDetailsInformationUpdate/{id}', 'singleStaffDetailsInformationUpdate')->name('singleStaffDetailsInformationUpdate');
        Route::post('/singleStaffDetailsInformationAdd', 'singleStaffDetailsInformationAdd')->name('singleStaffDetailsInformationAdd');
        Route::delete('/singleStaffDetailsInformationDelete/{id}', 'singleStaffDetailsInformationDelete')->name('singleStaffDetailsInformationDelete');


        Route::get('/singleStaffDetailsInformationEdit/{id}', 'singleStaffDetailsInformationEdit')->name('singleStaffDetailsInformationEdit');
        Route::get('/singleStaffDetailsInformationEditRenew/{id}', 'singleStaffDetailsInformationEditRenew')->name('singleStaffDetailsInformationEditRenew');
    });


    Route::resource('ngoMemberDocument', NgomemberdocController::class);
    Route::controller(NgomemberdocController::class)->group(function () {
        Route::get('/ngoMemberDocFinalUpdate', 'ngoMemberDocFinalUpdate')->name('ngoMemberDocFinalUpdate');
        Route::get('/ngoMemberDocumentDownload/{id}', 'ngoMemberDocumentDownload')->middleware(['auth'])->name('ngoMemberDocumentDownload');
        Route::get('/ngoMemberDocumentView', 'ngoMemberDocumentView')->middleware(['auth'])->name('ngoMemberDocumentView');

    });


    Route::resource('ngoMember', NgomemberController::class);

    Route::controller(NgomemberController::class)->group(function () {
        Route::get('/ngoMemberView', 'ngoMemberView')->name('ngoMemberView');
        Route::get('/ngoMemberFinalUpdate', 'ngoMemberFinalUpdate')->name('ngoMemberFinalUpdate');

    });

    Route::resource('ngoDocument', NgodocumentController::class);

    Route::controller(NgodocumentController::class)->group(function () {

        Route::get('/ngoDocumentFinal', 'ngoDocumentFinal')->name('ngoDocumentFinal');
        Route::get('/ngoDocumentDownload/{id}', 'ngoDocumentDownload')->name('ngoDocumentDownload');
        Route::get('/ngoDocumentView', 'ngoDocumentView')->name('ngoDocumentView');
        Route::get('/renewFileDownloadFromView/{title}/{id}', 'renewFileDownloadFromView')->name('renewFileDownloadFromView');
        Route::get('/deleteRenewalFileDownload/{title}/{id}', 'deleteRenewalFileDownload')->name('deleteRenewalFileDownload');
        Route::get('/deleteRenewalFile/{title}/{id}', 'deleteRenewalFile')->name('deleteRenewalFile');

    });


    Route::resource('formEightNgoCommitteMember', FormeightController::class);
    Route::controller(FormeightController::class)->group(function () {

        Route::post('/formEightNewDataUpdate', 'formEightNewDataUpdate')->name('formEightNewDataUpdate');
        Route::post('/formEightNewData', 'formEightNewData')->name('formEightNewData');
        Route::get('/updateDateData', 'updateDateData')->name('updateDateData');
        Route::get('/formEightNgoCommitteeMemberView', 'formEightNgoCommitteeMemberView')->name('formEightNgoCommitteeMemberView');
        Route::post('/uploadFromEightPdf', 'uploadFromEightPdf')->name('uploadFromEightPdf');
        Route::get('/formEightNgoCommitteeMemberTotalView', 'formEightNgoCommitteeMemberTotalView')->name('formEightNgoCommitteeMemberTotalView');
        Route::get('/formEightNgoCommitteeMemberTotalYear', 'formEightNgoCommitteeMemberTotalYear')->name('formEightNgoCommitteeMemberTotalYear');
        Route::get('/formEightNgoCommitteeMemberPdf', 'formEightNgoCommitteeMemberPdf')->name('formEightNgoCommitteeMemberPdf');
        Route::get('/formEightNgoCommitteeMemberViewFormEdit', 'formEightNgoCommitteeMemberViewFormEdit')->name('formEightNgoCommitteeMemberViewFormEdit');
    });

});
