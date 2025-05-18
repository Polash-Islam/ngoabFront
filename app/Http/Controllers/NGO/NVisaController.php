<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NVisa;
use App\Models\NgoStatus;
use App\Models\Country;
use App\Models\NVisaAuthorizedPersonalOfTheOrg;
use App\Models\NVisaCompensationAndBenifits;
use App\Models\NVisaEmploymentInformation;
use App\Models\NVisaManpowerOfTheOffice;
use App\Models\NVisaNecessaryDocumentForWorkPermit;
use App\Models\NVisaParticularOfSponsorOrEmployer;
use App\Models\NVisaParticularsOfForeignIncumbnet;
use App\Models\NVisaWorkPlaceAddress;
use Illuminate\Support\Facades\Crypt;
use App\Models\Fd9Form;
use DB;
use PDF;
use DateTime;
use DateTimezone;
use Response;
use App\Http\Controllers\NGO\CommonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;
use App\Models\FdOneForm;
use Illuminate\Support\Facades\App;
class NVisaController extends Controller
{
    public function index(){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $nVisaList = NVisa::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        return view('front.nVisa.index',compact('ngo_list_all','nVisaList'));

    }


    public function addnVisaDetail($id){


        $fd9Id = $id;
        $getCityzenshipData = Country::whereNotNull('country_people_english')->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();

        $countryList = Country::orderBy('id','asc')->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        return view('front.nVisa.create',compact('fd9Id','ngo_list_all','countryList','getCityzenshipData'));


    }

    public function create(){

        $getCityzenshipData = Country::whereNotNull('country_people_english')->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();

        $countryList = Country::orderBy('id','asc')->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        return view('front.nVisa.create',compact('ngo_list_all','countryList','getCityzenshipData'));

    }


    public function edit($id){


       $nVisaEdit = NVisa::where('id',$id)
       ->with(['nVisaParticularOfSponsorOrEmployer','nVisaParticularsOfForeignIncumbnet','nVisaEmploymentInformation','nVisaWorkPlaceAddress','nVisaAuthorizedPersonalOfTheOrg','nVisaNecessaryDocumentForWorkPermit','nVisaManpowerOfTheOffice'])->first();
       $getCityzenshipData = Country::whereNotNull('country_people_english')
       ->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();

        $countryList = Country::orderBy('id','asc')->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        return view('front.nVisa.edit',compact('nVisaEdit','ngo_list_all','countryList','getCityzenshipData'));

    }


