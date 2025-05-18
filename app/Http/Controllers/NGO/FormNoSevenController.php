<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use App\Models\FormNoSeven;
use App\Models\FormNoSevenStepTwo;
use App\Models\FormNoSevenStepThree;
use App\Models\FormNoSevenStepFour;
use App\Models\FormNoSevenFive;
use App\Models\FdOneForm;
class FormNoSevenController extends Controller
{
    public function index(){
        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $formNoSevenList = FormNoSeven::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();

            return view('front.formNoSeven.index',compact('ngo_list_all','formNoSevenList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function getDistrictListForFormSeven(Request $request){


        $districtList = $request->districtName;

        $upozilaList = DB::table('civilinfos')->where('district_bn',$districtList)
        ->whereNotNull('thana_bn')->groupBy('thana_bn')
            ->select('thana_bn')->get();

           // dd($upozilaList);

        $data = view('front.fd6Form.getUpozilaList',compact('upozilaList'))->render();
        return response()->json($data);


    }


    public function create(){

        try{

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            return view('front.formNoSeven.create',compact('ngo_list_all','districtList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function store(Request $request){

        //dd($request->all());


        // $request->validate([

        //     'district_address' => 'required|string',
        //     'upazila_address' => 'required|string',
        //     'ngo_name' => 'required|string',
        //     'ngo_address' => 'required|string',
        //     'ngo_head_name' => 'required|string',
        //     'ngo_head_organization' => 'required|string',
        //     'ngo_head_office_mobile' => 'required|string',
        //     'ngo_head_office_email' => 'required|string',
        //     'ngo_registration' => 'required|string',
        //     'ngo_registration_date' => 'required|string',
        //     'ngo_last_renewal_date' => 'required|string'


        // ]);


        //dd($request->all());

        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $formNoSeven = new FormNoSeven();
            $formNoSeven->status = 'Review';
            $formNoSeven->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $formNoSeven->sarok_number = $request->sarok_number;
            $formNoSeven->submit_date = $request->submit_date;
            $formNoSeven->ngo_name = $request->ngo_name;
            $formNoSeven->ngo_address = $request->ngo_address;
            $formNoSeven->ngo_name_address_comment = $request->ngo_name_address_comment;
            $formNoSeven->ngo_head_name = $request->ngo_head_name;
            $formNoSeven->ngo_head_organization = $request->ngo_head_organization;
            $formNoSeven->ngo_head_office_mobile =$request->ngo_head_office_mobile;
            $formNoSeven->ngo_head_office_email=$request->ngo_head_office_email;
            $formNoSeven->ngo_head_comment=$request->ngo_head_comment;
            $formNoSeven->ngo_registration=$request->ngo_registration;
            $formNoSeven->fd_one_form_id = $ngo_list_all->id;
            $formNoSeven->ngo_registration_date = $request->ngo_registration_date;
            $formNoSeven->ngo_last_renewal_date = $request->ngo_last_renewal_date;
            $formNoSeven->ngo_duration = $request->ngo_duration;
            $formNoSeven->ngo_reg_comment = $request->ngo_reg_comment;
            $formNoSeven->ngo_local_officer_name = $request->ngo_local_officer_name;
            $formNoSeven->ngo_local_officer_designation = $request->ngo_local_officer_designation;
            $formNoSeven->ngo_local_officer_mobile = $request->ngo_local_officer_mobile;
            $formNoSeven->ngo_local_officer_email = $request->ngo_local_officer_email;
            $formNoSeven->ngo_local_officer_comment = $request->ngo_local_officer_comment;
            $formNoSeven->prokolpo_name = $request->prokolpo_name;
            $formNoSeven->prokolpo_fund = $request->prokolpo_fund;
            $formNoSeven->prokolpo_comment = $request->prokolpo_comment;
            $formNoSeven->prokolpo_approval_date = $request->prokolpo_approval_date;
            $formNoSeven->prokolpo_sarok_number = $request->prokolpo_sarok_number;
            $formNoSeven->prokolpo_certificate_year_and_time = $request->prokolpo_certificate_year_and_time;
            $formNoSeven->prokolpo_approval_comment = $request->prokolpo_approval_comment;
            $formNoSeven->prokolpo_objecttive = $request->prokolpo_objecttive;

            $formNoSeven->prokolpo_objecttive_comment = $request->prokolpo_objecttive_comment;
            $formNoSeven->project_copy_approved_by_burea = $request->project_copy_approved_by_burea;
            $formNoSeven->project_copy_approved_by_burea_comment = $request->project_copy_approved_by_burea_comment;
            $formNoSeven->allocation_for_projects_in_district_or_upazila = $request->allocation_for_projects_in_district_or_upazila;
            $formNoSeven->this_year_under_discussion_multi_year_projects = $request->this_year_under_discussion_multi_year_projects;
            $formNoSeven->actual_expenditure_multi_year_projects = $request->actual_expenditure_multi_year_projects;
            $formNoSeven->direct_beneficiaries_quantity = $request->direct_beneficiaries_quantity;
            $formNoSeven->indirect_beneficiaries_quantity = $request->indirect_beneficiaries_quantity;
            $formNoSeven->jurisdiction_comment = $request->jurisdiction_comment;
            $formNoSeven->prokolpo_duration = $request->prokolpo_duration;
            $formNoSeven->project_inspected_time = $request->project_inspected_time;
            $formNoSeven->inspector_name = $request->inspector_name;
            $formNoSeven->inspector_designation = $request->inspector_designation;
            $formNoSeven->inspector_mobile = $request->inspector_mobile;
            $formNoSeven->inspector_email = $request->inspector_email;
            $formNoSeven->inspector_comment = $request->inspector_comment;
            $formNoSeven->beneficiaries_involved_with_local_administration = $request->beneficiaries_involved_with_local_administration;
            $formNoSeven->beneficiaries_involved_comment = $request->beneficiaries_involved_comment;
            $formNoSeven->regular_participation_in_meeting = $request->regular_participation_in_meeting;
            $formNoSeven->regular_participation_comment = $request->regular_participation_comment;
            $formNoSeven->conditions_properly_met = $request->conditions_properly_met;
            $formNoSeven->conditions_properly_comment = $request->conditions_properly_comment;
            $formNoSeven->mian_ngo_detail = $request->mian_ngo_detail;
            $formNoSeven->main_ngo_detail_comment = $request->main_ngo_detail_comment;
            $formNoSeven->main_ngo_name = $request->main_ngo_name;
            $formNoSeven->main_ngo_address = $request->main_ngo_address;
            $formNoSeven->main_ngo_comment = $request->main_ngo_comment;
            $formNoSeven->sign_in_closing_report = $request->sign_in_closing_report;
            $formNoSeven->sign_in_closing_report_comment = $request->sign_in_closing_report_comment;
            $formNoSeven->feedback_on_projects_implementedt = $request->feedback_on_projects_implementedt;
            $formNoSeven->recommendation_on_projects_implementedt = $request->recommendation_on_projects_implementedt;
            $formNoSeven->last_comment = $request->last_comment;

            $formNoSeven->district_address = $request->district_address;
            $formNoSeven->upazila_address = $request->upazila_address;
            $formNoSeven->onulipi = $request->onulipi;
            $formNoSeven->name_certifying_officer = $request->name_certifying_officer;
            $formNoSeven->designation_certifying_officer = $request->designation_certifying_officer;


            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $formNoSeven->signature_certifying_officer =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $formNoSeven->seal_certifying_officer =CommonController::storeBase64($request->image_seal_base64);

                }



            $formNoSeven->save();


            $formNoSevenId = $formNoSeven->id;





            return redirect()->route('formNoSeven.show',base64_encode($formNoSevenId))->with('success','Review Your Information And Send It To Ngo');

        } catch (\Exception $e) {

            return $e;
        }


    }


    public function update(Request $request,$id){


        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $formNoSeven = FormNoSeven::find($id);
            $formNoSeven->sarok_number = $request->sarok_number;
            $formNoSeven->submit_date = $request->submit_date;
            $formNoSeven->ngo_name = $request->ngo_name;
            $formNoSeven->ngo_address = $request->ngo_address;
            $formNoSeven->ngo_name_address_comment = $request->ngo_name_address_comment;
            $formNoSeven->ngo_head_name = $request->ngo_head_name;
            $formNoSeven->ngo_head_organization = $request->ngo_head_organization;
            $formNoSeven->ngo_head_office_mobile =$request->ngo_head_office_mobile;
            $formNoSeven->ngo_head_office_email=$request->ngo_head_office_email;
            $formNoSeven->ngo_head_comment=$request->ngo_head_comment;
            $formNoSeven->ngo_registration=$request->ngo_registration;
            $formNoSeven->fd_one_form_id = $ngo_list_all->id;
            $formNoSeven->ngo_registration_date = $request->ngo_registration_date;
            $formNoSeven->ngo_last_renewal_date = $request->ngo_last_renewal_date;
            $formNoSeven->ngo_duration = $request->ngo_duration;
            $formNoSeven->ngo_reg_comment = $request->ngo_reg_comment;
            $formNoSeven->ngo_local_officer_name = $request->ngo_local_officer_name;
            $formNoSeven->ngo_local_officer_designation = $request->ngo_local_officer_designation;
            $formNoSeven->ngo_local_officer_mobile = $request->ngo_local_officer_mobile;
            $formNoSeven->ngo_local_officer_email = $request->ngo_local_officer_email;
            $formNoSeven->ngo_local_officer_comment = $request->ngo_local_officer_comment;
            $formNoSeven->prokolpo_name = $request->prokolpo_name;
            $formNoSeven->prokolpo_fund = $request->prokolpo_fund;
            $formNoSeven->prokolpo_comment = $request->prokolpo_comment;
            $formNoSeven->prokolpo_approval_date = $request->prokolpo_approval_date;
            $formNoSeven->prokolpo_sarok_number = $request->prokolpo_sarok_number;
            $formNoSeven->prokolpo_certificate_year_and_time = $request->prokolpo_certificate_year_and_time;
            $formNoSeven->prokolpo_approval_comment = $request->prokolpo_approval_comment;
            $formNoSeven->prokolpo_objecttive = $request->prokolpo_objecttive;

            $formNoSeven->prokolpo_objecttive_comment = $request->prokolpo_objecttive_comment;
            $formNoSeven->project_copy_approved_by_burea = $request->project_copy_approved_by_burea;
            $formNoSeven->project_copy_approved_by_burea_comment = $request->project_copy_approved_by_burea_comment;
            $formNoSeven->allocation_for_projects_in_district_or_upazila = $request->allocation_for_projects_in_district_or_upazila;
            $formNoSeven->this_year_under_discussion_multi_year_projects = $request->this_year_under_discussion_multi_year_projects;
            $formNoSeven->actual_expenditure_multi_year_projects = $request->actual_expenditure_multi_year_projects;
            $formNoSeven->direct_beneficiaries_quantity = $request->direct_beneficiaries_quantity;
            $formNoSeven->indirect_beneficiaries_quantity = $request->indirect_beneficiaries_quantity;
            $formNoSeven->jurisdiction_comment = $request->jurisdiction_comment;
            $formNoSeven->prokolpo_duration = $request->prokolpo_duration;
            $formNoSeven->project_inspected_time = $request->project_inspected_time;
            $formNoSeven->inspector_name = $request->inspector_name;
            $formNoSeven->inspector_designation = $request->inspector_designation;
            $formNoSeven->inspector_mobile = $request->inspector_mobile;
            $formNoSeven->inspector_email = $request->inspector_email;
            $formNoSeven->inspector_comment = $request->inspector_comment;
            $formNoSeven->beneficiaries_involved_with_local_administration = $request->beneficiaries_involved_with_local_administration;
            $formNoSeven->beneficiaries_involved_comment = $request->beneficiaries_involved_comment;
            $formNoSeven->regular_participation_in_meeting = $request->regular_participation_in_meeting;
            $formNoSeven->regular_participation_comment = $request->regular_participation_comment;
            $formNoSeven->conditions_properly_met = $request->conditions_properly_met;
            $formNoSeven->conditions_properly_comment = $request->conditions_properly_comment;
            $formNoSeven->mian_ngo_detail = $request->mian_ngo_detail;
            $formNoSeven->main_ngo_detail_comment = $request->main_ngo_detail_comment;
            $formNoSeven->main_ngo_name = $request->main_ngo_name;
            $formNoSeven->main_ngo_address = $request->main_ngo_address;
            $formNoSeven->main_ngo_comment = $request->main_ngo_comment;
            $formNoSeven->sign_in_closing_report = $request->sign_in_closing_report;
            $formNoSeven->sign_in_closing_report_comment = $request->sign_in_closing_report_comment;
            $formNoSeven->feedback_on_projects_implementedt = $request->feedback_on_projects_implementedt;
            $formNoSeven->recommendation_on_projects_implementedt = $request->recommendation_on_projects_implementedt;
            $formNoSeven->last_comment = $request->last_comment;

            $formNoSeven->district_address = $request->district_address;
            $formNoSeven->upazila_address = $request->upazila_address;
            $formNoSeven->onulipi = $request->onulipi;
            $formNoSeven->name_certifying_officer = $request->name_certifying_officer;
            $formNoSeven->designation_certifying_officer = $request->designation_certifying_officer;


            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $formNoSeven->signature_certifying_officer =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $formNoSeven->seal_certifying_officer =CommonController::storeBase64($request->image_seal_base64);

                }



            $formNoSeven->save();


            $formNoSevenId = $formNoSeven->id;





            return redirect()->route('formNoSeven.show',base64_encode($formNoSevenId))->with('success','Review Your Information And Send It To Ngo');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function show($id){

        try{
            $decode_id = base64_decode($id);
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();


            $formSevenData = FormNoSeven::where('id',$decode_id)->latest()->first();


            return view('front.formNoSeven.show',compact('formSevenData','decode_id','ngo_list_all','divisionList'));



        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function edit($id){


        try{
            $decode_id = base64_decode($id);
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            $thanaList = DB::table('civilinfos')->groupBy('thana_bn')
            ->select('thana_bn')->get();

            $formSevenData = FormNoSeven::where('id',$decode_id)->latest()->first();


            return view('front.formNoSeven.edit',compact('thanaList','districtList','formSevenData','decode_id','ngo_list_all','divisionList'));



        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function formNoSevenPdfDownload($id){


        try{
            $decode_id = base64_decode($id);
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();


            $formSevenData = FormNoSeven::where('id',$decode_id)->latest()->first();


            $data = view('front.formNoSeven.formNoSevenPdfDownload',compact('formSevenData','decode_id','ngo_list_all','divisionList'));

            $file_Name_Custome = 'form_no_seven';

            $pdfFilePath =$file_Name_Custome.'.pdf';


        $mpdf = new Mpdf([ 'default_font_size' => 14,'default_font' => 'nikosh']);
        $mpdf->WriteHTML($data);
        $mpdf->Output($pdfFilePath, "I");
        die();



        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }

    public function formNoSevenSend($id){

        try{


        $formNoSevenInfo = FormNoSeven::find(base64_decode($id));
        $formNoSevenInfo->status ='Ongoing';
        $formNoSevenInfo->save();

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
         $regDakData->dak_type = 'formNoSeven';
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
}
