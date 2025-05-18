<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NVisa;
use App\Models\SectorWiseExpenditure;
use App\Models\SDGDevelopmentGoal;
use App\Models\DonationReceiveDetail;
use App\Models\Fd2AllFormLastYearDetail;
use App\Models\Fc1FormOtherFile;
use App\Models\NgoStatus;
use App\Models\Country;
use Mpdf\Mpdf;
use App\Models\NgoDuration;
use App\Models\ProkolpoDetail;
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
use App\Models\Fc1Form;
use App\Models\NgoRenewInfo;
use App\Models\Fd2FormForFc1Form;
use App\Models\Fd2Fc1OtherInfo;
use App\Models\ProkolpoArea;
use Illuminate\Support\Facades\App;
class Fc1FormController extends Controller
{
    public function index(){

        try{

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
        return view('front.fc1Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fc1FormList'));
    }


    public function create(){

        try{
            $prokolpoAreaList = ProkolpoArea::where('user_id',Auth::user()->id)
            ->where('type','fcOne')
            ->where('upload_type',0)->get();

            $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
            ->groupBy('city_orporation')->select('city_orporation')->get();
            $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
            $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();



        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }


        return view('front.fc1Form.newAddForm',compact('thanaList','subdDistrictList','cityCorporationList','prokolpoAreaList','districtList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }

    public function fc1FormStepTwo($id){


        try{

            $fd6Id = base64_decode($id);

            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
            $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');

            $divisionList = DB::table('civilinfos')->groupBy('division_bn')
                ->select('division_bn')->get();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
                ->select('district_bn')->get();

            $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')
                ->select('city_orporation')->get();

                $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
                ->select('thana_bn')->get();

            $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)
                ->where('id',$fd6Id)->latest()->first();

            $prokolpoAreaList =ProkolpoArea::where('formId',$fd6Id)
            ->where('type','fcOne')->latest()->get();

            $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$fd6Id)
            ->where('type','fcOne')
            ->latest()->get();

            $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fd6Id)
            ->where('type','fcOne')
            ->latest()->get();

            return view('front.fc1Form.newAddFormStepTwo',compact('SDGDevelopmentGoal','subdDistrictList','sectorWiseExpenditureList','fd6Id','prokolpoAreaList','cityCorporationList','districtList','fc1FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

            } catch (\Exception $e) {

                return redirect()->route('error_404');
            }


    }


    public function fc1FormStepThree($id){

        try{
            $fc1Id = base64_decode($id);
            $donationList = DonationReceiveDetail::where('fc1_form_id',$fc1Id)
            ->where('type','fcOne')
            ->latest()->get();
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $fc1OtherFileList = Fc1FormOtherFile::where('fc1_form_id',$fc1Id)
            ->where('type','fcOne')
            ->latest()->get();

            $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)
            ->where('id',$fc1Id)->latest()->first();


            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
            $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
            $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();

            } catch (\Exception $e) {

                return redirect()->route('error_404');
            }


            return view('front.fc1Form.newAddFormStepThree',compact('fc1FormList','fc1OtherFileList','donationList','fc1Id','districtList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }




    public function edit($id){

        try{

        $fd6Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
            ->select('division_bn')->get();

        $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')
            ->select('city_orporation')->get();

        $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)
            ->where('id',$fd6Id)->latest()->first();

        $prokolpoAreaList =ProkolpoArea::where('formId',$fd6Id)
        ->where('type','fcOne')->latest()->get();




            $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
            $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        return view('front.fc1Form.edit',compact('thanaList','subdDistrictList','prokolpoAreaList','cityCorporationList','districtList','fc1FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }



    public function lastExtraUpdate(Request $request){



        $fc1FormInfo =Fc1Form::find($request->fcOneId);
        $fc1FormInfo->chief_name = $request->chief_name;
        $fc1FormInfo->chief_desi = $request->chief_desi;

        $filePath="FcOneForm";

        if (!empty($request->image_base64)) {

            $filePath="ngoHead";
            $file = $request->file('digital_signature');
            $fc1FormInfo->digital_signature =CommonController::storeBase64($request->image_base64);

            }


        if (!empty($request->image_seal_base64)) {

            $filePath="ngoHead";
            $file = $request->file('digital_seal');
            $fc1FormInfo->digital_seal =CommonController::storeBase64($request->image_seal_base64);

            }

        if ($request->hasfile('donor_commitment_letter')) {

            $file = $request->file('donor_commitment_letter');

            $fc1FormInfo->donor_commitment_letter =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('donor_agency_commitment_letter')) {

            $file = $request->file('donor_agency_commitment_letter');

            $fc1FormInfo->donor_agency_commitment_letter =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('previous_audit_report')) {

            $file = $request->file('previous_audit_report');

            $fc1FormInfo->previous_audit_report =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('last_final_report')) {

            $file = $request->file('last_final_report');

            $fc1FormInfo->last_final_report =CommonController::pdfUpload($request,$file,$filePath);

        }


        if ($request->hasfile('administrative_certificate')) {

            $file = $request->file('administrative_certificate');

            $fc1FormInfo->administrative_certificate =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fc1FormInfo->save();


        $input = $request->all();


        // new code start
        if (array_key_exists("file_name", $input) && array_key_exists("file", $input)){

            $otherFileList = $input['file_name'];
            foreach($otherFileList as $key => $otherFileLists){

                    $form= new Fc1FormOtherFile();
                    $form->fc1_form_id = $request->fcOneId;
                    $form->type='fcOne';
                    $form->file_title = $input['file_name'][$key];
                    $file=$input['file'][$key];
                    $filePath="FcOneForm";
                    $form->file=CommonController::pdfUpload($request,$file,$filePath);
                    $form->save();
                }
        }

        $fd2FormList = Fd2FormForFc1Form::where('fc1_form_id',$request->fcOneId)->latest()->first();

        if(!$fd2FormList){
        return redirect()->route('addFd2DetailForFc1',base64_encode($request->fcOneId))->with('success','Added Successfully');
        }else{

            return redirect()->route('editFd2DetailForFc1',base64_encode($request->fcOneId))->with('success','Added Successfully');
        }
    
    }





    public function store(Request $request){

        // $request->validate([

        //     'ngo_name' => 'required|string',
        //     'ngo_address' => 'required|string',
        //     'ngo_telephone_number' => 'required|string',
        //     'ngo_mobile_number' => 'required|string',
        //     'ngo_email' => 'required|string',
        //     'ngo_website' => 'required|string',
        //     'ngo_prokolpo_start_date' => 'required|string',
        //     'ngo_prokolpo_end_date' => 'required|string',
        //     'foreigner_donor_full_name' => 'required|string',
        //     'foreigner_donor_occupation' => 'required|string',
        //     'foreigner_donor_address' => 'required|string',
        //     'foreigner_donor_telephone_number' => 'required|string',
        //     'foreigner_donor_fax' => 'required|string',
        //     'foreigner_donor_email' => 'required|string',
        //     'foreigner_donor_nationality' => 'required|string',
        //     'foreigner_donor_is_verified' => 'required|string',
        //     'foreigner_donor_is_affiliatedrict' => 'required|string',
        //     'organization_name' => 'required|string',
        //     'organization_address' => 'required|string',
        //     'organization_telephone_number' => 'required|string',
        //     'organization_email' => 'required|string',
        //     'organization_fax' => 'required|string',
        //     'organization_website' => 'required|string',
        //     'organization_is_verified' => 'required|string',
        //     'organization_ceo_name' => 'required|string',
        //     'organization_ceo_designation' => 'required|string',
        //     'organization_name_of_executive_responsible_for_bd' => 'required|string',
        //     'organization_name_of_executive_responsible_for_bd_designation' => 'required|string',
        //     'objectives_of_the_organization' => 'required|string',
        //     'organization_letter_of_commitment' => 'required|string',
        //     'organization_name_of_the_job_amount_of_money_and_duration_pdf' => 'required|file',
        //     'organization_amount_of_foreign_currency' => 'required|string',
        //     'equivalent_amount_of_bd_taka' => 'required|string',
        //     'commodities_value_in_bangladeshi_currency' => 'required|string',
        //     'bank_name' => 'required|string',
        //     'bank_address' => 'required|string',
        //     'bank_account_name' => 'required|string',
        //     'bank_account_number' => 'required|string',

        // ]);

        //dd($request->all());

        try{

            DB::beginTransaction();

        $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();

        $subject_all = implode(",",$request->subject_id);

        $fc1FormInfo = new Fc1Form();
        $fc1FormInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
        $fc1FormInfo->fd_one_form_id =$fdOneFormID->id;
        $fc1FormInfo->ngo_name =$request->ngo_name;
        $fc1FormInfo->subject_id =$subject_all;
        $fc1FormInfo->ngo_address =$request->ngo_address;
        $fc1FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
        $fc1FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
        $fc1FormInfo->ngo_email =$request->ngo_email;
        $fc1FormInfo->ngo_website =$request->ngo_website;
        $fc1FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fc1FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
        $fc1FormInfo->ngo_district =$request->ngo_district;
        $fc1FormInfo->ngo_sub_district =$request->ngo_sub_district;
        $fc1FormInfo->total_number_of_beneficiaries =$request->total_number_of_beneficiaries;
        $fc1FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
        $fc1FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
        $fc1FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
        $fc1FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;
        $fc1FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
        $fc1FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
        $fc1FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
        $fc1FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
        $fc1FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;
        $fc1FormInfo->organization_name =$request->organization_name;
        $fc1FormInfo->organization_address =$request->organization_address;
        $fc1FormInfo->organization_telephone_number =$request->organization_telephone_number;
        $fc1FormInfo->organization_email =$request->organization_email;
        $fc1FormInfo->organization_fax =$request->organization_fax;
        $fc1FormInfo->organization_website =$request->organization_website;
        $fc1FormInfo->organization_is_verified =$request->organization_is_verified;
        $fc1FormInfo->organization_ceo_name =$request->organization_ceo_name;
        $fc1FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
        $fc1FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
        $fc1FormInfo->relation_with_donor =$request->relation_with_donor;
        $fc1FormInfo->organization_letter_of_commitment =$request->organization_letter_of_commitment;
        $fc1FormInfo->organization_amount_of_foreign_currency =$request->organization_amount_of_foreign_currency;
        $fc1FormInfo->equivalent_amount_of_bd_taka =$request->equivalent_amount_of_bd_taka;
        $fc1FormInfo->commodities_value_in_bangladeshi_currency =$request->commodities_value_in_bangladeshi_currency;
        $fc1FormInfo->bank_name =$request->bank_name;
        $fc1FormInfo->bank_address =$request->bank_address;
        $fc1FormInfo->bank_account_name =$request->bank_account_name;
        $fc1FormInfo->bank_account_number =$request->bank_account_number;
        $fc1FormInfo->purpose_of_donation =$request->purpose_of_donation;
        $fc1FormInfo->bond_paper_available_or_not =$request->bond_paper_available_or_not;
        $fc1FormInfo->bond_paper_work_name =$request->bond_paper_work_name;
        $fc1FormInfo->bond_paper_amount =$request->bond_paper_amount;
        $fc1FormInfo->bond_paper_duration =$request->bond_paper_duration;
        $fc1FormInfo->status ='Review';

        $filePath="FcOneForm";

        if ($request->hasfile('purpose_of_donation_pdf')) {

            $file = $request->file('purpose_of_donation_pdf');

            $fc1FormInfo->purpose_of_donation_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('bond_paper_pdf')) {

            $file = $request->file('bond_paper_pdf');

            $fc1FormInfo->bond_paper_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('verified_fc_one_form')) {

            $file = $request->file('verified_fc_one_form');

            $fc1FormInfo->verified_fc_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('organization_name_of_the_job_amount_of_money_and_duration_pdf')) {

            $file = $request->file('organization_name_of_the_job_amount_of_money_and_duration_pdf');

            $fc1FormInfo->organization_name_of_the_job_amount_of_money_and_duration_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }


        if ($request->hasfile('verified_fc_one_form')) {

            $file = $request->file('verified_fc_one_form');

            $fc1FormInfo->verified_fc_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fc1FormInfo->save();
        $fc1FormInfoId = $fc1FormInfo->id;


            $prokolpoDetail = new ProkolpoDetail();
            $prokolpoDetail->formId=$fc1FormInfoId;
            $prokolpoDetail->type='fc1';
            $prokolpoDetail->save();


        $input = $request->all();

        ProkolpoArea::where('user_id',Auth::user()->id)
            ->where('upload_type',0)
            ->where('type','fcOne')
       ->update([
           'upload_type' => 1,
           'formId' =>$fc1FormInfoId
        ]);
        DB::commit();
        return redirect()->route('fc1FormStepTwo',base64_encode($fc1FormInfoId))->with('success','Added Successfuly');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function goToNextPageFcOneStepTwo(Request $request){


        $fc1_form_id=$request->fcOneId;

        $getUrl = url('fc1FormStepThree',base64_encode($fc1_form_id));

        return $getUrl;


    }


    public function fc1FormStepTwoDonorUpdate(Request $request){


        $form= DonationReceiveDetail::find($request->mainId);
        $form->fc1_form_id=$request->fcOneId;
        $form->purpose_or_activities=$request->purpose_or_activities;
        $form->registration_sarok_number=$request->registration_sarok_number;
        $form->registration_date=$request->registration_date;
        $form->donor_name=$request->donor_name;
        $form->money_amount=$request->money_amount;
        $form->audit_report=$request->audit_report;
        $form->final_report=$request->final_report;
        $form->local_certificate=$request->local_certificate;
        $form->comment=$request->comment;
        $form->save();

        $donationList = DonationReceiveDetail::where('fc1_form_id',$request->fcOneId)
        ->where('type','fcOne')
        ->latest()->get();


        $data = view('front.fc1Form.fc1FormStepTwoDonor',compact('donationList'))->render();
        return response()->json($data);


    }

    public function fc1FormStepTwoDonor(Request $request){


        $form= new DonationReceiveDetail();
        $form->fc1_form_id=$request->fcOneId;
        $form->type='fcOne';
        $form->purpose_or_activities=$request->purpose_or_activities;
        $form->registration_sarok_number=$request->registration_sarok_number;
        $form->registration_date=$request->registration_date;
        $form->donor_name=$request->donor_name;
        $form->money_amount=$request->money_amount;
        $form->audit_report=$request->audit_report;
        $form->final_report=$request->final_report;
        $form->local_certificate=$request->local_certificate;
        $form->comment=$request->comment;
        $form->save();

        $donationList = DonationReceiveDetail::where('fc1_form_id',$request->fcOneId)
        ->where('type','fcOne')
        ->latest()->get();


        $data = view('front.fc1Form.fc1FormStepTwoDonor',compact('donationList'))->render();
        return response()->json($data);


    }


    public function fc1FormStepTwoDonorDelete(Request $request){


        $admins = DonationReceiveDetail::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $donationList = DonationReceiveDetail::where('fc1_form_id',$request->fcOneId)
        ->where('type','fcOne')
        ->latest()->get();


        $data = view('front.fc1Form.fc1FormStepTwoDonor',compact('donationList'))->render();
        return response()->json($data);
    }



    public function fc1FormStepTwoBudgetUpdate(Request $request){


        $form= SectorWiseExpenditure::find($request->mainId);
        $form->work_area_district=$request->district_name;
        $form->work_area_sub_district=$request->upozila_name;
        $form->activities=$request->activities;
        $form->estimated_expenses=$request->estimated_expenses;
        $form->time_limit=$request->time_limit;
        $form->number_of_beneficiaries=$request->number_of_beneficiaries;
        $form->save();

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
        ->select('division_bn')->get();

        $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$request->fcOneId)
        ->where('type','fcOne')
        ->latest()->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')
        ->select('district_bn')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
        ->select('thana_bn')->get();

        $data = view('front.fc1Form.fc1FormStepTwoBudget',compact('divisionList','subdDistrictList','districtList','sectorWiseExpenditureList'))->render();
        return response()->json($data);


    }


    public function fc1FormStepTwoBudgetDelete(Request $request){

        $admins = SectorWiseExpenditure::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$request->fcOneId)
        ->where('type','fcOne')
        ->latest()->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')
        ->select('district_bn')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
        ->select('thana_bn')->get();

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
        ->select('division_bn')->get();

        $data = view('front.fc1Form.fc1FormStepTwoBudget',compact('divisionList','subdDistrictList','districtList','sectorWiseExpenditureList'))->render();
        return response()->json($data);

    }

    public function fc1FormStepTwoSDG(Request $request){

        $form= new SDGDevelopmentGoal();
        $form->fc1_form_id=$request->fcOneId;
        $form->type='fcOne';
        $form->goal=$request->goal;
        $form->target=$request->target;
        $form->budget_allocation=$request->budget_allocation;
        $form->rationality=$request->rationality;
        $form->comment=$request->comment;
        $form->save();

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fcOneId)
        ->where('type','fcOne')
        ->latest()->get();

        $data = view('front.fc1Form.fc1FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
        return response()->json($data);
    }

    public function fc1FormStepTwoSDGUpdate(Request $request){

        $form= SDGDevelopmentGoal::find($request->mainId);
        $form->goal=$request->goal;
        $form->target=$request->target;
        $form->budget_allocation=$request->budget_allocation;
        $form->rationality=$request->rationality;
        $form->comment=$request->comment;
        $form->save();

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fcOneId)
        ->where('type','fcOne')
        ->latest()->get();

        $data = view('front.fc1Form.fc1FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
        return response()->json($data);

    }

    public function fc1FormStepTwoSDGDelete(Request $request){


        $admins = SDGDevelopmentGoal::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fcOneId)
        ->where('type','fcOne')
        ->latest()->get();

        $data = view('front.fc1Form.fc1FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
        return response()->json($data);
    }

    public function fc1FormStepTwoBudget(Request $request){



        $form= new SectorWiseExpenditure();
        $form->fc1_form_id=$request->fcOneId;
        $form->type='fcOne';
        $form->work_area_district=$request->district_name;
        $form->work_area_sub_district=$request->upozila_name;
        $form->activities=$request->activities;
        $form->estimated_expenses=$request->estimated_expenses;
        $form->time_limit=$request->time_limit;
        $form->number_of_beneficiaries=$request->number_of_beneficiaries;
        $form->save();

        $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$request->fcOneId)
        ->where('type','fcOne')
        ->latest()->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')
        ->select('district_bn')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
        ->select('thana_bn')->get();

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
        ->select('division_bn')->get();

        $data = view('front.fc1Form.fc1FormStepTwoBudget',compact('divisionList','subdDistrictList','districtList','sectorWiseExpenditureList'))->render();
        return response()->json($data);


    }

    public function prokolpoAreaForFc1Update(Request $request){
        $form= ProkolpoArea::find($request->mainId);
        $form->type='fcOne';
        $form->division_name=$request->division_name;
        $form->district_name=$request->district_name;
        $form->city_corparation_name=$request->city_corparation_name;
        $form->upozila_name=$request->upozila_name;
        $form->thana_name=$request->thana_name;
        $form->municipality_name=$request->municipality_name;
        $form->ward_name=$request->ward_name;
        $form->number_of_beneficiaries=$request->beneficiaries_total;
        $form->prokolpo_type=$request->prokolpoType;
        $form->allocated_budget=$request->allocated_budget;
        $form->save();

        if($request->mainEditId == 0){

        $prokolpoAreaList = ProkolpoArea::where('user_id',Auth::user()->id)
        ->where('type','fcOne')
        ->where('upload_type',0)->get();
        }else{

            $prokolpoAreaList = ProkolpoArea::where('formId',$request->mainEditId)
            ->where('type','fcOne')
            ->get();


        }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fc1Form.prokolpoAreaForFc1',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);

    }

    public function prokolpoAreaForFc1(Request $request){




        $form= new ProkolpoArea();

        if($request->mainEditId == 0){
            $form->user_id =Auth::user()->id;
        $form->upload_type =0;
            }else{
                $form->formId =$request->mainEditId;
                $form->user_id =Auth::user()->id;
                $form->upload_type =1;
            }
        $form->type='fcOne';
        $form->division_name=$request->division_name;
        $form->district_name=$request->district_name;
        $form->city_corparation_name=$request->city_corparation_name;
        $form->upozila_name=$request->upozila_name;
        $form->thana_name=$request->thana_name;
        $form->municipality_name=$request->municipality_name;
        $form->ward_name=$request->ward_name;
        $form->number_of_beneficiaries=$request->beneficiaries_total;
        $form->prokolpo_type=$request->prokolpoType;
        $form->allocated_budget=$request->allocated_budget;
        $form->save();

        if($request->mainEditId == 0){

        $prokolpoAreaList = ProkolpoArea::where('user_id',Auth::user()->id)
        ->where('type','fcOne')
        ->where('upload_type',0)->get();
        }else{

            $prokolpoAreaList = ProkolpoArea::where('formId',$request->mainEditId)
            ->where('type','fcOne')
            ->get();


        }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fc1Form.prokolpoAreaForFc1',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);



    }





    public function prokolpoAreaForFc1Delete(Request $request){

        $admins = ProkolpoArea::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        if($request->mainEditId == 0){

            $prokolpoAreaList = ProkolpoArea::where('user_id',Auth::user()->id)
            ->where('type','fcOne')
            ->where('upload_type',0)->get();
            }else{

                $prokolpoAreaList = ProkolpoArea::where('formId',$request->mainEditId)
                ->where('type','fcOne')
                ->get();


            }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fc1Form.prokolpoAreaForFc1',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);


    }





    public function update(Request $request,$id){

        try{
            DB::beginTransaction();

            $subject_all = implode(",",$request->subject_id);

        $fc1FormInfo = Fc1Form::find($id);
        $fc1FormInfo->ngo_name =$request->ngo_name;
        $fc1FormInfo->subject_id =$subject_all;
        $fc1FormInfo->ngo_address =$request->ngo_address;
        $fc1FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
        $fc1FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
        $fc1FormInfo->ngo_email =$request->ngo_email;
        $fc1FormInfo->ngo_website =$request->ngo_website;
        $fc1FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
        $fc1FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
        $fc1FormInfo->ngo_district =$request->ngo_district;
        $fc1FormInfo->ngo_sub_district =$request->ngo_sub_district;
        $fc1FormInfo->total_number_of_beneficiaries =$request->total_number_of_beneficiaries;
        $fc1FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
        $fc1FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
        $fc1FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
        $fc1FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;
        $fc1FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
        $fc1FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
        $fc1FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
        $fc1FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
        $fc1FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;
        $fc1FormInfo->organization_name =$request->organization_name;
        $fc1FormInfo->organization_address =$request->organization_address;
        $fc1FormInfo->organization_telephone_number =$request->organization_telephone_number;
        $fc1FormInfo->organization_email =$request->organization_email;
        $fc1FormInfo->organization_fax =$request->organization_fax;
        $fc1FormInfo->organization_website =$request->organization_website;
        $fc1FormInfo->organization_is_verified =$request->organization_is_verified;
        $fc1FormInfo->organization_ceo_name =$request->organization_ceo_name;
        $fc1FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
        $fc1FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
        $fc1FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
        $fc1FormInfo->relation_with_donor =$request->relation_with_donor;
        $fc1FormInfo->organization_letter_of_commitment =$request->organization_letter_of_commitment;
        $fc1FormInfo->organization_amount_of_foreign_currency =$request->organization_amount_of_foreign_currency;
        $fc1FormInfo->equivalent_amount_of_bd_taka =$request->equivalent_amount_of_bd_taka;
        $fc1FormInfo->commodities_value_in_bangladeshi_currency =$request->commodities_value_in_bangladeshi_currency;
        $fc1FormInfo->bank_name =$request->bank_name;
        $fc1FormInfo->bank_address =$request->bank_address;
        $fc1FormInfo->bank_account_name =$request->bank_account_name;
        $fc1FormInfo->bank_account_number =$request->bank_account_number;
        $fc1FormInfo->purpose_of_donation =$request->purpose_of_donation;
        $fc1FormInfo->bond_paper_available_or_not =$request->bond_paper_available_or_not;
        $fc1FormInfo->bond_paper_work_name =$request->bond_paper_work_name;
        $fc1FormInfo->bond_paper_amount =$request->bond_paper_amount;
        $fc1FormInfo->bond_paper_duration =$request->bond_paper_duration;


        $filePath="FcOneForm";

        if ($request->hasfile('purpose_of_donation_pdf')) {

            $file = $request->file('purpose_of_donation_pdf');

            $fc1FormInfo->purpose_of_donation_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('bond_paper_pdf')) {

            $file = $request->file('bond_paper_pdf');

            $fc1FormInfo->bond_paper_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('verified_fc_one_form')) {

            $file = $request->file('verified_fc_one_form');

            $fc1FormInfo->verified_fc_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('organization_name_of_the_job_amount_of_money_and_duration_pdf')) {

            $file = $request->file('organization_name_of_the_job_amount_of_money_and_duration_pdf');

            $fc1FormInfo->organization_name_of_the_job_amount_of_money_and_duration_pdf =CommonController::pdfUpload($request,$file,$filePath);

        }


        if ($request->hasfile('verified_fc_one_form')) {

            $file = $request->file('verified_fc_one_form');

            $fc1FormInfo->verified_fc_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fc1FormInfo->save();

        $fc1FormInfoId = $fc1FormInfo->id;

        $input = $request->all();


        ProkolpoArea::where('user_id',Auth::user()->id)
        ->where('upload_type',0)
        ->where('type','fcOne')
   ->update([
       'upload_type' => 1,
       'formId' =>$fc1FormInfoId
    ]);




        DB::commit();
        return redirect()->route('fc1FormStepTwo',base64_encode($fc1FormInfoId))->with('success','Updated Successfuly');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function destroy($id){
        try{
            DB::beginTransaction();
        $admins = Fc1Form::find($id);
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


    public function finalFcOneApplicationSubmit($id){


        $new_data_add = Fc1Form::find(base64_decode($id));
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
         $regDakData->dak_type = 'fcOne';
         $regDakData->receive_from_ngo = 1;
         $regDakData->receive_status = 1;
         $regDakData->status = 1;
         $regDakData->nothi_jat_id = 0;
         $regDakData->nothi_jat_status = 0;
         $regDakData->sent_status =null;
         $regDakData->amPmValue = $amPmValueFinal;
         $regDakData->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
         $regDakData->save();

        return redirect('/fc1Form')->with('success','Submit To Ngo Sucessfully');


    }




    public function show($id){

        $fc1Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $fd2FormList = Fd2FormForFc1Form::where('fd_one_form_id',$ngo_list_all->id)->where('fc1_form_id',$fc1Id)->latest()->first();
        $fd2OtherInfo = Fd2Fc1OtherInfo::where('fd2_form_for_fc1_form_id',$fd2FormList->id)->latest()->get();
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fc1Id)->latest()->first();

        $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$fc1Id)
        ->where('type','fcOne')
        ->latest()->get();

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
        ->where('type','fc1')
        ->get();

        $donationList = DonationReceiveDetail::where('fc1_form_id',$fc1Id)
        ->where('type','fcOne')
        ->latest()->get();

        $fc1OtherFileList = Fc1FormOtherFile::where('fc1_form_id',$fc1Id)
        ->where('type','fcOne')
        ->latest()->get();
        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fc1Id)
        ->where('type','fcOne')
        ->latest()->get();
        $prokolpoAreaList =ProkolpoArea::where('formId',$fc1Id)->where('type','fcOne')->latest()->get();

       return view('front.fc1Form.newview',compact('fc1OtherFileList','donationList','fd2AllFormLastYearDetail','SDGDevelopmentGoal','sectorWiseExpenditureList','prokolpoAreaList','fd2OtherInfo','fd2FormList','cityCorporationList','districtList','fc1FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

   }


   public function fc1PdfDownload($id){


    $get_file_data = Fc1Form::where('id',$id)->value('organization_name_of_the_job_amount_of_money_and_duration_pdf');

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


   public function verifiedFcOneForm($id){

    $get_file_data = Fc1Form::where('id',$id)->value('verified_fc_one_form');

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

   public function fcOneOtherPdfList(Request $request){

    $fd2OtherPdf = Fc1FormOtherFile::where('id',$request->main_id)->first();

    $data = view('front.fc1Form.fcOneOtherPdfList',compact('fd2OtherPdf'))->render();
    return response()->json($data);


   }

   public function fcOneOtherPdfListUpdate(Request $request){

    try{
        DB::beginTransaction();

        $fd2FormInfo =Fc1FormOtherFile::find($request->mid);
        if ($request->hasfile('file')) {

            $filePath="FcOneForm";
            $file = $request->file('file');
            $fd2FormInfo->file =CommonController::pdfUpload($request,$file,$filePath);

        }
        $fd2FormInfo->save();

        DB::commit();
        return redirect()->back()->with('success','Added Successfuly');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_404');
    }

   }


   public function fcOneOtherPdfListdownload($id){

    $get_file_data = Fc1FormOtherFile::where('id',$id)->value('file');

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

   public function fcOneOtherPdfListdelete($id){

    try{
        DB::beginTransaction();

        $admins = Fc1FormOtherFile::find($id);
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


   public function fc1pdfview($id){


    $fc1Id = base64_decode($id);

    $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
    $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
    $fd2FormList = Fd2FormForFc1Form::where('fd_one_form_id',$ngo_list_all->id)->where('fc1_form_id',$fc1Id)->latest()->first();
    $fd2OtherInfo = Fd2Fc1OtherInfo::where('fd2_form_for_fc1_form_id',$fd2FormList->id)->latest()->get();
    $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
    $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
    $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
    $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
    $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
    $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fc1Id)->latest()->first();

    $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$fc1Id)
    ->where('type','fcOne')
    ->latest()->get();

    $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
    ->where('type','fc1')
    ->get();

    $donationList = DonationReceiveDetail::where('fc1_form_id',$fc1Id)
    ->where('type','fcOne')
    ->latest()->get();

    $fc1OtherFileList = Fc1FormOtherFile::where('fc1_form_id',$fc1Id)
    ->where('type','fcOne')
    ->latest()->get();
    $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fc1Id)
    ->where('type','fcOne')
    ->latest()->get();
    $prokolpoAreaList =ProkolpoArea::where('formId',$fc1Id)->where('type','fcOne')->latest()->get();


   $file_Name_Custome = 'fc_one_form';
   $data =view('front.fc1Form.fc1pdfview',[
    'fc1OtherFileList'=>$fc1OtherFileList,
    'donationList'=>$donationList,
    'fd2AllFormLastYearDetail'=>$fd2AllFormLastYearDetail,
    'SDGDevelopmentGoal'=>$SDGDevelopmentGoal,
    'sectorWiseExpenditureList'=>$sectorWiseExpenditureList,
'prokolpoAreaList'=>$prokolpoAreaList,
                   'fd2OtherInfo'=>$fd2OtherInfo,
                   'fd2FormList'=>$fd2FormList,
                   'cityCorporationList'=>$cityCorporationList,
                   'districtList'=>$districtList,
                   'fc1FormList'=>$fc1FormList,
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


   public function fd2pdfviewdfc1($id){

        $fd7Id = base64_decode($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
       $fd2FormList = Fd2FormForFc1Form::where('fd_one_form_id',$ngo_list_all->id)->where('fc1_form_id',$fd7Id)->latest()->first();
       $fd2OtherInfo = Fd2Fc1OtherInfo::where('fd2_form_for_fc1_form_id',$fd2FormList->id)->latest()->get();
       $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
       $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
       $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
       $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
       $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd7Id)->latest()->first();

       $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
       ->where('type','fc1')
       ->get();

       $file_Name_Custome = 'fc_one_form';
       $data =view('front.fc1Form.fd2pdfviewdfc1',[
        'divisionList'=>$divisionList,
        'renewWebsiteName'=>$renewWebsiteName,
        'ngoDurationLastEx'=>$ngoDurationLastEx,
        'ngoDurationReg'=>$ngoDurationReg,
        'ngo_list_all'=>$ngo_list_all,
'fc1FormList'=>$fc1FormList,
                       'fd2AllFormLastYearDetail'=>$fd2AllFormLastYearDetail,

                       'fd2OtherInfo'=>$fd2OtherInfo,
                       'fd2FormList'=>$fd2FormList,
                       'cityCorporationList'=>$cityCorporationList,
                       'districtList'=>$districtList

                   ])->render();


       $pdfFilePath =$file_Name_Custome.'.pdf';


       $mpdf = new Mpdf([ 'default_font_size' => 14,'default_font' => 'nikosh']);
       $mpdf->WriteHTML($data);
       $mpdf->Output($pdfFilePath, "I");
       die();


   }


   public function fc1formextrapdf($title, $id){

    $get_file_data = Fc1Form::where('id',$id)->value($title);

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