    public function store(Request $request){

        $request->validate([
            'period_validity' => 'required|string',
            'permit_efct_date' => 'required|string',
            'visa_ref_no' => 'required|string',
            'visa_recomendation_letter_received_way' => 'required|string',
            'visa_recomendation_letter_ref_no' => 'required|string',
            'department_in' => 'required|string',
            'visa_category' => 'required|string',
            'applicant_photo' => 'required|file',
            'org_name' => 'required|string',
            'org_house_no' => 'required|string',
            'org_flat_no' => 'required|string',
            'org_road_no' => 'required|string',
            'org_phone' => 'required|string',
            'org_district' => 'required|string',
            'org_thana' => 'required|string',
            'org_email' => 'required|email',
            'org_type' => 'required|string',
            'name_of_the_foreign_national' => 'required|string',
            'nationality' => 'required|string',
            'passport_no' => 'required|string',
            'passport_issue_date' => 'required|string',
            'passport_issue_place' => 'required|string',
            'passport_expiry_date' => 'required|string',
            'home_country' => 'required|string',
            'house_no' => 'required|string',
            'flat_no' => 'required|string',
            'road_no' => 'required|string',
            'post_code' => 'required|string',
            'state' => 'required|string',
            'phone' => 'required|string',
            'city' => 'required|string',
            'fax_no' => 'required|string',
            'email' => 'required|string',
            'date_of_birth' => 'required|string',
            'martial_status' => 'required|string',
            'employed_designation' => 'required|string',
            'date_of_arrival_in_bangladesh' => 'required|string',
            'visa_type' => 'required|string',
            'first_appoinment_date' => 'required|string',
            'desired_effective_date' => 'required|string',
            'desired_end_date' => 'required|string',
            'visa_validity' => 'required|string',
            'brief_job_description' => 'required|string',
            'employee_justification' => 'required|string',
            'work_house_no' => 'required|string',
            'work_flat_no' => 'required|string',
            'work_road_no' => 'required|string',
            'work_org_type' => 'required|string',
            'desired_effective_date' => 'required|string',
            'contact_person_mobile_number' => 'required|string',
            'work_district' => 'required|string',
            'work_thana' => 'required|string',
            'work_email' => 'required|string',
            'auth_person_org_name' => 'required|string',
            'auth_person_org_house_no' => 'required|string',
            'auth_person_org_flat_no' => 'required|string',
            'auth_person_org_road_no' => 'required|string',
            'auth_person_org_post_office' => 'required|string',
            'auth_person_org_mobile' => 'required|string',
            'auth_person_org_district' => 'required|string',
            'auth_person_org_thana' => 'required|string',
            'submission_date' => 'required|string',
            'expatriate_name' => 'required|string',
            'expatriate_email' => 'required|string',
        ]);


        try{
            DB::beginTransaction();

            $fdOneFormId = FdOneForm::where('user_id',Auth::user()->id)->first();

            //change date Formate

            $permit_efct_date = date('Y-m-d', strtotime($request->permit_efct_date));
            $permit_efct_date = date('Y-m-d', strtotime($request->permit_efct_date));
            //change date Formate

            $nVisaBasicInfo = new NVisa();
            $nVisaBasicInfo->fd_one_form_id = $fdOneFormId->id;
            $nVisaBasicInfo->fd9_one_form_id = $request->fd9OneId;
            $nVisaBasicInfo->period_validity = $request->period_validity;
            $nVisaBasicInfo->permit_efct_date = $request->permit_efct_date;
            $nVisaBasicInfo->visa_ref_no = $request->visa_ref_no;
            $nVisaBasicInfo->visa_recomendation_letter_received_way = $request->visa_recomendation_letter_received_way;
            $nVisaBasicInfo->visa_recomendation_letter_ref_no = $request->visa_recomendation_letter_ref_no;
            $nVisaBasicInfo->department_in = $request->department_in;
            $nVisaBasicInfo->visa_category = $request->visa_category;
            $nVisaBasicInfo->other_benefit = $request->other_benefit;
            $nVisaBasicInfo->salary_remarks = $request->salary_remarks;
            if ($request->hasfile('applicant_photo')) {
                $filePath="applicant_photo";
                $file = $request->file('applicant_photo');
                $nVisaBasicInfo->applicant_photo =CommonController::imageUpload($request,$file,$filePath);

            }
            $nVisaBasicInfo->save();


            $nVisaId = $nVisaBasicInfo->id;

            $particularOfEmployee = new NVisaParticularOfSponsorOrEmployer();
            $particularOfEmployee->n_visa_id = $nVisaId;
            $particularOfEmployee->org_name = $request->org_name;
            $particularOfEmployee->org_house_no = $request->org_house_no;
            $particularOfEmployee->org_flat_no = $request->org_flat_no;
            $particularOfEmployee->org_road_no = $request->org_road_no;
            $particularOfEmployee->org_post_code = $request->org_post_code;
            $particularOfEmployee->org_post_office = $request->org_post_office;
            $particularOfEmployee->org_phone = $request->org_phone;
            $particularOfEmployee->org_district = $request->org_district;
            $particularOfEmployee->org_thana = $request->org_thana;
            $particularOfEmployee->org_fax_no = $request->org_fax_no;
            $particularOfEmployee->org_email = $request->org_email;
            $particularOfEmployee->org_type = $request->org_type;
            $particularOfEmployee->nature_of_business = $request->nature_of_business;
            $particularOfEmployee->authorized_capital = $request->authorized_capital;
            $particularOfEmployee->paid_up_capital = $request->paid_up_capital;
            $particularOfEmployee->remittance_received = $request->remittance_received;
            $particularOfEmployee->industry_type = $request->industry_type;
            $particularOfEmployee->recommendation_of_company_board = $request->recommendation_of_company_board;
            $particularOfEmployee->company_share = $request->company_share;
            $particularOfEmployee->save();


            $particularOfForeignIncumbnets= new NVisaParticularsOfForeignIncumbnet();
            $particularOfForeignIncumbnets->n_visa_id = $nVisaId;
            $particularOfForeignIncumbnets->name_of_the_foreign_national = $request->name_of_the_foreign_national;
            $particularOfForeignIncumbnets->nationality = $request->nationality;
            $particularOfForeignIncumbnets->passport_no = $request->passport_no;
            $particularOfForeignIncumbnets->passport_issue_date = $request->passport_issue_date;
            $particularOfForeignIncumbnets->passport_issue_place = $request->passport_issue_place;
            $particularOfForeignIncumbnets->passport_expiry_date = $request->passport_expiry_date;
            $particularOfForeignIncumbnets->home_country = $request->home_country;
            $particularOfForeignIncumbnets->house_no = $request->house_no;
            $particularOfForeignIncumbnets->flat_no = $request->flat_no;
            $particularOfForeignIncumbnets->road_no = $request->road_no;
            $particularOfForeignIncumbnets->post_code = $request->post_code;
            $particularOfForeignIncumbnets->state = $request->state;
            $particularOfForeignIncumbnets->phone = $request->phone;
            $particularOfForeignIncumbnets->city = $request->city;
            $particularOfForeignIncumbnets->fax_no = $request->fax_no;
            $particularOfForeignIncumbnets->email = $request->email;
            $particularOfForeignIncumbnets->date_of_birth = $request->date_of_birth;
            $particularOfForeignIncumbnets->martial_status = $request->martial_status;

            $particularOfForeignIncumbnets->save();


            $employmentInfo= new NVisaEmploymentInformation();
            $employmentInfo->n_visa_id = $nVisaId;
            $employmentInfo->employed_designation = $request->employed_designation;
            $employmentInfo->date_of_arrival_in_bangladesh = $request->date_of_arrival_in_bangladesh;
            $employmentInfo->visa_type = $request->visa_type;
            $employmentInfo->first_appoinment_date = $request->first_appoinment_date;
            $employmentInfo->desired_effective_date = $request->desired_effective_date;
            $employmentInfo->travel_visa_cate = $request->travel_visa_cate;
            $employmentInfo->visa_validity = $request->visa_validity;
            $employmentInfo->brief_job_description = $request->brief_job_description;
            $employmentInfo->employee_justification = $request->employee_justification;
            $employmentInfo->desired_end_date = $request->desired_end_date;
            $employmentInfo->save();


            $workPlaceAddress= new NVisaWorkPlaceAddress();
            $workPlaceAddress->n_visa_id = $nVisaId;
            $workPlaceAddress->work_house_no = $request->work_house_no;
            $workPlaceAddress->work_flat_no = $request->work_flat_no;
            $workPlaceAddress->work_road_no = $request->work_road_no;
            $workPlaceAddress->work_org_type = $request->work_org_type;
            $workPlaceAddress->contact_person_mobile_number = $request->contact_person_mobile_number;
            $workPlaceAddress->work_district = $request->work_district;
            $workPlaceAddress->work_thana = $request->work_thana;
            $workPlaceAddress->work_email = $request->work_email;
            $workPlaceAddress->save();


            if(empty($request->local_ratio) && empty($request->foreign_ratio)){


            }else{

            $manPower= new NVisaManpowerOfTheOffice();
            $manPower->n_visa_id = $nVisaId;
            $manPower->local_executive = $request->local_executive;
            $manPower->local_supporting_staff = $request->local_supporting_staff;
            $manPower->local_total = $request->local_total;
            $manPower->foreign_executive = $request->foreign_executive;
            $manPower->foreign_supporting_staff = $request->foreign_supporting_staff;
            $manPower->foreign_total = $request->foreign_total;
            $manPower->gand_total = $request->gand_total;
            $manPower->local_ratio = $request->local_ratio;
            $manPower->foreign_ratio = $request->foreign_ratio;
            $manPower->save();
            }

            if(empty($request->nomination_letter_of_buyer)){

            }else{

                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                ->value('id');

                if(empty($findId)){

                    $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('nomination_letter_of_buyer')) {
                    $filePath="necessaryDocument";
                    $file = $request->file('nomination_letter_of_buyer');
                    $necessaryDocument->nomination_letter_of_buyer =CommonController::pdfUpload($request,$file,$filePath);

                }
                    $necessaryDocument->save();

                }else{

                    $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('nomination_letter_of_buyer')) {
                    $filePath="necessaryDocument";
                    $file = $request->file('nomination_letter_of_buyer');
                    $necessaryDocument->nomination_letter_of_buyer =CommonController::pdfUpload($request,$file,$filePath);

                }
                    $necessaryDocument->save();
                }



            }


