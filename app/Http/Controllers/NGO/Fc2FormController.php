<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use App\Models\Fc2Form;
use App\Models\Fd2FormForFc2Form;
use App\Models\Fd2Fc2OtherInfo;
class Fc2FormController extends Controller
{
    public function index(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();

        return view('front.fc2Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fc2FormList'));
    }


    public function create(){

        $prokolpoAreaList = ProkolpoArea::where('user_id',Auth::user()->id)
            ->where('type','fcTwo')
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

        return view('front.fc2Form.newAddForm',compact('thanaList','subdDistrictList','cityCorporationList','prokolpoAreaList','districtList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }




    public function edit($id){

        $fc2Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $fd2FormList = Fd2FormForFc2Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fc2_form_id',$fc2Id)->latest()->first();


        if(!$fd2FormList){
            $fd2OtherInfo = Fd2Fc2OtherInfo::where('fd2_form_for_fc2_form_id',0)
            ->latest()->get();
            $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',0)
        ->where('type','fc2')
        ->get();
        }else{
            $fd2OtherInfo = Fd2Fc2OtherInfo::where('fd2_form_for_fc2_form_id',$fd2FormList->id)
            ->latest()->get();
            $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
        ->where('type','fc2')
        ->get();
        }

       


        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fc2Id)->latest()->first();

        $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$fc2Id)
        ->where('type','fcTwo')
        ->latest()->get();

        

        $donationList = DonationReceiveDetail::where('fc1_form_id',$fc2Id)
        ->where('type','fcTwo')
        ->latest()->get();

        $fc2OtherFileList = Fc1FormOtherFile::where('fc1_form_id',$fc2Id)
        ->where('type','fcTwo')
        ->latest()->get();
        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fc2Id)
        ->where('type','fcTwo')
        ->latest()->get();
        $prokolpoAreaList =ProkolpoArea::where('formId',$fc2Id)
        ->where('type','fcTwo')->latest()->get();

        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

       return view('front.fc2Form.newedit',compact('thanaList','subdDistrictList','fc2OtherFileList','donationList','fd2AllFormLastYearDetail','SDGDevelopmentGoal','sectorWiseExpenditureList','prokolpoAreaList','fd2OtherInfo','fd2FormList','cityCorporationList','districtList','fc2FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function store(Request $request){



        // $request->validate([

        //     'person_full_name' => 'required|string',
        //     'person_father_name' => 'required|string',
        //     'person_mother_name' => 'required|string',
        //     'person_occupation' => 'required|string',
        //     'person_nid' => 'required|string',
        //     'person_tin' => 'required|string',
        //     'person_nationality' => 'required|string',
        //     'person_full_address' => 'required|string',
        //     'person_tele_phone_number' => 'required|string',
        //     'person_mobile' => 'required|string',
        //     'person_email' => 'required|string',
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
        //     'relation_with_donor' => 'required|string',
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
        try{
            DB::beginTransaction();

            $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
            $subject_all = implode(",",$request->subject_id);

            $fc2FormInfo = new Fc2Form();
            $fc2FormInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fc2FormInfo->fd_one_form_id =$fdOneFormID->id;
            $fc2FormInfo->person_full_name =$request->person_full_name;
            $fc2FormInfo->subject_id =$subject_all;
            $fc2FormInfo->person_father_name =$request->person_father_name;
            $fc2FormInfo->person_mother_name =$request->person_mother_name;
            $fc2FormInfo->person_occupation =$request->person_occupation;
            $fc2FormInfo->person_nid =$request->person_nid;
            $fc2FormInfo->person_full_address =$request->person_full_address;
            $fc2FormInfo->person_passport =$request->person_passport;
            $fc2FormInfo->person_tin =$request->person_tin;
            $fc2FormInfo->person_nationality =$request->person_nationality;
            $fc2FormInfo->person_tele_phone_number =$request->person_tele_phone_number;
            $fc2FormInfo->person_mobile =$request->person_mobile;
            $fc2FormInfo->person_email =$request->person_email;
            $fc2FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
            $fc2FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
            $fc2FormInfo->ngo_district =$request->ngo_district;
            $fc2FormInfo->ngo_sub_district =$request->ngo_sub_district;
            $fc2FormInfo->total_number_of_beneficiaries =$request->total_number_of_beneficiaries;
            $fc2FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
            $fc2FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
            $fc2FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
            $fc2FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;
            $fc2FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
            $fc2FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
            $fc2FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
            $fc2FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
            $fc2FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;
            $fc2FormInfo->organization_name =$request->organization_name;
            $fc2FormInfo->organization_address =$request->organization_address;
            $fc2FormInfo->organization_telephone_number =$request->organization_telephone_number;
            $fc2FormInfo->organization_email =$request->organization_email;
            $fc2FormInfo->organization_fax =$request->organization_fax;
            $fc2FormInfo->organization_website =$request->organization_website;
            $fc2FormInfo->organization_is_verified =$request->organization_is_verified;
            $fc2FormInfo->organization_ceo_name =$request->organization_ceo_name;
            $fc2FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
            $fc2FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
            $fc2FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
            $fc2FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
            $fc2FormInfo->relation_with_donor =$request->relation_with_donor;
            $fc2FormInfo->organization_letter_of_commitment =$request->organization_letter_of_commitment;
            $fc2FormInfo->organization_amount_of_foreign_currency =$request->organization_amount_of_foreign_currency;
            $fc2FormInfo->equivalent_amount_of_bd_taka =$request->equivalent_amount_of_bd_taka;
            $fc2FormInfo->commodities_value_in_bangladeshi_currency =$request->commodities_value_in_bangladeshi_currency;
            $fc2FormInfo->bank_name =$request->bank_name;
            $fc2FormInfo->bank_address =$request->bank_address;
            $fc2FormInfo->bank_account_name =$request->bank_account_name;
            $fc2FormInfo->bank_account_number =$request->bank_account_number;
            $fc2FormInfo->purpose_of_donation =$request->purpose_of_donation;
            $fc2FormInfo->bond_paper_available_or_not =$request->bond_paper_available_or_not;
            $fc2FormInfo->bond_paper_work_name =$request->bond_paper_work_name;
            $fc2FormInfo->bond_paper_amount =$request->bond_paper_amount;
            $fc2FormInfo->bond_paper_duration =$request->bond_paper_duration;
            $fc2FormInfo->status ='Review';

            $filePath="FcOneForm";

            if ($request->hasfile('purpose_of_donation_pdf')) {

                $file = $request->file('purpose_of_donation_pdf');

                $fc2FormInfo->purpose_of_donation_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('bond_paper_pdf')) {

                $file = $request->file('bond_paper_pdf');

                $fc2FormInfo->bond_paper_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('organization_name_of_the_job_amount_of_money_and_duration_pdf')) {

                $file = $request->file('organization_name_of_the_job_amount_of_money_and_duration_pdf');

                $fc2FormInfo->organization_name_of_the_job_amount_of_money_and_duration_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('verified_fc_two_form')) {

                $file = $request->file('verified_fc_two_form');

                $fc2FormInfo->verified_fc_two_form =CommonController::pdfUpload($request,$file,$filePath);

            }
            $fc2FormInfo->save();

            $fc2FormInfoId = $fc2FormInfo->id;

            $prokolpoDetail = new ProkolpoDetail();
            $prokolpoDetail->formId=$fc2FormInfoId;
            $prokolpoDetail->type='fc2';
            $prokolpoDetail->save();

            // ad new code strat


        $input = $request->all();

        ProkolpoArea::where('user_id',Auth::user()->id)
        ->where('upload_type',0)
        ->where('type','fcTwo')
   ->update([
       'upload_type' => 1,
       'formId' =>$fc2FormInfoId
    ]);

    // ad new code end

            DB::commit();
            return redirect()->route('fc2FormStepTwo',base64_encode($fc2FormInfoId))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }


    public function update(Request $request,$id){
        try{
            DB::beginTransaction();

            $subject_all = implode(",",$request->subject_id);

            $fc2FormInfo = Fc2Form::find($id);
            $fc2FormInfo->person_full_name =$request->person_full_name;
            $fc2FormInfo->subject_id =$subject_all;
            $fc2FormInfo->person_father_name =$request->person_father_name;
            $fc2FormInfo->person_mother_name =$request->person_mother_name;
            $fc2FormInfo->person_occupation =$request->person_occupation;
            $fc2FormInfo->person_nid =$request->person_nid;
            $fc2FormInfo->person_full_address =$request->person_full_address;
            $fc2FormInfo->person_passport =$request->person_passport;
            $fc2FormInfo->person_tin =$request->person_tin;
            $fc2FormInfo->person_nationality =$request->person_nationality;
            $fc2FormInfo->person_tele_phone_number =$request->person_tele_phone_number;
            $fc2FormInfo->person_mobile =$request->person_mobile;
            $fc2FormInfo->person_email =$request->person_email;
            $fc2FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
            $fc2FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
            $fc2FormInfo->ngo_district =$request->ngo_district;
            $fc2FormInfo->ngo_sub_district =$request->ngo_sub_district;
            $fc2FormInfo->total_number_of_beneficiaries =$request->total_number_of_beneficiaries;
            $fc2FormInfo->foreigner_donor_full_name =$request->foreigner_donor_full_name;
            $fc2FormInfo->foreigner_donor_occupation =$request->foreigner_donor_occupation;
            $fc2FormInfo->foreigner_donor_address =$request->foreigner_donor_address;
            $fc2FormInfo->foreigner_donor_telephone_number =$request->foreigner_donor_telephone_number;
            $fc2FormInfo->foreigner_donor_fax =$request->foreigner_donor_fax;
            $fc2FormInfo->foreigner_donor_email =$request->foreigner_donor_email;
            $fc2FormInfo->foreigner_donor_nationality =$request->foreigner_donor_nationality;
            $fc2FormInfo->foreigner_donor_is_verified =$request->foreigner_donor_is_verified;
            $fc2FormInfo->foreigner_donor_is_affiliatedrict =$request->foreigner_donor_is_affiliatedrict;
            $fc2FormInfo->organization_name =$request->organization_name;
            $fc2FormInfo->organization_address =$request->organization_address;
            $fc2FormInfo->organization_telephone_number =$request->organization_telephone_number;
            $fc2FormInfo->organization_email =$request->organization_email;
            $fc2FormInfo->organization_fax =$request->organization_fax;
            $fc2FormInfo->organization_website =$request->organization_website;
            $fc2FormInfo->organization_is_verified =$request->organization_is_verified;
            $fc2FormInfo->organization_ceo_name =$request->organization_ceo_name;
            $fc2FormInfo->organization_ceo_designation =$request->organization_ceo_designation;
            $fc2FormInfo->organization_name_of_executive_responsible_for_bd =$request->organization_name_of_executive_responsible_for_bd;
            $fc2FormInfo->organization_name_of_executive_responsible_for_bd_designation =$request->organization_name_of_executive_responsible_for_bd_designation;
            $fc2FormInfo->objectives_of_the_organization =$request->objectives_of_the_organization;
            $fc2FormInfo->relation_with_donor =$request->relation_with_donor;
            $fc2FormInfo->organization_letter_of_commitment =$request->organization_letter_of_commitment;
            $fc2FormInfo->organization_amount_of_foreign_currency =$request->organization_amount_of_foreign_currency;
            $fc2FormInfo->equivalent_amount_of_bd_taka =$request->equivalent_amount_of_bd_taka;
            $fc2FormInfo->commodities_value_in_bangladeshi_currency =$request->commodities_value_in_bangladeshi_currency;
            $fc2FormInfo->bank_name =$request->bank_name;
            $fc2FormInfo->bank_address =$request->bank_address;
            $fc2FormInfo->bank_account_name =$request->bank_account_name;
            $fc2FormInfo->bank_account_number =$request->bank_account_number;
            $fc2FormInfo->purpose_of_donation =$request->purpose_of_donation;
            $fc2FormInfo->bond_paper_available_or_not =$request->bond_paper_available_or_not;
            $fc2FormInfo->bond_paper_work_name =$request->bond_paper_work_name;
            $fc2FormInfo->bond_paper_amount =$request->bond_paper_amount;
            $fc2FormInfo->bond_paper_duration =$request->bond_paper_duration;

            $filePath="FcOneForm";
            if ($request->hasfile('purpose_of_donation_pdf')) {

                $file = $request->file('purpose_of_donation_pdf');

                $fc2FormInfo->purpose_of_donation_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('bond_paper_pdf')) {

                $file = $request->file('bond_paper_pdf');

                $fc2FormInfo->bond_paper_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }
            if ($request->hasfile('organization_name_of_the_job_amount_of_money_and_duration_pdf')) {

                $file = $request->file('organization_name_of_the_job_amount_of_money_and_duration_pdf');

                $fc2FormInfo->organization_name_of_the_job_amount_of_money_and_duration_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('verified_fc_two_form')) {

                $file = $request->file('verified_fc_two_form');

                $fc2FormInfo->verified_fc_two_form =CommonController::pdfUpload($request,$file,$filePath);

            }

            $fc2FormInfo->save();

            $fc2FormInfoId = $fc2FormInfo->id;

            // ad new code strat


        $input = $request->all();

        ProkolpoArea::where('user_id',Auth::user()->id)
        ->where('upload_type',0)
        ->where('type','fcTwo')
   ->update([
       'upload_type' => 1,
       'formId' =>$fc2FormInfoId
    ]);

    // ad new code end

            DB::commit();
            return redirect()->route('fc2FormStepTwo',base64_encode($fc2FormInfoId))->with('success','Updated Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }



    public function finalFcTwoApplicationSubmit($id){


        $new_data_add = Fc2Form::find(base64_decode($id));
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
         $regDakData->dak_type = 'fcTwo';
         $regDakData->receive_from_ngo = 1;
         $regDakData->receive_status = 1;
         $regDakData->status = 1;
         $regDakData->nothi_jat_id = 0;
         $regDakData->nothi_jat_status = 0;
         $regDakData->sent_status =null;
         $regDakData->amPmValue = $amPmValueFinal;
         $regDakData->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
         $regDakData->save();

        return redirect('/fc2Form')->with('success','Submit To Ngo Sucessfully');


    }


    public function destroy($id){
        try{
            DB::beginTransaction();
            $admins = Fc2Form::find($id);
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

        $fc2Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $fd2FormList = Fd2FormForFc2Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fc2_form_id',$fc2Id)->latest()->first();
        $fd2OtherInfo = Fd2Fc2OtherInfo::where('fd2_form_for_fc2_form_id',$fd2FormList->id)
        ->latest()->get();
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fc2Id)->latest()->first();

        $fc1FormList = Fc1Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->first();



        $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$fc2Id)
        ->where('type','fcTwo')
        ->latest()->get();

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
        ->where('type','fc2')
        ->get();

        $donationList = DonationReceiveDetail::where('fc1_form_id',$fc2Id)
        ->where('type','fcTwo')
        ->latest()->get();

        $fc2OtherFileList = Fc1FormOtherFile::where('fc1_form_id',$fc2Id)
        ->where('type','fcTwo')
        ->latest()->get();
        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fc2Id)
        ->where('type','fcTwo')
        ->latest()->get();
        $prokolpoAreaList =ProkolpoArea::where('formId',$fc2Id)->where('type','fcTwo')->latest()->get();

       return view('front.fc2Form.newview',compact('fc2OtherFileList','donationList','fd2AllFormLastYearDetail','SDGDevelopmentGoal','sectorWiseExpenditureList','prokolpoAreaList','fd2OtherInfo','fd2FormList','cityCorporationList','districtList','fc2FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

   }


   public function fc2PdfDownload($id){

        $get_file_data = Fc2Form::where('id',$id)->value('organization_name_of_the_job_amount_of_money_and_duration_pdf');

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


   public function verifiedFcTwoForm($id){

    $get_file_data = Fc1Form::where('id',$id)->value('verified_fc_two_form');

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

   public function prokolpoAreaForFc2Update(Request $request){
    $form= ProkolpoArea::find($request->mainId);
    $form->type='fcTwo';
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
    ->where('type','fcTwo')
    ->where('upload_type',0)->get();
    }else{

        $prokolpoAreaList = ProkolpoArea::where('formId',$request->mainEditId)
        ->where('type','fcTwo')
        ->get();


    }

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
    $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
    $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
    ->groupBy('city_orporation')->select('city_orporation')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
    $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

    $data = view('front.fc2Form.prokolpoAreaForFc1',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
    return response()->json($data);

}

public function prokolpoAreaForFc2(Request $request){

    $form= new ProkolpoArea();

    if($request->mainEditId == 0){
        $form->user_id =Auth::user()->id;
    $form->upload_type =0;
        }else{
            $form->formId =$request->mainEditId;
            $form->user_id =Auth::user()->id;
            $form->upload_type =1;
        }
    $form->type='fcTwo';
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
    ->where('type','fcTwo')
    ->where('upload_type',0)->get();
    }else{

        $prokolpoAreaList = ProkolpoArea::where('formId',$request->mainEditId)
        ->where('type','fcTwo')
        ->get();


    }

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
    $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
    $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
    ->groupBy('city_orporation')->select('city_orporation')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
    $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

    $data = view('front.fc2Form.prokolpoAreaForFc1',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
    return response()->json($data);



}





public function prokolpoAreaForFc2Delete(Request $request){

    $admins = ProkolpoArea::find($request->id);
    if (!is_null($admins)) {
        $admins->delete();
    }

    if($request->mainEditId == 0){

        $prokolpoAreaList = ProkolpoArea::where('user_id',Auth::user()->id)
        ->where('type','fcTwo')
        ->where('upload_type',0)->get();
        }else{

            $prokolpoAreaList = ProkolpoArea::where('formId',$request->mainEditId)
            ->where('type','fcTwo')
            ->get();


        }

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
    $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
    $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
    ->groupBy('city_orporation')->select('city_orporation')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
    $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

    $data = view('front.fc2Form.prokolpoAreaForFc1',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
    return response()->json($data);


}


public function fc2FormStepTwo($id){


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

        $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)
            ->where('id',$fd6Id)->latest()->first();

        $prokolpoAreaList =ProkolpoArea::where('formId',$fd6Id)
        ->where('type','fcTwo')->latest()->get();

        $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$fd6Id)
        ->where('type','fcTwo')
        ->latest()->get();

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fd6Id)
        ->where('type','fcTwo')
        ->latest()->get();

        return view('front.fc2Form.newAddFormStepTwo',compact('SDGDevelopmentGoal','subdDistrictList','sectorWiseExpenditureList','fd6Id','prokolpoAreaList','cityCorporationList','districtList','fc2FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }


}

public function fc2FormStepTwoBudget(Request $request){



    $form= new SectorWiseExpenditure();
    $form->fc1_form_id=$request->fcOneId;
    $form->type='fcTwo';
    $form->work_area_district=$request->district_name;
    $form->work_area_sub_district=$request->upozila_name;
    $form->activities=$request->activities;
    $form->estimated_expenses=$request->estimated_expenses;
    $form->time_limit=$request->time_limit;
    $form->number_of_beneficiaries=$request->number_of_beneficiaries;
    $form->save();

    $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$request->fcOneId)
    ->where('type','fcTwo')
    ->latest()->get();
    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();

    $data = view('front.fc2Form.fc1FormStepTwoBudget',compact('divisionList','subdDistrictList','districtList','sectorWiseExpenditureList'))->render();
    return response()->json($data);


}

public function fc2FormStepTwoBudgetUpdate(Request $request){


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
    ->where('type','fcTwo')
    ->latest()->get();
    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $data = view('front.fc2Form.fc1FormStepTwoBudget',compact('divisionList','subdDistrictList','districtList','sectorWiseExpenditureList'))->render();
    return response()->json($data);


}


public function fc2FormStepTwoBudgetDelete(Request $request){

    $admins = SectorWiseExpenditure::find($request->id);
    if (!is_null($admins)) {
        $admins->delete();
    }

    $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$request->fcOneId)
    ->where('type','fcTwo')
    ->latest()->get();
    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();

    $data = view('front.fc2Form.fc1FormStepTwoBudget',compact('divisionList','subdDistrictList','districtList','sectorWiseExpenditureList'))->render();
    return response()->json($data);

}

public function fc2FormStepTwoSDG(Request $request){

    $form= new SDGDevelopmentGoal();
    $form->fc1_form_id=$request->fcOneId;
    $form->type='fcTwo';
    $form->goal=$request->goal;
    $form->target=$request->target;
    $form->budget_allocation=$request->budget_allocation;
    $form->rationality=$request->rationality;
    $form->comment=$request->comment;
    $form->save();

    $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fcOneId)
    ->where('type','fcTwo')
    ->latest()->get();

    $data = view('front.fc2Form.fc1FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
    return response()->json($data);
}

public function fc2FormStepTwoSDGUpdate(Request $request){

    $form= SDGDevelopmentGoal::find($request->mainId);
    $form->goal=$request->goal;
    $form->target=$request->target;
    $form->budget_allocation=$request->budget_allocation;
    $form->rationality=$request->rationality;
    $form->comment=$request->comment;
    $form->save();

    $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fcOneId)
    ->where('type','fcTwo')
    ->latest()->get();

    $data = view('front.fc2Form.fc1FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
    return response()->json($data);

}

public function fc2FormStepTwoSDGDelete(Request $request){


    $admins = SDGDevelopmentGoal::find($request->id);
    if (!is_null($admins)) {
        $admins->delete();
    }

    $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fcOneId)
    ->where('type','fcTwo')
    ->latest()->get();

    $data = view('front.fc2Form.fc1FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
    return response()->json($data);
}


public function goToNextPageFcTwoStepTwo(Request $request){


    $fc1_form_id=$request->fcOneId;

    $getUrl = url('fc2FormStepThree',base64_encode($fc1_form_id));

    return $getUrl;


}

public function fc2FormStepThree($id){

    try{
        $fc1Id = base64_decode($id);
        $donationList = DonationReceiveDetail::where('fc1_form_id',$fc1Id)
        ->where('type','fcTwo')
        ->latest()->get();
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fc2OtherFileList = Fc1FormOtherFile::where('fc1_form_id',$fc1Id)
        ->where('type','fcTwo')
        ->latest()->get();

        $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('id',$fc1Id)->latest()->first();


        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }


        return view('front.fc2Form.newAddFormStepThree',compact('fc2FormList','fc2OtherFileList','donationList','fc1Id','districtList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

}

public function fc2FormStepTwoDonorUpdate(Request $request){


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
    ->where('type','fcTwo')
    ->latest()->get();


    $data = view('front.fc2Form.fc1FormStepTwoDonor',compact('donationList'))->render();
    return response()->json($data);


}


public function fc2FormStepTwoDonor(Request $request){


    $form= new DonationReceiveDetail();
    $form->fc1_form_id=$request->fcOneId;
    $form->type='fcTwo';
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
    ->where('type','fcTwo')
    ->latest()->get();


    $data = view('front.fc2Form.fc1FormStepTwoDonor',compact('donationList'))->render();
    return response()->json($data);


}


public function fc2FormStepTwoDonorDelete(Request $request){


    $admins = DonationReceiveDetail::find($request->id);
    if (!is_null($admins)) {
        $admins->delete();
    }

    $donationList = DonationReceiveDetail::where('fc1_form_id',$request->fcOneId)
    ->where('type','fcTwo')
    ->latest()->get();


    $data = view('front.fc2Form.fc1FormStepTwoDonor',compact('donationList'))->render();
    return response()->json($data);
}


public function lastExtraUpdateFcTwo(Request $request){



    $fc1FormInfo =Fc2Form::find($request->fcOneId);
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
                $form->type='fcTwo';
                $form->file_title = $input['file_name'][$key];
                $file=$input['file'][$key];
                $filePath="FcOneForm";
                $form->file=CommonController::pdfUpload($request,$file,$filePath);
                $form->save();
            }
    }

    $fd2FormList = Fd2FormForFc2Form::where('fc2_form_id',$request->fcOneId)->latest()->first();

    if(!$fd2FormList){
    return redirect()->route('addFd2DetailForFc2',base64_encode($request->fcOneId))->with('success','Added Successfully');
    }else{

        return redirect()->route('editFd2DetailForFc2',base64_encode($request->fcOneId))->with('success','Added Successfully');
    }

}

public function fc2formextrapdf($title, $id){

    $get_file_data = Fc2Form::where('id',$id)->value($title);

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


   public function fd2pdfviewdfc2($id){

    $fd7Id = base64_decode($id);

   $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
   $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
   $fd2FormList = Fd2FormForFc2Form::where('fd_one_form_id',$ngo_list_all->id)->where('fc2_form_id',$fd7Id)->latest()->first();
   $fd2OtherInfo = Fd2Fc2OtherInfo::where('fd2_form_for_fc2_form_id',$fd2FormList->id)->latest()->get();
   $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
   $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
   $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
   $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
   $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
   $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd7Id)->latest()->first();

   $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
   ->where('type','fc2')
   ->get();

   $file_Name_Custome = 'fc_one_form';
   $data =view('front.fc2Form.fd2pdfviewdfc1',[
    'divisionList'=>$divisionList,
    'renewWebsiteName'=>$renewWebsiteName,
    'ngoDurationLastEx'=>$ngoDurationLastEx,
    'ngoDurationReg'=>$ngoDurationReg,
    'ngo_list_all'=>$ngo_list_all,
'fc2FormList'=>$fc2FormList,
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


public function fc2pdfview($id){


    $fc2Id = base64_decode($id);

    $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
    $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
    $fd2FormList = Fd2FormForFc2Form::where('fd_one_form_id',$ngo_list_all->id)->where('fc2_form_id',$fc2Id)->latest()->first();
    $fd2OtherInfo = Fd2Fc2OtherInfo::where('fd2_form_for_fc2_form_id',$fd2FormList->id)->latest()->get();
    $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
    $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
    $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
    $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
    $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
    $fc2FormList = Fc2Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fc2Id)->latest()->first();

    $sectorWiseExpenditureList = SectorWiseExpenditure::where('fc1_form_id',$fc2Id)
    ->where('type','fcTwo')
    ->latest()->get();

    $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
    ->where('type','fc2')
    ->get();

    $donationList = DonationReceiveDetail::where('fc1_form_id',$fc2Id)
    ->where('type','fcTwo')
    ->latest()->get();

    $fc2OtherFileList = Fc1FormOtherFile::where('fc1_form_id',$fc2Id)
    ->where('type','fcTwo')
    ->latest()->get();
    $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fc2Id)
    ->where('type','fcTwo')
    ->latest()->get();
    $prokolpoAreaList =ProkolpoArea::where('formId',$fc2Id)->where('type','fcTwo')->latest()->get();


   $file_Name_Custome = 'fc_two_form';
   $data =view('front.fc2Form.fc1pdfview',[
    'fc2OtherFileList'=>$fc2OtherFileList,
    'donationList'=>$donationList,
    'fd2AllFormLastYearDetail'=>$fd2AllFormLastYearDetail,
    'SDGDevelopmentGoal'=>$SDGDevelopmentGoal,
    'sectorWiseExpenditureList'=>$sectorWiseExpenditureList,
'prokolpoAreaList'=>$prokolpoAreaList,
                   'fd2OtherInfo'=>$fd2OtherInfo,
                   'fd2FormList'=>$fd2FormList,
                   'cityCorporationList'=>$cityCorporationList,
                   'districtList'=>$districtList,
                   'fc2FormList'=>$fc2FormList,
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

}
