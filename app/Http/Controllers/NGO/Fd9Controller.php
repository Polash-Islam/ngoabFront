<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NVisa;
use App\Models\NgoStatus;
use App\Models\NgoRenew;
use App\Models\Country;
use App\Models\Fd9Form;
use App\Models\FdNineOtherFile;
use App\Models\Fd9ForeignerEmployeeFamilyMemberList;
use Illuminate\Support\Facades\Crypt;
use DB;
use PDF;
use Mpdf\Mpdf;
use DateTime;
use DateTimezone;
use App\Models\DakListDetail;
use Response;
use App\Http\Controllers\NGO\CommonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use App\Models\FdOneForm;
use Illuminate\Support\Facades\App;
class Fd9Controller extends Controller
{

    public function index(){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd9List = Fd9Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        return view('front.fdNineForm.index',compact('ngo_list_all','fd9List'));

    }



    public function create(){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id) ->first();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $newOldNgo = CommonController::newOldNgo();

        if($newOldNgo != 'Old'){

                $ngoStatus = NgoStatus::where('fd_one_form_id',$ngo_list_all->id)->first();

        }else{

            $ngoStatus = NgoRenew::where('fd_one_form_id',$ngo_list_all->id)->first();

        }
        return view('front.fdNineForm.newAddForm',compact('ngo_list_all','ngoStatus','checkNgoTypeForForeginNgo'));

    }



    public function edit($id){

        $nVisaId = base64_decode($id);

        $getCityzenshipData = Country::whereNotNull('country_people_english') ->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();
        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->first();
        $countryList = Country::orderBy('id','asc')->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fdNineData =Fd9Form::where('id',$nVisaId)->first();
        $fdOneFormId = NVisa::where('id',$nVisaId)->value('fd_one_form_id');
        $fdOneFormData = FdOneForm::where('id',$fdOneFormId)->first();
        $newOldNgo = CommonController::newOldNgo();

        if($newOldNgo != 'Old'){

            $ngoStatus = NgoStatus::where('fd_one_form_id',$ngo_list_all->id)->first();

        }else{

        $ngoStatus = NgoRenew::where('fd_one_form_id',$ngo_list_all->id)->first();

        }


        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        $fdNineOtherFileList = FdNineOtherFile::where('fd9_form_id',$nVisaId)->get();
        return view('front.fdNineForm.newedit',compact('fdNineOtherFileList','checkNgoTypeForForeginNgo','ngoStatus','fdOneFormData','fdNineData','nVisaId','ngo_list_all','countryList','getCityzenshipData'));

    }



    public function singlePdfDelete(Request $request){

        $fdNineOtherFileList = FdNineOtherFile::where('id',$request->id)->delete();

        return 1;

    }


    public function singlePdfDownload($id){


        $get_file_data = FdNineOtherFile::where('id',$id)->value('main_file');

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


    public function store(Request $request){


        $request->validate([

            'digital_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:60|dimensions:width=300,height=80',
            'digital_seal' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:80|dimensions:width=300,height=100',
            'fd9_foreigner_name' => 'required|string',
            'fd9_father_name' => 'required|string',
            'fd9_husband_or_wife_name' => 'required|string',
            'fd9_mother_name' => 'required|string',
            'fd9_birth_place' => 'required|string',
            'fd9_dob' => 'required|string',
            'fd9_passport_number' => 'required|string',
            'fd9_foreigner_passport_size_photo' => 'required|file',
            'fd9_copy_of_passport' => 'required|file',
            'fd9_passport_issue_date' => 'required|string',
            'fd9_passport_expiration_date' => 'required|string',
            'fd9_identification_mark_given_in_passport' => 'required|string',
            'fd9_male_or_female' => 'required|string',
            'fd9_marital_status' => 'required|string',
            'fd9_nationality_or_citizenship' => 'required|string',
            'fd9_details_if_multiple_citizenships' => 'nullable|string',
            'fd9_previous_citizenship_is_grounds_for_non_retention' => 'nullable|string',
            'fd9_current_address' => 'required|string',
            'fd9_number_of_family_members' => 'required|string',
            'fd9_academic_qualification' => 'required|file',
            'fd9_technical_and_other_qualifications_if_any' => 'nullable|file',
            'fd9_past_experience' => 'required|file',
            'fd9_offered_post' => 'required|file',
            'fd9_name_of_proposed_project' => 'required|file',
            'fd9_date_of_appointment' => 'required|string',
            'fd9_extension_date' => 'nullable|string',
            'fd9_post_available_for_foreigner_and_working' => 'required|string',
            'fd9_previous_work_experience_in_bangladesh' => 'nullable|string',
            'fd9_total_foreigner_working' => 'required|string',
            'fd9_other_information' => 'nullable|string',

        ]);

        if($request->fd9_countries_that_have_traveled == null){

            $arr_all = null;

        }else{

            $arr_all = implode(", ",$request->fd9_countries_that_have_traveled);
        }

        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fd9FormInfo = new Fd9Form();
            $fd9FormInfo->status = 'Review';
            $fd9FormInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fd9FormInfo->chief_name = $request->chief_name;
            $fd9FormInfo->chief_desi = $request->chief_desi;
            $fd9FormInfo->fd9_academic_qualification_des = $request->fd9_academic_qualification_des;
            $fd9FormInfo->fd9_technical_and_other_qualifications_if_any_des = $request->fd9_technical_and_other_qualifications_if_any_des;
            $fd9FormInfo->fd9_past_experience_des = $request->fd9_past_experience_des;
            $fd9FormInfo->fd9_name_of_proposed_project_des = $request->fd9_name_of_proposed_project_des;
            $fd9FormInfo->fd9_post_available_for_foreigner = $request->fd9_post_available_for_foreigner;
            $fd9FormInfo->fd9_offered_post_name =$request->fd9_offered_post_name;
            $fd9FormInfo->fd9_name_of_proposed_project_name=$request->fd9_name_of_proposed_project_name;
            $fd9FormInfo->fd9_name_of_proposed_project_duration=$request->fd9_name_of_proposed_project_duration;
            $fd9FormInfo->fd9_extension_date_new=$request->fd9_extension_date_new;
            $fd9FormInfo->fd_one_form_id = $ngo_list_all->id;
            $fd9FormInfo->fd9_foreigner_name = $request->fd9_foreigner_name;
            $fd9FormInfo->fd9_father_name = $request->fd9_father_name;
            $fd9FormInfo->fd9_husband_or_wife_name = $request->fd9_husband_or_wife_name;
            $fd9FormInfo->fd9_mother_name = $request->fd9_mother_name;
            $fd9FormInfo->fd9_birth_place = $request->fd9_birth_place;
            $fd9FormInfo->fd9_dob = $request->fd9_dob;
            $fd9FormInfo->fd9_passport_number = $request->fd9_passport_number;
            $fd9FormInfo->fd9_passport_issue_date = $request->fd9_passport_issue_date;
            $fd9FormInfo->fd9_passport_expiration_date = $request->fd9_passport_expiration_date;
            $fd9FormInfo->fd9_identification_mark_given_in_passport = $request->fd9_identification_mark_given_in_passport;
            $fd9FormInfo->fd9_male_or_female = $request->fd9_male_or_female;
            $fd9FormInfo->fd9_marital_status = $request->fd9_marital_status;
            $fd9FormInfo->fd9_nationality_or_citizenship = $request->fd9_nationality_or_citizenship;
            $fd9FormInfo->fd9_details_if_multiple_citizenships = $request->fd9_details_if_multiple_citizenships;
            $fd9FormInfo->fd9_previous_citizenship_is_grounds_for_non_retention = $request->fd9_previous_citizenship_is_grounds_for_non_retention;
            $fd9FormInfo->fd9_current_address = $request->fd9_current_address;
            $fd9FormInfo->fd9_number_of_family_members = $request->fd9_number_of_family_members;

            if ($request->hasfile('verified_fd_nine_form')) {
                $filePath="ngoHead";
                $file = $request->file('verified_fd_nine_form');
                $fd9FormInfo->verified_fd_nine_form =CommonController::imageUpload($request,$file,$filePath);

            }

            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $fd9FormInfo->digital_signature =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $fd9FormInfo->digital_seal =CommonController::storeBase64($request->image_seal_base64);

                }


            if ($request->hasfile('fd9_offered_post_niyog')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_offered_post_niyog');
                $fd9FormInfo->fd9_offered_post_niyog =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('fd9_other_information_file')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_other_information_file');
                $fd9FormInfo->fd9_other_information_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('fd9_academic_qualification')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_academic_qualification');
                $fd9FormInfo->fd9_academic_qualification =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('fd9_technical_and_other_qualifications_if_any')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_technical_and_other_qualifications_if_any');
                $fd9FormInfo->fd9_technical_and_other_qualifications_if_any =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('fd9_past_experience')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_past_experience');
                $fd9FormInfo->fd9_past_experience =CommonController::pdfUpload($request,$file,$filePath);

            }

            $fd9FormInfo->fd9_countries_that_have_traveled = $arr_all;

            if ($request->hasfile('fd9_offered_post')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_offered_post');
                $fd9FormInfo->fd9_offered_post =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('fd9_name_of_proposed_project')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_name_of_proposed_project');
                $fd9FormInfo->fd9_name_of_proposed_project =CommonController::pdfUpload($request,$file,$filePath);

            }
            $fd9FormInfo->fd9_date_of_appointment = $request->fd9_date_of_appointment;
            $fd9FormInfo->fd9_extension_date = $request->fd9_extension_date;
            $fd9FormInfo->fd9_post_available_for_foreigner_and_working = $request->fd9_post_available_for_foreigner_and_working;
            $fd9FormInfo->fd9_previous_work_experience_in_bangladesh = $request->fd9_previous_work_experience_in_bangladesh;
            $fd9FormInfo->fd9_total_foreigner_working = $request->fd9_total_foreigner_working;
            $fd9FormInfo->fd9_other_information = $request->fd9_other_information;
            if ($request->hasfile('fd9_foreigner_passport_size_photo')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_foreigner_passport_size_photo');
                $fd9FormInfo->fd9_foreigner_passport_size_photo =CommonController::imageUpload($request,$file,$filePath);

            }
            if ($request->hasfile('fd9_copy_of_passport')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_copy_of_passport');
                $fd9FormInfo->fd9_copy_of_passport =CommonController::pdfUpload($request,$file,$filePath);

            }
            $fd9FormInfo->save();


            $fd9FormId = $fd9FormInfo->id;


            $input = $request->all();


            // new code start
            if (array_key_exists("file_name", $input) && array_key_exists("main_file", $input)){

                $otherFileList = $input['file_name'];
                foreach($otherFileList as $key => $otherFileLists){

                        $form= new FdNineOtherFile();
                        $form->fd9_form_id = $fd9FormId;
                        $form->file_name = $input['file_name'][$key];
                        $file=$input['main_file'][$key];
                        $filePath="fd9FormInfo";
                        $form->main_file=CommonController::pdfUpload($request,$file,$filePath);
                        $form->save();
                    }
            }

            // end new code

            if (array_key_exists("family_member_name", $input) && array_key_exists("family_member_age", $input)){

                    $family_member_name_list = $input['family_member_name'];

                    foreach($family_member_name_list as $key => $family_member_name_list){

                        $form= new Fd9ForeignerEmployeeFamilyMemberList();
                        $form->fd9_form_id = $fd9FormId;
                        $form->family_member_name = $input['family_member_name'][$key];
                        $form->family_member_age = $input['family_member_age'][$key];
                        $form->save();
                    }

            }

            //dd($fd9FormId->id);


            return redirect()->route('fdNineForm.show',base64_encode($fd9FormId))->with('success','Review Your Information And Send It To Ngo');

        } catch (\Exception $e) {

            return $e;
        }

    }


    public function finalFdNineApplicationSubmit($id){


        $new_data_add = Fd9Form::find(base64_decode($id));
        $new_data_add->status = 'Ongoing';
        $new_data_add->save();

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
         $regDakData->dak_type = 'fdNine';
         $regDakData->receive_from_ngo = 1;
         $regDakData->receive_status = 1;
         $regDakData->status = 1;
         $regDakData->nothi_jat_id = 0;
         $regDakData->nothi_jat_status = 0;
         $regDakData->sent_status =null;
         $regDakData->amPmValue = $amPmValueFinal;
         $regDakData->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
         $regDakData->save();

        return redirect('/fdNineForm')->with('success','Submit To Ngo Sucessfully');


    }


    public function update(Request $request,$id){


        if($request->submit_value == 'single_update'){

            try{

                $fd9FormInfo = FdNineOtherFile::find($request->mid);

                $fd9FormInfo->file_name = $request->file_name_edit;
                if ($request->hasfile('main_file_edit')) {
                    $filePath="fd9FormInfo";
                    $file = $request->file('main_file_edit');
                    $fd9FormInfo->main_file_edit =CommonController::imageUpload($request,$file,$filePath);

                }
                $fd9FormInfo->save();

                return redirect()->route('fdNineForm.index')->with('success','Updated Successfully');

            } catch (\Exception $e) {

                return redirect()->route('error_404');
            }



        }else{


            if($request->fd9_countries_that_have_traveled == null){

                $arr_all = null;
            }else{
                    $arr_all = implode(", ",$request->fd9_countries_that_have_traveled);
            }
                try{
                    DB::beginTransaction();

                $fd9FormInfo = Fd9Form::find($id);
                $fd9FormInfo->chief_name = $request->chief_name;
                $fd9FormInfo->chief_desi = $request->chief_desi;
                $fd9FormInfo->fd9_academic_qualification_des = $request->fd9_academic_qualification_des;
                $fd9FormInfo->fd9_technical_and_other_qualifications_if_any_des = $request->fd9_technical_and_other_qualifications_if_any_des;
                $fd9FormInfo->fd9_past_experience_des = $request->fd9_past_experience_des;
                $fd9FormInfo->fd9_name_of_proposed_project_des = $request->fd9_name_of_proposed_project_des;
                $fd9FormInfo->fd9_post_available_for_foreigner = $request->fd9_post_available_for_foreigner;
                $fd9FormInfo->fd9_offered_post_name =$request->fd9_offered_post_name;
                $fd9FormInfo->fd9_name_of_proposed_project_name=$request->fd9_name_of_proposed_project_name;
                $fd9FormInfo->fd9_name_of_proposed_project_duration=$request->fd9_name_of_proposed_project_duration;
                $fd9FormInfo->fd9_extension_date_new=$request->fd9_extension_date_new;
                $fd9FormInfo->fd9_foreigner_name = $request->fd9_foreigner_name;
                $fd9FormInfo->fd9_father_name = $request->fd9_father_name;
                $fd9FormInfo->fd9_husband_or_wife_name = $request->fd9_husband_or_wife_name;
                $fd9FormInfo->fd9_mother_name = $request->fd9_mother_name;
                $fd9FormInfo->fd9_birth_place = $request->fd9_birth_place;
                $fd9FormInfo->fd9_dob = $request->fd9_dob;
                $fd9FormInfo->fd9_passport_number = $request->fd9_passport_number;
                $fd9FormInfo->fd9_passport_issue_date = $request->fd9_passport_issue_date;
                $fd9FormInfo->fd9_passport_expiration_date = $request->fd9_passport_expiration_date;
                $fd9FormInfo->fd9_identification_mark_given_in_passport = $request->fd9_identification_mark_given_in_passport;
                $fd9FormInfo->fd9_male_or_female = $request->fd9_male_or_female;
                $fd9FormInfo->fd9_marital_status = $request->fd9_marital_status;
                $fd9FormInfo->fd9_nationality_or_citizenship = $request->fd9_nationality_or_citizenship;
                $fd9FormInfo->fd9_details_if_multiple_citizenships = $request->fd9_details_if_multiple_citizenships;
                $fd9FormInfo->fd9_previous_citizenship_is_grounds_for_non_retention = $request->fd9_previous_citizenship_is_grounds_for_non_retention;
                $fd9FormInfo->fd9_current_address = $request->fd9_current_address;
                $fd9FormInfo->fd9_number_of_family_members = $request->fd9_number_of_family_members;

                if ($request->hasfile('verified_fd_nine_form')) {
                    $filePath="ngoHead";
                    $file = $request->file('verified_fd_nine_form');
                    $fd9FormInfo->verified_fd_nine_form =CommonController::imageUpload($request,$file,$filePath);

                }

                if (!empty($request->image_base64)) {

                    $filePath="ngoHead";
                    $file = $request->file('digital_signature');
                    $fd9FormInfo->digital_signature =CommonController::storeBase64($request->image_base64);

                    }


                if (!empty($request->image_seal_base64)) {

                    $filePath="ngoHead";
                    $file = $request->file('digital_seal');
                    $fd9FormInfo->digital_seal =CommonController::storeBase64($request->image_seal_base64);

                    }

                if ($request->hasfile('fd9_offered_post_niyog')) {
                    $filePath="fd9FormInfo";
                    $file = $request->file('fd9_offered_post_niyog');
                    $fd9FormInfo->fd9_offered_post_niyog =CommonController::pdfUpload($request,$file,$filePath);

                }


                if ($request->hasfile('fd9_other_information_file')) {
                    $filePath="fd9FormInfo";
                    $file = $request->file('fd9_other_information_file');
                    $fd9FormInfo->fd9_other_information_file =CommonController::pdfUpload($request,$file,$filePath);

                }

                if ($request->hasfile('fd9_academic_qualification')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_academic_qualification');
                $fd9FormInfo->fd9_academic_qualification =CommonController::pdfUpload($request,$file,$filePath);

                }

                if ($request->hasfile('fd9_technical_and_other_qualifications_if_any')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_technical_and_other_qualifications_if_any');
                $fd9FormInfo->fd9_technical_and_other_qualifications_if_any =CommonController::pdfUpload($request,$file,$filePath);

                }

            if ($request->hasfile('fd9_past_experience')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_past_experience');
                $fd9FormInfo->fd9_past_experience =CommonController::pdfUpload($request,$file,$filePath);
            }





                $fd9FormInfo->fd9_countries_that_have_traveled = $arr_all;


                if ($request->hasfile('fd9_offered_post')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_offered_post');
                $fd9FormInfo->fd9_offered_post =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('fd9_name_of_proposed_project')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_name_of_proposed_project');
                $fd9FormInfo->fd9_name_of_proposed_project =CommonController::pdfUpload($request,$file,$filePath);

            }
                $fd9FormInfo->fd9_date_of_appointment = $request->fd9_date_of_appointment;
                $fd9FormInfo->fd9_extension_date = $request->fd9_extension_date;
                $fd9FormInfo->fd9_post_available_for_foreigner_and_working = $request->fd9_post_available_for_foreigner_and_working;
                $fd9FormInfo->fd9_previous_work_experience_in_bangladesh = $request->fd9_previous_work_experience_in_bangladesh;
                $fd9FormInfo->fd9_total_foreigner_working = $request->fd9_total_foreigner_working;
                $fd9FormInfo->fd9_other_information = $request->fd9_other_information;
                if ($request->hasfile('fd9_foreigner_passport_size_photo')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_foreigner_passport_size_photo');
                $fd9FormInfo->fd9_foreigner_passport_size_photo =CommonController::imageUpload($request,$file,$filePath);

            }
            if ($request->hasfile('fd9_copy_of_passport')) {
                $filePath="fd9FormInfo";
                $file = $request->file('fd9_copy_of_passport');
                $fd9FormInfo->fd9_copy_of_passport =CommonController::pdfUpload($request,$file,$filePath);

            }
                $fd9FormInfo->save();


                $fd9FormId = $fd9FormInfo->id;


                $input = $request->all();


                // new code start
                if (array_key_exists("file_name", $input) && array_key_exists("main_file", $input)){
                        $otherFileList = $input['file_name'];

                        foreach($otherFileList as $key => $otherFileLists){

                            $form= new FdNineOtherFile();
                            $form->fd9_form_id = $fd9FormId;
                            $form->file_name = $input['file_name'][$key];
                            $file=$input['main_file'][$key];
                            $filePath="fd9FormInfo";
                            $form->main_file=CommonController::pdfUpload($request,$file,$filePath);
                            $form->save();
                        }
                }

                // end new code

                if (array_key_exists("family_member_name", $input) && array_key_exists("family_member_age", $input)){


                    $family_member_name_list = $input['family_member_name'];

                    Fd9ForeignerEmployeeFamilyMemberList::where('fd9_form_id',$fd9FormId)->delete();
                    foreach($family_member_name_list as $key => $family_member_name_list){

                        $form= new Fd9ForeignerEmployeeFamilyMemberList();
                        $form->fd9_form_id = $fd9FormId;
                        $form->family_member_name = $input['family_member_name'][$key];
                        $form->family_member_age = $input['family_member_age'][$key];
                        $form->save();
                }

                }

            DB::commit();
            return redirect()->route('fdNineForm.index')->with('success','Updated Successfully');

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('error_404');
            }

        }
    }

    public function show($id){

        $nVisaId = base64_decode($id);

        $getCityzenshipData = Country::whereNotNull('country_people_english')->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();
        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->first();
        $countryList = Country::orderBy('id','asc')->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        $fdNineData =Fd9Form::where('id',$nVisaId)->first();
        $fdOneFormId = NVisa::where('id',$nVisaId)->value('fd_one_form_id');
        $fdOneFormData = FdOneForm::where('id',$fdOneFormId)->first();
        $newOldNgo = CommonController::newOldNgo();

        if($newOldNgo != 'Old'){
            $ngoStatus = NgoStatus::where('fd_one_form_id',$ngo_list_all->id)->first();
        }else{

        $ngoStatus = NgoRenew::where('fd_one_form_id',$ngo_list_all->id)->first();

        }

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        $fdNineOtherFileList = FdNineOtherFile::where('fd9_form_id',$nVisaId)->get();

        return view('front.fdNineForm.show',compact('fdNineOtherFileList','checkNgoTypeForForeginNgo','ngoStatus','fdOneFormData','fdNineData','nVisaId','ngo_list_all','countryList','getCityzenshipData'));

    }


    public function mainFd9PdfDownload($id){

        $nVisaId = base64_decode($id);
        $fdNineData =Fd9Form::where('id',$nVisaId)->first();

        $getCityzenshipData = Country::whereNotNull('country_people_english')->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();

        $countryList = Country::orderBy('id','asc')->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        //new code for old  and new

        $checkOldorNew = DB::table('ngo_type_and_languages')->where('user_id',$ngo_list_all->user_id)->value('ngo_type_new_old');

        //end new code for old and new

        if($checkOldorNew == 'Old'){

        $ngoStatus = DB::table('ngo_renews')->where('fd_one_form_id',$ngo_list_all->id)->first();

        }else{

        $ngoStatus = DB::table('ngo_statuses')->where('fd_one_form_id',$ngo_list_all->id)->first();

        }


        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->first();

        $fdNineOtherFileList = FdNineOtherFile::where('fd9_form_id',$nVisaId)->get();
        $file_Name_Custome = 'fd_nine_form';
        $data =view('front.fdNineForm.mainFd9PdfDownload',[

                        'checkNgoTypeForForeginNgo'=>$checkNgoTypeForForeginNgo,
                        'fdNineData'=>$fdNineData,
                        'fdNineData'=>$fdNineData,
                        'getCityzenshipData'=>$getCityzenshipData,
                        'countryList'=>$countryList,
                        'ngo_list_all'=>$ngo_list_all,
                        'ngoStatus'=>$ngoStatus,
                        'fdNineOtherFileList'=>$fdNineOtherFileList

                    ])->render();


        $pdfFilePath =$file_Name_Custome.'.pdf';


        $mpdf = new Mpdf([ 'default_font_size' => 14,'default_font' => 'nikosh']);
        $mpdf->WriteHTML($data);
        $mpdf->Output($pdfFilePath, "I");
        die();

    }

    public function mainFd9PdfUpload(Request $request){
        try{
            DB::beginTransaction();
        $fd9FormInfo = Fd9Form::find($request->id);

        if ($request->hasfile('verified_fd_nine_form')) {
            $filePath="fd9FormInfo";
            $file = $request->file('verified_fd_nine_form');

            $fd9FormInfo->verified_fd_nine_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fd9FormInfo->save();

        DB::commit();
        return redirect()->back()->with('success','Update Successfully');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_404');
    }
    }


    public function fd9Chief(Request $request){

        $name = $request->name;
        $designation = $request->designation;
        $id = $request->id;

        return $data = url('mainFd9PdfDownload/'.base64_encode($id));

    }



    public function destroy($id){
        try{
            DB::beginTransaction();
            $admins = Fd9Form::find($id);
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
}