            if(empty($request->registration_letter_of_board_of_investment)){

            }else{

                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                        ->value('id');

                        if(empty($findId)){
                            $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                            $necessaryDocument->n_visa_id = $nVisaId;

                        if ($request->hasfile('registration_letter_of_board_of_investment')) {
                            $filePath="necessaryDocument";
                            $file = $request->file('registration_letter_of_board_of_investment');
                            $necessaryDocument->registration_letter_of_board_of_investment =CommonController::pdfUpload($request,$file,$filePath);

                        }
                        $necessaryDocument->save();

                        }else{
                            $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                            $necessaryDocument->n_visa_id = $nVisaId;

                        if ($request->hasfile('registration_letter_of_board_of_investment')) {
                            $filePath="necessaryDocument";
                            $file = $request->file('registration_letter_of_board_of_investment');
                            $necessaryDocument->registration_letter_of_board_of_investment =CommonController::pdfUpload($request,$file,$filePath);

                        }
                        $necessaryDocument->save();

                        }




            }


            if(empty($request->employee_contract_copy)){

            }else{


                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                ->value('id');

                if(empty($findId)){
                    $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                    $necessaryDocument->n_visa_id = $nVisaId;

                    if ($request->hasfile('employee_contract_copy')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('employee_contract_copy');
                        $necessaryDocument->employee_contract_copy =CommonController::pdfUpload($request,$file,$filePath);

                    }
                    $necessaryDocument->save();

                }else{
                    $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                    $necessaryDocument->n_visa_id = $nVisaId;

                    if ($request->hasfile('employee_contract_copy')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('employee_contract_copy');
                        $necessaryDocument->employee_contract_copy =CommonController::pdfUpload($request,$file,$filePath);

                    }
                    $necessaryDocument->save();

                }




            }


            if(empty($request->board_of_the_directors_sign_letter)){

            }else{

                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                ->value('id');

                if(empty($findId)){

                    $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                    $necessaryDocument->n_visa_id = $nVisaId;

                    if ($request->hasfile('board_of_the_directors_sign_letter')) {
                    $filePath="necessaryDocument";
                    $file = $request->file('board_of_the_directors_sign_letter');
                    $necessaryDocument->board_of_the_directors_sign_letter =CommonController::pdfUpload($request,$file,$filePath);

                }
                    $necessaryDocument->save();

                }else{

                    $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                    $necessaryDocument->n_visa_id = $nVisaId;

                    if ($request->hasfile('board_of_the_directors_sign_letter')) {
                    $filePath="necessaryDocument";
                    $file = $request->file('board_of_the_directors_sign_letter');
                    $necessaryDocument->board_of_the_directors_sign_letter =CommonController::pdfUpload($request,$file,$filePath);

                }
                    $necessaryDocument->save();
                }



            }




