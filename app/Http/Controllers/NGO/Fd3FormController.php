<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fd6Form;
use App\Models\Fd6FormProkolpoArea;
use App\Models\NVisa;
use App\Models\Fd2AllFormLastYearDetail;
use App\Models\Fd2Form;
use App\Models\Fd2FormOtherInfo;
use App\Models\NgoStatus;
use App\Models\Country;
use Mpdf\Mpdf;
use App\Models\Fd9Form;
use App\Models\NgoDuration;
use App\Models\Fd9ForeignerEmployeeFamilyMemberList;
use Illuminate\Support\Facades\Crypt;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use App\Models\DakListDetail;
use Response;
use App\Http\Controllers\NGO\CommonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use App\Models\FdOneForm;
use App\Models\Fd3Form;
use App\Models\NgoRenewInfo;
use App\Models\Fd2FormForFd3Form;
use App\Models\Fd2Fd3OtherInfo;
use App\Models\FdThreeEmplyeeDetail;
use App\Models\FdThreeOtherFile;
use Illuminate\Support\Facades\App;
class Fd3FormController extends Controller
{
    public function index(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd3FormList = Fd3Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();

        return view('front.fd3Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fd3FormList'));
    }


    public function create(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();

        $employeeDetailList = FdThreeEmplyeeDetail::where('user_id',Auth::user()->id)

        ->where('status',0)->get();

        return view('front.fd3Form.newAddForm',compact('employeeDetailList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function edit($id){

        $fd3Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fd3FormList = Fd3Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd3Id)->latest()->first();


        $employeeDetailList = FdThreeEmplyeeDetail::where('user_id',Auth::user()->id)
        ->where('fd3_form_id',$fd3Id)
       ->where('status',1)->get();


       $fdThreeOtherFileList = FdThreeOtherFile::where('fd3_form_id',$fd3Id)->get();


        return view('front.fd3Form.newEdit',compact('fdThreeOtherFileList','employeeDetailList','cityCorporationList','districtList','fd3FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function fd3FormSendEmployeePost(Request $request){



            $fd3FormInfo = new FdThreeEmplyeeDetail();
            $fd3FormInfo->employee_name =$request->organization_ceo_name;
            $fd3FormInfo->employee_designation =$request->organization_ceo_designation;
            $fd3FormInfo->employee_telephone =$request->organization_ceo_telephone;
            $fd3FormInfo->employee_mobile =$request->organization_ceo_mobile;
            $fd3FormInfo->employee_email =$request->organization_ceo_email;
            $fd3FormInfo->status =0;
            $fd3FormInfo->user_id =Auth::user()->id;
            $fd3FormInfo->save();



            if($request->mainEditId == 0){

                $employeeDetailList = FdThreeEmplyeeDetail::where('user_id',Auth::user()->id)

                ->where('status',0)->get();
                }else{

                    $employeeDetailList = FdThreeEmplyeeDetail::where('fd3_form_id',$request->mainEditId)

                    ->get();


                }


                $data = view('front.fd3Form._partial.fd3EmployeeTable',compact('employeeDetailList'))->render();
                return response()->json($data);

    }

    public function fd3FormSendEmployeeUpdate(Request $request){



        $fd3FormInfo = FdThreeEmplyeeDetail::find($request->mainId);
        $fd3FormInfo->employee_name =$request->organization_ceo_name;
        $fd3FormInfo->employee_designation =$request->organization_ceo_designation;
        $fd3FormInfo->employee_telephone =$request->organization_ceo_telephone;
        $fd3FormInfo->employee_mobile =$request->organization_ceo_mobile;
        $fd3FormInfo->employee_email =$request->organization_ceo_email;

        $fd3FormInfo->save();


        if($request->mainEditId == 0){

            $employeeDetailList = FdThreeEmplyeeDetail::where('user_id',Auth::user()->id)

            ->where('status',0)->get();
            }else{

                $employeeDetailList = FdThreeEmplyeeDetail::where('fd3_form_id',$request->mainEditId)

                ->get();


            }


            $data = view('front.fd3Form._partial.fd3EmployeeTable',compact('employeeDetailList'))->render();
            return response()->json($data);

    }


    public function fd3FormSendEmployeeDelete(Request $request){

        $admins = FdThreeEmplyeeDetail::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        if($request->mainEditId == 0){

            $employeeDetailList = FdThreeEmplyeeDetail::where('user_id',Auth::user()->id)

            ->where('status',0)->get();
            }else{

                $employeeDetailList = FdThreeEmplyeeDetail::where('fd3_form_id',$request->mainEditId)

                ->get();


            }

            $data = view('front.fd3Form._partial.fd3EmployeeTable',compact('employeeDetailList'))->render();
            return response()->json($data);

    }

    public function store(Request $request){

        

         try{
            DB::beginTransaction();

            $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
            $subject_all = implode(",",$request->subject_id);
            $fd3FormInfo = new Fd3Form();
            $fd3FormInfo->fd_one_form_id =$fdOneFormID->id;
            $fd3FormInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fd3FormInfo->ngo_name =$request->ngo_name;
            $fd3FormInfo->purpose_of_donation =$request->purpose_of_donation;
            $fd3FormInfo->ngo_address =$request->ngo_address;
            $fd3FormInfo->ngo_registration_number =$request->ngo_registration_number;
            $fd3FormInfo->ngo_registration_date =$request->ngo_registration_date;
            $fd3FormInfo->ngo_website =$request->ngo_website;
            $fd3FormInfo->ngo_email =$request->ngo_email;
            $fd3FormInfo->ngo_telephone =$request->ngo_telephone_number;
            $fd3FormInfo->subject_id =$subject_all;
            $fd3FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
            $fd3FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
            $fd3FormInfo->project_approval_exemption_letter_memo_number =$request->project_approval_exemption_letter_memo_number;
            $fd3FormInfo->project_approval_letter_memo_number =$request->project_approval_letter_memo_number;
            $fd3FormInfo->project_approval_letter_date =$request->project_approval_letter_date;
            $fd3FormInfo->project_approval_exemption_letter_date =$request->project_approval_exemption_letter_date;
            $fd3FormInfo->exemption_amount_in_previous_year =$request->exemption_amount_in_previous_year;
            $fd3FormInfo->money_received_in_the_previous_year =$request->money_received_in_the_previous_year;
            $fd3FormInfo->date_of_payment =$request->date_of_payment;
            $fd3FormInfo->type_of_foreign_grant =$request->type_of_foreign_grant;
            $fd3FormInfo->foreign_grant_amount =$request->foreign_grant_amount;
            $fd3FormInfo->local_grant_amount =$request->local_grant_amount;
            $fd3FormInfo->description_and_price_of_goods =$request->description_and_price_of_goods;
            $fd3FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
            $fd3FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
            $fd3FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
            $fd3FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;
            $fd3FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
            $fd3FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
            $fd3FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
            $fd3FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
            $fd3FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;
            $fd3FormInfo->organization_name =$request->organization_name;
            $fd3FormInfo->organization_address =$request->organization_address;
            $fd3FormInfo->organization_telephone_number =$request->organization_telephone_number;
            $fd3FormInfo->organization_email =$request->organization_email;
            $fd3FormInfo->organization_fax =$request->organization_fax;
            $fd3FormInfo->organization_website =$request->organization_website;
            $fd3FormInfo->organization_is_verified =$request->organization_is_verified;
            $fd3FormInfo->relation_with_donor =$request->relation_with_donor;

            $fd3FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
            $fd3FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
            $fd3FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
            $fd3FormInfo->communication_between_NGO_and_donor =$request->communication_between_NGO_and_donor;
            $fd3FormInfo->bank_name =$request->bank_name;
            $fd3FormInfo->bank_address =$request->bank_address;
            $fd3FormInfo->bank_account_name =$request->bank_account_name;
            $fd3FormInfo->bank_account_number =$request->bank_account_number;
            $fd3FormInfo->project_account_details =$request->project_account_details;
            $fd3FormInfo->purpose_details =$request->purpose_details;
            $fd3FormInfo->money_received_details =$request->money_received_details;
            $fd3FormInfo->method_details =$request->method_details;
            $fd3FormInfo->administration_involved =$request->administration_involved;
            $fd3FormInfo->equipment_details =$request->equipment_details;
            $fd3FormInfo->chief_name =$request->chief_name;
            $fd3FormInfo->chief_desi =$request->chief_desi;
            $fd3FormInfo->status ='Review';
            $filePath="FdThreeForm";
            if ($request->hasfile('project_account_file')) {

                $file = $request->file('project_account_file');

                $fd3FormInfo->project_account_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('purpose_details_file')) {

                $file = $request->file('purpose_details_file');

                $fd3FormInfo->purpose_details_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('money_received_details_file')) {

                $file = $request->file('money_received_details_file');

                $fd3FormInfo->money_received_details_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('method_details_file')) {

                $file = $request->file('method_details_file');

                $fd3FormInfo->method_details_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('equipment_details_file')) {

                $file = $request->file('equipment_details_file');

                $fd3FormInfo->equipment_details_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('verified_fd_three_form')) {

                $file = $request->file('verified_fd_three_form');

                $fd3FormInfo->verified_fd_three_form =CommonController::pdfUpload($request,$file,$filePath);

            }

            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $fd3FormInfo->digital_signature =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $fd3FormInfo->digital_seal =CommonController::storeBase64($request->image_seal_base64);

                }

            $fd3FormInfo->save();

            $fd3FormInfoId = $fd3FormInfo->id;


            $input = $request->all();


            // new code start
            if (array_key_exists("file_name", $input) && array_key_exists("file", $input)){

                $otherFileList = $input['file_name'];
                foreach($otherFileList as $key => $otherFileLists){

                        $form= new FdThreeOtherFile();
                        $form->fd3_form_id = $fd3FormInfoId;
                        $form->file_name = $input['file_name'][$key];
                        $file=$input['file'][$key];
                        $filePath="fd3FormInfo";
                        $form->file=CommonController::pdfUpload($request,$file,$filePath);
                        $form->save();
                    }
            }

            // end new code


            FdThreeEmplyeeDetail::where('user_id',Auth::user()->id)
            ->where('status',0)

       ->update([
           'status' => 1,
           'fd3_form_id' =>$fd3FormInfoId
        ]);

            DB::commit();
            return redirect()->route('addFd2DetailForFd3',base64_encode($fd3FormInfoId))->with('success','Added Successfuly');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

     }

     public function fd3FormSend($id){


        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('h:i:s a');


        try{


        $fd3FormInfo = Fd3Form::find(base64_decode($id));
        $fd3FormInfo->status ='Ongoing';
        $fd3FormInfo->time_for_api =$main_time;
        $fd3FormInfo->save();

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
        $created_at = $dt->format('Y-m-d h:i:s ');

        $amPmValue = $dt->format('a');
       // $amPmValueFinal = 0;
        if($amPmValue == 'pm'){

            $amPmValueFinal = 'অপরাহ্ন';
        }else{
            $amPmValueFinal = 'পূর্বাহ্ন';

        }

         $regDakData = new DakListDetail();
         $regDakData->sender_admin_id =null;
         $regDakData->receiver_admin_id = 2;
         $regDakData->main_dak_id =base64_decode($id);
         $regDakData->dak_type = 'fdThree';
         $regDakData->receive_from_ngo = 1;
         $regDakData->receive_status = 1;
         $regDakData->status = 1;
         $regDakData->nothi_jat_id = 0;
         $regDakData->nothi_jat_status = 0;
         $regDakData->sent_status =null;
         $regDakData->amPmValue = $amPmValueFinal;
         $regDakData->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
         $regDakData->save();

        return redirect()->back()->with('success','Send Successfuly');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }

     public function update(Request $request,$id){

        try{
            $subject_all = implode(",",$request->subject_id);
            DB::beginTransaction();
            $fd3FormInfo = Fd3Form::find($id);
            $fd3FormInfo->ngo_name =$request->ngo_name;
            $fd3FormInfo->purpose_of_donation =$request->purpose_of_donation;
            $fd3FormInfo->ngo_address =$request->ngo_address;
            $fd3FormInfo->ngo_registration_number =$request->ngo_registration_number;
            $fd3FormInfo->ngo_registration_date =$request->ngo_registration_date;
            $fd3FormInfo->ngo_website =$request->ngo_website;
            $fd3FormInfo->ngo_email =$request->ngo_email;
            $fd3FormInfo->ngo_telephone =$request->ngo_telephone_number;
            $fd3FormInfo->subject_id =$subject_all;
            $fd3FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
            $fd3FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
            $fd3FormInfo->project_approval_exemption_letter_memo_number =$request->project_approval_exemption_letter_memo_number;
            $fd3FormInfo->project_approval_letter_memo_number =$request->project_approval_letter_memo_number;
            $fd3FormInfo->project_approval_letter_date =$request->project_approval_letter_date;
            $fd3FormInfo->project_approval_exemption_letter_date =$request->project_approval_exemption_letter_date;
            $fd3FormInfo->exemption_amount_in_previous_year =$request->exemption_amount_in_previous_year;
            $fd3FormInfo->money_received_in_the_previous_year =$request->money_received_in_the_previous_year;
            $fd3FormInfo->date_of_payment =$request->date_of_payment;
            $fd3FormInfo->type_of_foreign_grant =$request->type_of_foreign_grant;
            $fd3FormInfo->foreign_grant_amount =$request->foreign_grant_amount;
            $fd3FormInfo->local_grant_amount =$request->local_grant_amount;
            $fd3FormInfo->description_and_price_of_goods =$request->description_and_price_of_goods;
            $fd3FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
            $fd3FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
            $fd3FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
            $fd3FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;
            $fd3FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
            $fd3FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
            $fd3FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
            $fd3FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
            $fd3FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;
            $fd3FormInfo->organization_name =$request->organization_name;
            $fd3FormInfo->organization_address =$request->organization_address;
            $fd3FormInfo->organization_telephone_number =$request->organization_telephone_number;
            $fd3FormInfo->organization_email =$request->organization_email;
            $fd3FormInfo->organization_fax =$request->organization_fax;
            $fd3FormInfo->organization_website =$request->organization_website;
            $fd3FormInfo->organization_is_verified =$request->organization_is_verified;
            $fd3FormInfo->relation_with_donor =$request->relation_with_donor;

            $fd3FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
            $fd3FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
            $fd3FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
            $fd3FormInfo->communication_between_NGO_and_donor =$request->communication_between_NGO_and_donor;
            $fd3FormInfo->bank_name =$request->bank_name;
            $fd3FormInfo->bank_address =$request->bank_address;
            $fd3FormInfo->bank_account_name =$request->bank_account_name;
            $fd3FormInfo->bank_account_number =$request->bank_account_number;
            $fd3FormInfo->project_account_details =$request->project_account_details;
            $fd3FormInfo->purpose_details =$request->purpose_details;
            $fd3FormInfo->money_received_details =$request->money_received_details;
            $fd3FormInfo->method_details =$request->method_details;
            $fd3FormInfo->administration_involved =$request->administration_involved;
            $fd3FormInfo->equipment_details =$request->equipment_details;
            $fd3FormInfo->chief_name =$request->chief_name;
            $fd3FormInfo->chief_desi =$request->chief_desi;
            $filePath="FdThreeForm";
            if ($request->hasfile('project_account_file')) {

                $file = $request->file('project_account_file');

                $fd3FormInfo->project_account_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('purpose_details_file')) {

                $file = $request->file('purpose_details_file');

                $fd3FormInfo->purpose_details_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('money_received_details_file')) {

                $file = $request->file('money_received_details_file');

                $fd3FormInfo->money_received_details_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('method_details_file')) {

                $file = $request->file('method_details_file');

                $fd3FormInfo->method_details_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('equipment_details_file')) {

                $file = $request->file('equipment_details_file');

                $fd3FormInfo->equipment_details_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('verified_fd_three_form')) {

                $file = $request->file('verified_fd_three_form');

                $fd3FormInfo->verified_fd_three_form =CommonController::pdfUpload($request,$file,$filePath);

            }

            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $fd3FormInfo->digital_signature =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $fd3FormInfo->digital_seal =CommonController::storeBase64($request->image_seal_base64);

                }

            $fd3FormInfo->save();

            $fd3FormInfoId = $fd3FormInfo->id;
            $input = $request->all();
              // new code start
              if (array_key_exists("file_name", $input) && array_key_exists("file", $input)){

                $otherFileList = $input['file_name'];
                foreach($otherFileList as $key => $otherFileLists){

                        $form= new FdThreeOtherFile();
                        $form->fd3_form_id = $fd3FormInfoId;
                        $form->file_name = $input['file_name'][$key];
                        $file=$input['file'][$key];
                        $filePath="fd3FormInfo";
                        $form->file=CommonController::pdfUpload($request,$file,$filePath);
                        $form->save();
                    }
            }

            // end new code


            FdThreeEmplyeeDetail::where('user_id',Auth::user()->id)
            ->where('status',0)

       ->update([
           'status' => 1,
           'fd3_form_id' =>$fd3FormInfoId
        ]);
            DB::commit();
            return redirect()->route('editFd2DetailForFd3',base64_encode($fd3FormInfoId))->with('success','Updated Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


     public function show($id){

        $fd3Id = base64_decode($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
       $fd2FormList = Fd2FormForFd3Form::where('fd_one_form_id',$ngo_list_all->id)->where('fd3_form_id',$fd3Id)->latest()->first();
       $fd2OtherInfo = Fd2Fd3OtherInfo::where('fd2_form_for_fd3_form_id',$fd2FormList->id)->latest()->get();
       $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id) ->orderBy('id','desc')->first();
       $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
       $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
       $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
       $fd3FormList = Fd3Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd3Id)->latest()->first();


       $employeeDetailList = FdThreeEmplyeeDetail::where('user_id',Auth::user()->id)
         ->where('fd3_form_id',$fd3Id)
        ->where('status',1)->get();


        $fdThreeOtherFileList = FdThreeOtherFile::where('fd3_form_id',$fd3Id)->get();

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
        ->where('type','fd3')
        ->get();

       return view('front.fd3Form.show',compact('fd2AllFormLastYearDetail','fdThreeOtherFileList','employeeDetailList','fd2OtherInfo','fd2FormList','cityCorporationList','districtList','fd3FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

   }

   public function fd3pdfview($id){

    $fd3Id = base64_decode($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
       $fd2FormList = Fd2FormForFd3Form::where('fd_one_form_id',$ngo_list_all->id)->where('fd3_form_id',$fd3Id)->latest()->first();
       $fd2OtherInfo = Fd2Fd3OtherInfo::where('fd2_form_for_fd3_form_id',$fd2FormList->id)->latest()->get();
       $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id) ->orderBy('id','desc')->first();
       $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
       $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
       $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
       $fd3FormList = Fd3Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd3Id)->latest()->first();


       $employeeDetailList = FdThreeEmplyeeDetail::where('user_id',Auth::user()->id)
         ->where('fd3_form_id',$fd3Id)
        ->where('status',1)->get();


        $fdThreeOtherFileList = FdThreeOtherFile::where('fd3_form_id',$fd3Id)->get();

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
        ->where('type','fd3')
        ->get();

       $file_Name_Custome = 'fd_three_form';
   $data =view('front.fd3Form.fd3PdfView',[
    'fd2AllFormLastYearDetail'=>$fd2AllFormLastYearDetail,
    'fdThreeOtherFileList'=>$fdThreeOtherFileList,
    'employeeDetailList'=>$employeeDetailList,
    'fd2OtherInfo'=>$fd2OtherInfo,
    'fd2FormList'=>$fd2FormList,
'cityCorporationList'=>$cityCorporationList,
                   'districtList'=>$districtList,

                   'fd3FormList'=>$fd3FormList,
                   'divisionList'=>$divisionList,
                   'renewWebsiteName'=>$renewWebsiteName,
                   'ngoDurationLastEx'=>$ngoDurationLastEx,
                   'ngoDurationReg'=>$ngoDurationReg,
                   'ngo_list_all'=>$ngo_list_all,

               ])->render();


   $pdfFilePath =$file_Name_Custome.'.pdf';


   $mpdf = new Mpdf([ 'default_font_size' => 14,'default_font' => 'nikosh']);
   $mpdf->WriteHTML($data);
   $mpdf->Output($pdfFilePath, "I");
   die();
   }


   public function fd2pdfviewdfd3($id){


    $fd3Id = base64_decode($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
       $fd2FormList = Fd2FormForFd3Form::where('fd_one_form_id',$ngo_list_all->id)->where('fd3_form_id',$fd3Id)->latest()->first();
       $fd2OtherInfo = Fd2Fd3OtherInfo::where('fd2_form_for_fd3_form_id',$fd2FormList->id)->latest()->get();
       $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id) ->orderBy('id','desc')->first();
       $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
       $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
       $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
       $fd3FormList = Fd3Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd3Id)->latest()->first();


       $employeeDetailList = FdThreeEmplyeeDetail::where('user_id',Auth::user()->id)
         ->where('fd3_form_id',$fd3Id)
        ->where('status',1)->get();


        $fdThreeOtherFileList = FdThreeOtherFile::where('fd3_form_id',$fd3Id)->get();

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
        ->where('type','fd3')
        ->get();

       $file_Name_Custome = 'fd_three_form';
   $data =view('front.fd3Form.fd2pdfviewdfd3',[
    'fd2AllFormLastYearDetail'=>$fd2AllFormLastYearDetail,
    'fdThreeOtherFileList'=>$fdThreeOtherFileList,
    'employeeDetailList'=>$employeeDetailList,
    'fd2OtherInfo'=>$fd2OtherInfo,
    'fd2FormList'=>$fd2FormList,
'cityCorporationList'=>$cityCorporationList,
                   'districtList'=>$districtList,

                   'fd3FormList'=>$fd3FormList,
                   'divisionList'=>$divisionList,
                   'renewWebsiteName'=>$renewWebsiteName,
                   'ngoDurationLastEx'=>$ngoDurationLastEx,
                   'ngoDurationReg'=>$ngoDurationReg,
                   'ngo_list_all'=>$ngo_list_all,

               ])->render();


   $pdfFilePath =$file_Name_Custome.'.pdf';


   $mpdf = new Mpdf([ 'default_font_size' => 14,'default_font' => 'nikosh']);
   $mpdf->WriteHTML($data);
   $mpdf->Output($pdfFilePath, "I");
   die();

   }

   public function destroy($id){
    try{
        DB::beginTransaction();
        $admins = Fd3Form::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        DB::commit();
        return back()->with('error','Deleted successfully!');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_404');
    }
}


public function verifiedFdThreeForm($id){
    $get_file_data = Fd3Form::where('id',$id)->value('verified_fd_three_form');

    $file_path = url('public/'.$get_file_data);
    $filename  = pathinfo($file_path, PATHINFO_FILENAME);
    $file= public_path('/'). $get_file_data;
    $headers = array(
              'Content-Type: application/pdf',
            );

    return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
    ]);

   }


   public function fd3OtherFileDownload($id){

    $get_file_data = FdThreeOtherFile::where('id',$id)->value('file');

    $file_path = url('public/'.$get_file_data);
    $filename  = pathinfo($file_path, PATHINFO_FILENAME);
    $file= public_path('/'). $get_file_data;
    $headers = array(
              'Content-Type: application/pdf',
            );

    return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
    ]);

   }


   public function fd3OtherFileDelete($id){


    try{
        DB::beginTransaction();

        $admins = FdThreeOtherFile::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        DB::commit();
        return back()->with('error','Deleted successfully!');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_404');
    }

    }

    public function fd3OtherFileUpdate(Request $request){


        //dd($request->input('id'));

            $fd2FormInfo =FdThreeOtherFile::find($request->mid);
            if ($request->hasfile('file')) {

                $filePath="FdThreeForm";
                $file = $request->file('file');
                $fd2FormInfo->file =CommonController::pdfUpload($request,$file,$filePath);

            }
            $fd2FormInfo->save();


            return 1;


    }

    public function fd3OtherFileModal(Request $request){

        $fd3OtherFileDownloadList = FdThreeOtherFile::where('id',$request->fdthreeOtherFileId)->first();

        $data = view('front.fd3Form._partial.extrafileForm',compact('fd3OtherFileDownloadList'))->render();
                return response()->json($data);

    }

    public function fd3formextrapdf($title, $id){

        $get_file_data = Fd3Form::where('id',$id)->value($title);

        $file_path = url('public/'.$get_file_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);
        $file= public_path('/'). $get_file_data;

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::make(file_get_contents($file), 200, [
            'content-type'=>'application/pdf',
        ]);


       }
}