            if(empty($request->share_holder_copy)){

            }else{

                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                ->value('id');


                if(empty($findId)){

                    $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('share_holder_copy')) {
                    $filePath="necessaryDocument";
                    $file = $request->file('share_holder_copy');
                    $necessaryDocument->share_holder_copy =CommonController::pdfUpload($request,$file,$filePath);

                }
                    $necessaryDocument->save();

                }else{

                    $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('share_holder_copy')) {
                    $filePath="necessaryDocument";
                    $file = $request->file('share_holder_copy');
                    $necessaryDocument->share_holder_copy =CommonController::pdfUpload($request,$file,$filePath);

                }
                    $necessaryDocument->save();
                }



            }


            if(empty($request->passport_photocopy)){

            }else{

                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                ->value('id');

                if(empty($findId)){

                    $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('passport_photocopy')) {
                    $filePath="necessaryDocument";
                    $file = $request->file('passport_photocopy');
                    $necessaryDocument->passport_photocopy =CommonController::pdfUpload($request,$file,$filePath);

                }

                    $necessaryDocument->save();

                }else{

                    $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('passport_photocopy')) {
                    $filePath="necessaryDocument";
                    $file = $request->file('passport_photocopy');
                    $necessaryDocument->passport_photocopy =CommonController::pdfUpload($request,$file,$filePath);

                }

                    $necessaryDocument->save();
                }



            }


            $authorizedPersonal= new NVisaAuthorizedPersonalOfTheOrg();
            $authorizedPersonal->n_visa_id = $nVisaId;
            $authorizedPersonal->auth_person_org_name = $request->auth_person_org_name;
            $authorizedPersonal->auth_person_org_house_no = $request->auth_person_org_house_no;
            $authorizedPersonal->auth_person_org_flat_no = $request->auth_person_org_flat_no;
            $authorizedPersonal->auth_person_org_road_no = $request->auth_person_org_road_no;
            $authorizedPersonal->auth_person_org_post_office = $request->auth_person_org_post_office;
            $authorizedPersonal->auth_person_org_mobile = $request->auth_person_org_mobile;
            $authorizedPersonal->auth_person_org_district = $request->auth_person_org_district;
            $authorizedPersonal->auth_person_org_thana = $request->auth_person_org_thana;
            $authorizedPersonal->submission_date = $request->submission_date;
            $authorizedPersonal->expatriate_name = $request->expatriate_name;
            $authorizedPersonal->expatriate_email = $request->expatriate_email;
            $authorizedPersonal->save();


            if(empty($request->amount_annual)){

            }else{


                $amount_annual= new NVisaCompensationAndBenifits();
                $amount_annual->n_visa_id = $nVisaId;
                $amount_annual->salary_category ='Annual Bonus';
                $amount_annual->payment_type = $request->payment_type_annual;
                $amount_annual->amount = $request->amount_annual;
                $amount_annual->currency = $request->currency_annual;
                $amount_annual->save();

            }


            if(empty($request->amount_medical)){

            }else{

                $amount_medical= new NVisaCompensationAndBenifits();
                $amount_medical->n_visa_id = $nVisaId;
                $amount_medical->salary_category ='Medical Allowance';
                $amount_medical->payment_type = $request->payment_type_medical;
                $amount_medical->amount = $request->amount_medical;
                $amount_medical->currency = $request->currency_medical;
                $amount_medical->save();

            }


            if(empty($request->amount_entertainment)){

            }else{

                $amount_entertainment= new NVisaCompensationAndBenifits();
                $amount_entertainment->n_visa_id = $nVisaId;
                $amount_entertainment->salary_category ='Entertainment Allowance';
                $amount_entertainment->payment_type = $request->payment_type_entertainment;
                $amount_entertainment->amount = $request->amount_entertainment;
                $amount_entertainment->currency = $request->currency_entertainment;
                $amount_entertainment->save();

            }


            if(empty($request->amount_conveyance)){

            }else{

                $amount_conveyance= new NVisaCompensationAndBenifits();
            $amount_conveyance->n_visa_id = $nVisaId;
            $amount_conveyance->salary_category ='Conveyance';
            $amount_conveyance->payment_type = $request->payment_type_conveyance;
            $amount_conveyance->amount = $request->amount_conveyance;
            $amount_conveyance->currency = $request->currency_conveyance;
            $amount_conveyance->save();

            }

            if(empty($request->amount_home)){

            }else{

            $amount_home= new NVisaCompensationAndBenifits();
            $amount_home->n_visa_id = $nVisaId;
            $amount_home->salary_category ='House Rent';
            $amount_home->payment_type = $request->payment_type_home;
            $amount_home->amount = $request->amount_home;
            $amount_home->currency = $request->currency_home;
            $amount_home->save();

            }


            if(empty($request->amount_overseas)){

            }else{

            $amount_overseas= new NVisaCompensationAndBenifits();
            $amount_overseas->n_visa_id = $nVisaId;
            $amount_overseas->salary_category ='Overseas Allowance';
            $amount_overseas->payment_type = $request->payment_type_overseas;
            $amount_overseas->amount = $request->amount_overseas;
            $amount_overseas->currency = $request->currency_overseas;
            $amount_overseas->save();

            }

            if(empty($request->amount_basic)){

            }else{

            $amount_basic= new NVisaCompensationAndBenifits();
            $amount_basic->n_visa_id = $nVisaId;
            $amount_basic->salary_category ='Basic Salary';
            $amount_basic->payment_type = $request->payment_type_basic;
            $amount_basic->amount = $request->amount_basic;
            $amount_basic->currency = $request->currency_basic;
            $amount_basic->save();

            }


            NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)

            ->whereNull('nomination_letter_of_buyer')
            ->whereNull('registration_letter_of_board_of_investment')
            ->whereNull('employee_contract_copy')
            ->whereNull('board_of_the_directors_sign_letter')
            ->whereNull('share_holder_copy')
            ->whereNull('passport_photocopy')


            ->delete();
            DB::commit();
            return redirect()->route('fdNineOneForm.show',base64_encode($request->fd9OneId))->with('success','Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }




    public function update(Request $request,$id){

            try{
                DB::beginTransaction();

            $fdOneFormId = FdOneForm::where('user_id',Auth::user()->id)->first();


            //change date Formate

            $permit_efct_date = date('Y-m-d', strtotime($request->permit_efct_date));
            $permit_efct_date = date('Y-m-d', strtotime($request->permit_efct_date));
            //change date Formate

            $nVisaBasicInfo = NVisa::find($id);
            $nVisaBasicInfo->fd_one_form_id = $fdOneFormId->id;
            $nVisaBasicInfo->period_validity = $request->period_validity;
            $nVisaBasicInfo->permit_efct_date = $request->permit_efct_date;
            $nVisaBasicInfo->visa_ref_no = $request->visa_ref_no;
            $nVisaBasicInfo->visa_recomendation_letter_received_way = $request->visa_recomendation_letter_received_way;
            $nVisaBasicInfo->visa_recomendation_letter_ref_no = $request->visa_recomendation_letter_ref_no;
            $nVisaBasicInfo->department_in = $request->department_in;
            $nVisaBasicInfo->visa_category = $request->visa_category;
            $nVisaBasicInfo->other_benefit = $request->other_benefit;
            $nVisaBasicInfo->salary_remarks = $request->salary_remarks;
            if ($request->hasfile('applicant_photo')) {
                $filePath="applicant_photo";
                $file = $request->file('applicant_photo');
                $nVisaBasicInfo->applicant_photo =CommonController::imageUpload($request,$file,$filePath);

            }
            $nVisaBasicInfo->save();


            $nVisaId = $nVisaBasicInfo->id;

            $findIdEmployee = NVisaParticularOfSponsorOrEmployer::where('n_visa_id',$nVisaId)
            ->value('id');

            $particularOfEmployee =NVisaParticularOfSponsorOrEmployer::find($findIdEmployee);
            $particularOfEmployee->org_name = $request->org_name;
            $particularOfEmployee->org_house_no = $request->org_house_no;
            $particularOfEmployee->org_flat_no = $request->org_flat_no;
            $particularOfEmployee->org_road_no = $request->org_road_no;
            $particularOfEmployee->org_post_code = $request->org_post_code;
            $particularOfEmployee->org_post_office = $request->org_post_office;
            $particularOfEmployee->org_phone = $request->org_phone;
            $particularOfEmployee->org_district = $request->org_district;
            $particularOfEmployee->org_thana = $request->org_thana;
            $particularOfEmployee->org_fax_no = $request->org_fax_no;
            $particularOfEmployee->org_email = $request->org_email;
            $particularOfEmployee->org_type = $request->org_type;
            $particularOfEmployee->nature_of_business = $request->nature_of_business;
            $particularOfEmployee->authorized_capital = $request->authorized_capital;
            $particularOfEmployee->paid_up_capital = $request->paid_up_capital;
            $particularOfEmployee->remittance_received = $request->remittance_received;
            $particularOfEmployee->industry_type = $request->industry_type;
            $particularOfEmployee->recommendation_of_company_board = $request->recommendation_of_company_board;
            $particularOfEmployee->company_share = $request->company_share;
            $particularOfEmployee->save();


            $findIdIncumbnet = NVisaParticularsOfForeignIncumbnet::where('n_visa_id',$nVisaId)
            ->value('id');


            $particularOfForeignIncumbnets= NVisaParticularsOfForeignIncumbnet::find($findIdIncumbnet);
            $particularOfForeignIncumbnets->name_of_the_foreign_national = $request->name_of_the_foreign_national;
            $particularOfForeignIncumbnets->nationality = $request->nationality;
            $particularOfForeignIncumbnets->passport_no = $request->passport_no;
            $particularOfForeignIncumbnets->passport_issue_date = $request->passport_issue_date;
            $particularOfForeignIncumbnets->passport_issue_place = $request->passport_issue_place;
            $particularOfForeignIncumbnets->passport_expiry_date = $request->passport_expiry_date;
            $particularOfForeignIncumbnets->home_country = $request->home_country;
            $particularOfForeignIncumbnets->house_no = $request->house_no;
            $particularOfForeignIncumbnets->flat_no = $request->flat_no;
            $particularOfForeignIncumbnets->road_no = $request->road_no;
            $particularOfForeignIncumbnets->post_code = $request->post_code;
            $particularOfForeignIncumbnets->state = $request->state;
            $particularOfForeignIncumbnets->phone = $request->phone;
            $particularOfForeignIncumbnets->city = $request->city;
            $particularOfForeignIncumbnets->fax_no = $request->fax_no;
            $particularOfForeignIncumbnets->email = $request->email;
            $particularOfForeignIncumbnets->date_of_birth = $request->date_of_birth;
            $particularOfForeignIncumbnets->martial_status = $request->martial_status;

            $particularOfForeignIncumbnets->save();

            $findIdInfo = NVisaEmploymentInformation::where('n_visa_id',$nVisaId)
            ->value('id');


            $employmentInfo= NVisaEmploymentInformation::find($findIdInfo);
            $employmentInfo->employed_designation = $request->employed_designation;
            $employmentInfo->date_of_arrival_in_bangladesh = $request->date_of_arrival_in_bangladesh;
            $employmentInfo->visa_type = $request->visa_type;
            $employmentInfo->first_appoinment_date = $request->first_appoinment_date;
            $employmentInfo->desired_effective_date = $request->desired_effective_date;
            $employmentInfo->travel_visa_cate = $request->travel_visa_cate;
            $employmentInfo->visa_validity = $request->visa_validity;
            $employmentInfo->brief_job_description = $request->brief_job_description;
            $employmentInfo->employee_justification = $request->employee_justification;
            $employmentInfo->desired_end_date = $request->desired_end_date;
            $employmentInfo->save();


            $findIdWork = NVisaWorkPlaceAddress::where('n_visa_id',$nVisaId)
            ->value('id');

            $workPlaceAddress= NVisaWorkPlaceAddress::find($findIdWork);
            $workPlaceAddress->work_house_no = $request->work_house_no;
            $workPlaceAddress->work_flat_no = $request->work_flat_no;
            $workPlaceAddress->work_road_no = $request->work_road_no;
            $workPlaceAddress->work_org_type = $request->work_org_type;
            $workPlaceAddress->contact_person_mobile_number = $request->contact_person_mobile_number;
            $workPlaceAddress->work_district = $request->work_district;
            $workPlaceAddress->work_thana = $request->work_thana;
            $workPlaceAddress->work_email = $request->work_email;
            $workPlaceAddress->save();


            if(empty($request->local_ratio) && empty($request->foreign_ratio)){


            }else{

            $findIdPower = NVisaManpowerOfTheOffice::where('n_visa_id',$nVisaId)
            ->value('id');

            $manPower= NVisaManpowerOfTheOffice::find($findIdPower);
            $manPower->local_executive = $request->local_executive;
            $manPower->local_supporting_staff = $request->local_supporting_staff;
            $manPower->local_total = $request->local_total;
            $manPower->foreign_executive = $request->foreign_executive;
            $manPower->foreign_supporting_staff = $request->foreign_supporting_staff;
            $manPower->foreign_total = $request->foreign_total;
            $manPower->gand_total = $request->gand_total;
            $manPower->local_ratio = $request->local_ratio;
            $manPower->foreign_ratio = $request->foreign_ratio;
            $manPower->save();
            }

            if(empty($request->nomination_letter_of_buyer)){

            }else{

                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                ->value('id');

                if(empty($findId)){

                    $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('nomination_letter_of_buyer')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('nomination_letter_of_buyer');
                        $necessaryDocument->nomination_letter_of_buyer =CommonController::pdfUpload($request,$file,$filePath);

                    }
                    $necessaryDocument->save();

                }else{

                    $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('nomination_letter_of_buyer')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('nomination_letter_of_buyer');
                        $necessaryDocument->nomination_letter_of_buyer =CommonController::pdfUpload($request,$file,$filePath);

                    }
                    $necessaryDocument->save();
                }



            }


            if(empty($request->registration_letter_of_board_of_investment)){

            }else{

                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                        ->value('id');

                        if(empty($findId)){
                            $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                            $necessaryDocument->n_visa_id = $nVisaId;

                        if ($request->hasfile('registration_letter_of_board_of_investment')) {
                            $filePath="necessaryDocument";
                            $file = $request->file('registration_letter_of_board_of_investment');
                            $necessaryDocument->registration_letter_of_board_of_investment =CommonController::pdfUpload($request,$file,$filePath);

                        }
                        $necessaryDocument->save();

                        }else{
                            $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                            $necessaryDocument->n_visa_id = $nVisaId;

                        if ($request->hasfile('registration_letter_of_board_of_investment')) {
                            $filePath="necessaryDocument";
                            $file = $request->file('registration_letter_of_board_of_investment');
                            $necessaryDocument->registration_letter_of_board_of_investment =CommonController::pdfUpload($request,$file,$filePath);

                        }
                        $necessaryDocument->save();

                        }




            }


            if(empty($request->employee_contract_copy)){

            }else{


                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                ->value('id');

                if(empty($findId)){
                    $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                    $necessaryDocument->n_visa_id = $nVisaId;

                    if ($request->hasfile('employee_contract_copy')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('employee_contract_copy');
                        $necessaryDocument->employee_contract_copy =CommonController::pdfUpload($request,$file,$filePath);

                    }
                    $necessaryDocument->save();

                }else{
                    $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                    $necessaryDocument->n_visa_id = $nVisaId;

                    if ($request->hasfile('employee_contract_copy')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('employee_contract_copy');
                        $necessaryDocument->employee_contract_copy =CommonController::pdfUpload($request,$file,$filePath);

                    }
                    $necessaryDocument->save();

                }




            }


            if(empty($request->board_of_the_directors_sign_letter)){

            }else{

                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                ->value('id');

                if(empty($findId)){

                    $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                    $necessaryDocument->n_visa_id = $nVisaId;

                    if ($request->hasfile('board_of_the_directors_sign_letter')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('board_of_the_directors_sign_letter');
                        $necessaryDocument->board_of_the_directors_sign_letter =CommonController::pdfUpload($request,$file,$filePath);

                    }
                    $necessaryDocument->save();

                }else{

                    $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                    $necessaryDocument->n_visa_id = $nVisaId;

                    if ($request->hasfile('board_of_the_directors_sign_letter')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('board_of_the_directors_sign_letter');
                        $necessaryDocument->board_of_the_directors_sign_letter =CommonController::pdfUpload($request,$file,$filePath);

                    }
                    $necessaryDocument->save();
                }



            }




            if(empty($request->share_holder_copy)){

            }else{

                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                ->value('id');


                if(empty($findId)){

                    $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('share_holder_copy')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('share_holder_copy');
                        $necessaryDocument->share_holder_copy =CommonController::pdfUpload($request,$file,$filePath);

                    }
                    $necessaryDocument->save();

                }else{

                    $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('share_holder_copy')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('share_holder_copy');
                        $necessaryDocument->share_holder_copy =CommonController::pdfUpload($request,$file,$filePath);

                    }
                    $necessaryDocument->save();
                }



            }


            if(empty($request->passport_photocopy)){

            }else{

                $findId = NVisaNecessaryDocumentForWorkPermit::where('n_visa_id',$nVisaId)
                ->value('id');

                if(empty($findId)){

                    $necessaryDocument= new NVisaNecessaryDocumentForWorkPermit();
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('passport_photocopy')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('passport_photocopy');
                        $necessaryDocument->passport_photocopy =CommonController::pdfUpload($request,$file,$filePath);

                    }

                    $necessaryDocument->save();

                }else{

                    $necessaryDocument= NVisaNecessaryDocumentForWorkPermit::find($findId);
                    $necessaryDocument->n_visa_id = $nVisaId;
                    if ($request->hasfile('passport_photocopy')) {
                        $filePath="necessaryDocument";
                        $file = $request->file('passport_photocopy');
                        $necessaryDocument->passport_photocopy =CommonController::pdfUpload($request,$file,$filePath);

                    }

                    $necessaryDocument->save();
                }



            }


            $findIdAuth = NVisaAuthorizedPersonalOfTheOrg::where('n_visa_id',$nVisaId)
            ->value('id');

            $authorizedPersonal=NVisaAuthorizedPersonalOfTheOrg::find($findIdAuth);
            $authorizedPersonal->auth_person_org_name = $request->auth_person_org_name;
            $authorizedPersonal->auth_person_org_house_no = $request->auth_person_org_house_no;
            $authorizedPersonal->auth_person_org_flat_no = $request->auth_person_org_flat_no;
            $authorizedPersonal->auth_person_org_road_no = $request->auth_person_org_road_no;
            $authorizedPersonal->auth_person_org_post_office = $request->auth_person_org_post_office;
            $authorizedPersonal->auth_person_org_mobile = $request->auth_person_org_mobile;
            $authorizedPersonal->auth_person_org_district = $request->auth_person_org_district;
            $authorizedPersonal->auth_person_org_thana = $request->auth_person_org_thana;
            $authorizedPersonal->submission_date = $request->submission_date;
            $authorizedPersonal->expatriate_name = $request->expatriate_name;
            $authorizedPersonal->expatriate_email = $request->expatriate_email;
            $authorizedPersonal->save();

            $findIdCom = NVisaCompensationAndBenifits::where('n_visa_id',$nVisaId)
            ->value('id');

            // dd($request->all());
            if(empty($request->amount_annual)){

            }else{

                NVisaCompensationAndBenifits::where('id', $findIdCom)
                ->where('salary_category','Annual Bonus')
                ->update([
                    'payment_type' => $request->payment_type_annual,
                    'amount' => $request->amount_annual,
                    'currency' => $request->currency_annual,
                    ]);




            }


            if(empty($request->amount_medical)){

            }else{




                NVisaCompensationAndBenifits::where('id', $findIdCom)
                ->where('salary_category','Medical Allowance')
                    ->update([
                        'payment_type' => $request->payment_type_medical,
                        'amount' => $request->amount_medical,
                        'currency' => $request->currency_medical,
                    ]);


            }


            if(empty($request->amount_entertainment)){

            }else{




                NVisaCompensationAndBenifits::where('id', $findIdCom)
                ->where('salary_category','Entertainment Allowance')
                    ->update([
                        'payment_type' => $request->payment_type_entertainment,
                        'amount' => $request->amount_entertainment,
                        'currency' => $request->currency_entertainment,
                    ]);



            }


            if(empty($request->amount_conveyance)){

            }else{



            NVisaCompensationAndBenifits::where('id', $findIdCom)
            ->where('salary_category','Conveyance')
                ->update([
                    'payment_type' => $request->payment_type_conveyance,
                    'amount' => $request->amount_conveyance,
                    'currency' => $request->currency_conveyance,
                ]);

            }

            if(empty($request->amount_home)){

            }else{



            NVisaCompensationAndBenifits::where('id', $findIdCom)
            ->where('salary_category','House Rent')
                ->update([
                    'payment_type' => $request->payment_type_home,
                    'amount' => $request->amount_home,
                    'currency' => $request->currency_home,
                ]);

            }


            if(empty($request->amount_overseas)){

            }else{



            NVisaCompensationAndBenifits::where('id', $findIdCom)
            ->where('salary_category','Overseas Allowance')
                ->update([
                    'payment_type' => $request->payment_type_overseas,
                    'amount' => $request->amount_overseas,
                    'currency' => $request->currency_overseas,
                ]);

            }

            if(empty($request->amount_basic)){

            }else{



            NVisaCompensationAndBenifits::where('id', $findIdCom)
            ->where('salary_category','Basic Salary')
                ->update([
                    'payment_type' => $request->payment_type_basic,
                    'amount' => $request->amount_basic,
                    'currency' => $request->currency_basic,
                ]);

            }

            DB::commit();
            return redirect()->route('fdNineOneForm.index')->with('success','Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function destroy($id){
        try{
            DB::beginTransaction();
            $admins = NVisa::find($id);
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


    public function show($id){
         $id =base64_decode($id);

         $nVisaEdit = NVisa::where('id',$id)
       ->with(['nVisaParticularOfSponsorOrEmployer','nVisaParticularsOfForeignIncumbnet','nVisaEmploymentInformation','nVisaWorkPlaceAddress','nVisaAuthorizedPersonalOfTheOrg','nVisaNecessaryDocumentForWorkPermit','nVisaManpowerOfTheOffice'])->first();

       $getCityzenshipData = Country::whereNotNull('country_people_english')
       ->whereNotNull('country_people_bangla')->orderBy('id','asc')->get();

        $countryList = Country::orderBy('id','asc')->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoStatus = NgoStatus::where('fd_one_form_id',$ngo_list_all->id)->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        $getAllNVisaId = Fd9OneForm::where('id',$nVisaEdit->fd9_one_form_id)->first();



        return view('front.nVisa.show',compact('ngoStatus','nVisaEdit','ngo_list_all','countryList','getCityzenshipData'));

    }


    public function fd9FormExtraPdfDownload($cat,$id){


        if($cat == 'academic'){

            $get_file_data = Fd9Form::where('id',base64_decode($id))->value('fd9_academic_qualification');
        }elseif($cat == 'technical'){

            $get_file_data = Fd9Form::where('id',base64_decode($id))->value('fd9_technical_and_other_qualifications_if_any');

        }elseif($cat == 'pastExperience'){

            $get_file_data = Fd9Form::where('id',base64_decode($id))->value('fd9_past_experience');

        }elseif($cat == 'offeredPost'){

            $get_file_data = Fd9Form::where('id',base64_decode($id))->value('fd9_offered_post');

        }elseif($cat == 'proposedProject'){

            $get_file_data = Fd9Form::where('id',base64_decode($id))->value('fd9_name_of_proposed_project');

        }elseif($cat == 'passportCopy'){

            $get_file_data = Fd9Form::where('id',base64_decode($id))->value('fd9_copy_of_passport');

        }elseif($cat == 'otherFile'){

            $get_file_data = Fd9Form::where('id',base64_decode($id))->value('fd9_other_information_file');

        }elseif($cat == 'offeredPostNiyog'){

            $get_file_data = Fd9Form::where('id',base64_decode($id))->value('fd9_offered_post_niyog');

        }




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



    public function nVisaDocumentDownload($cat,$id){

        if($cat == 'nomination'){

            $get_file_data = NVisaNecessaryDocumentForWorkPermit::where('id',$id)->value('nomination_letter_of_buyer');
        }elseif($cat == 'investment'){

            $get_file_data = NVisaNecessaryDocumentForWorkPermit::where('id',$id)->value('registration_letter_of_board_of_investment');

        }elseif($cat == 'contract'){

            $get_file_data = NVisaNecessaryDocumentForWorkPermit::where('id',$id)->value('employee_contract_copy');

        }elseif($cat == 'directors'){

            $get_file_data = NVisaNecessaryDocumentForWorkPermit::where('id',$id)->value('board_of_the_directors_sign_letter');

        }elseif($cat == 'shareHolder'){

            $get_file_data = NVisaNecessaryDocumentForWorkPermit::where('id',$id)->value('share_holder_copy');

        }elseif($cat == 'passportCopy'){

            $get_file_data = NVisaNecessaryDocumentForWorkPermit::where('id',$id)->value('passport_photocopy');

        }




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
