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
use App\Models\FormNoFive;
use App\Models\FormNoFiveAreaDetail;
use App\Models\FormNoFiveStepTwo;
use App\Models\FormNoFiveStepThree;
use App\Models\FormNoFiveStepFour;
use App\Models\FormNoFiveStepFive;
use App\Models\FormNoFiveOther;
use App\Models\FdOneForm;
use App\Models\NgoDuration;
class FormNoFiveController extends Controller
{




    public function index(){
        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $formNoFiveList = FormNoFive::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();

            return view('front.formNoFive.index',compact('ngo_list_all','formNoFiveList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function create(){

        try{

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
            return view('front.formNoFive.create',compact('ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function show($id){

        try{
            $decode_id = base64_decode($id);
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();

            $formNoFiveStepTwoData = FormNoFiveStepTwo::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepThreeData = FormNoFiveStepThree::where('form_no_fives_id',$decode_id)->get();
            $formFiveData = FormNoFive::where('id',$decode_id)->latest()->first();
            $formNoFiveStepFourData = FormNoFiveStepFour::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepFiveOther= FormNoFiveOther::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepFiveData = FormNoFiveStepFive::where('form_no_fives_id',$decode_id)->get();

            $formNoFiveStepFiveArea = FormNoFiveAreaDetail::where('form_no_fives_id',$decode_id)->get();

            return view('front.formNoFive.show',compact('formNoFiveStepFiveArea','formNoFiveStepFiveData','formNoFiveStepFiveOther','formNoFiveStepFourData','formFiveData','formNoFiveStepThreeData','formNoFiveStepTwoData','decode_id','ngo_list_all','ngoDurationReg','divisionList'));



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
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();

            $formNoFiveStepTwoData = FormNoFiveStepTwo::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepThreeData = FormNoFiveStepThree::where('form_no_fives_id',$decode_id)->get();
            $formFiveData = FormNoFive::where('id',$decode_id)->latest()->first();
            $formNoFiveStepFourData = FormNoFiveStepFour::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepFiveOther= FormNoFiveOther::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepFiveData = FormNoFiveStepFive::where('form_no_fives_id',$decode_id)->get();

            $formNoFiveStepFiveArea = FormNoFiveAreaDetail::where('form_no_fives_id',$decode_id)->get();


            $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();


            return view('front.formNoFive.edit',compact('cityCorporationList','districtList','formNoFiveStepFiveArea','formNoFiveStepFiveData','formNoFiveStepFiveOther','formNoFiveStepFourData','formFiveData','formNoFiveStepThreeData','formNoFiveStepTwoData','decode_id','ngo_list_all','ngoDurationReg','divisionList'));



        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }


    public function formNoFivePdfDownload($id){


        try{
            $decode_id = base64_decode($id);
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();

            $formNoFiveStepTwoData = FormNoFiveStepTwo::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepThreeData = FormNoFiveStepThree::where('form_no_fives_id',$decode_id)->get();
            $formFiveData = FormNoFive::where('id',$decode_id)->latest()->first();
            $formNoFiveStepFourData = FormNoFiveStepFour::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepFiveOther= FormNoFiveOther::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepFiveData = FormNoFiveStepFive::where('form_no_fives_id',$decode_id)->get();

            $formNoFiveStepFiveArea = FormNoFiveAreaDetail::where('form_no_fives_id',$decode_id)->get();


            $file_Name_Custome = 'form_no_five';

            $data =  view('front.formNoFive.formNoFivePdfDownload',compact('formNoFiveStepFiveArea','formNoFiveStepFiveData','formNoFiveStepFiveOther','formNoFiveStepFourData','formFiveData','formNoFiveStepThreeData','formNoFiveStepTwoData','decode_id','ngo_list_all','ngoDurationReg','divisionList'));

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


    public function formNoFiveStepTwo($id){


        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
            $formNoFiveStepTwoData = FormNoFiveStepTwo::where('form_no_fives_id',$decode_id)->get();

            return view('front.formNoFive.formNoFiveStepTwo',compact('formNoFiveStepTwoData','decode_id','ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }

    public function formNoFiveStepThree($id){


        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
            $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
            $formNoFiveStepThreeData = FormNoFiveStepThree::where('form_no_fives_id',$decode_id)->get();
            $formFiveData = FormNoFive::where('id',$decode_id)->latest()->first();

            return view('front.formNoFive.formNoFiveStepThree',compact('thanaList','formFiveData','formNoFiveStepThreeData','decode_id','ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }


    public function formNoFiveStepFour($id){


        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();

            $formNoFiveStepFourData = FormNoFiveStepFour::where('form_no_fives_id',$decode_id)->get();
            $formFiveData = FormNoFive::where('id',$decode_id)->latest()->first();

            return view('front.formNoFive.formNoFiveStepFour',compact('formFiveData','formNoFiveStepFourData','decode_id','ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }

    public function formNoFiveStepFive($id){


        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();


            $formNoFiveStepFiveOther= FormNoFiveOther::where('form_no_fives_id',$decode_id)->get();
            $formNoFiveStepFiveData = FormNoFiveStepFive::where('form_no_fives_id',$decode_id)->get();
            $formFiveData = FormNoFive::where('id',$decode_id)->latest()->first();

            return view('front.formNoFive.formNoFiveStepFive',compact('formFiveData','formNoFiveStepFiveData','formNoFiveStepFiveOther','decode_id','ngo_list_all','ngoDurationReg','divisionList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }


    public function formNoFiveSend($id){

        try{


        $formNoFiveInfo = FormNoFive::find(base64_decode($id));
        $formNoFiveInfo->status ='Ongoing';
        $formNoFiveInfo->save();

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
         $regDakData->dak_type = 'formNoFive';
         $regDakData->receive_from_ngo = 1;
         $regDakData->receive_status = 1;
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

            $formNoFiveInfo = FormNoFive::find($id);
            $formNoFiveInfo->prokolpo_name =$request->prokolpo_name;
            $formNoFiveInfo->prokolpo_duration =$request->prokolpo_duration;
            $formNoFiveInfo->ngo_registration_number =$request->ngo_registration_number;
            $formNoFiveInfo->ngo_registration_date =$request->ngo_registration_date;
            $formNoFiveInfo->approved_estimated_expenditure_year_wise =$request->approved_estimated_expenditure_year_wise;
            $formNoFiveInfo->received_money_during_report =$request->received_money_during_report;
            $formNoFiveInfo->report_year =$request->report_year;
            $formNoFiveInfo->percentage_of_achievement_during_project =$request->percentage_of_achievement_during_project;
            $formNoFiveInfo->prokolpo_araea =$request->prokolpo_araea;
            $formNoFiveInfo->save();


            $input = $request->all();
            $divisionName = $input['division_name'];
            $formNoFiveInfoId = $formNoFiveInfo->id;


            FormNoFiveAreaDetail::where('form_no_fives_id',$formNoFiveInfoId)->delete();

            foreach($divisionName as $key => $divisionName){
                $form= new FormNoFiveAreaDetail();
                $form->form_no_fives_id=$formNoFiveInfoId;
                $form->division_name=$input['division_name'][$key];
                $form->district_name=$input['district_name'][$key];
                $form->city_corparation_name=$input['city_corparation_name'][$key];

                if(empty($input['upozila_name'][$key])){


                }else{

                    $form->upozila_name=$input['upozila_name'][$key];
                }


                if(empty($input['thana_name'][$key])){


                }else{

                    $form->thana_name=$input['thana_name'][$key];
                }



                if(empty($input['municipality_name'][$key])){


                }else{

                    $form->municipality_name=$input['municipality_name'][$key];
                }



                if(empty($input['ward_name'][$key])){


                }else{

                    $form->ward_name=$input['ward_name'][$key];
                }

                $form->save();
            }


            return redirect()->route('formNoFiveStepTwo',base64_encode($formNoFiveInfoId))->with('success','Updated Successfuly');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }


    public function store(Request $request){

        // $request->validate([

        //     'prokolpo_name' => 'required|string',
        //     'prokolpo_duration' => 'required|string',
        //     'ngo_registration_number' => 'required|string',
        //     'ngo_registration_date' => 'required|string',
        //     'approved_estimated_expenditure_year_wise' => 'required|string',
        //     'received_money_during_report' => 'required|string',
        //     'report_year' => 'required|string',
        //     'percentage_of_achievement_during_project' => 'required|string',
        //     'prokolpo_araea' => 'required|string',

        // ]);

        try{
            DB::beginTransaction();

            $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();

            $formNoFiveInfo = new FormNoFive();
            $formNoFiveInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $formNoFiveInfo->fd_one_form_id =$fdOneFormID->id;
            $formNoFiveInfo->prokolpo_name =$request->prokolpo_name;
            $formNoFiveInfo->prokolpo_duration =$request->prokolpo_duration;
            $formNoFiveInfo->status ='submit_process';
            $formNoFiveInfo->ngo_registration_number =$request->ngo_registration_number;
            $formNoFiveInfo->ngo_registration_date =$request->ngo_registration_date;
            $formNoFiveInfo->approved_estimated_expenditure_year_wise =$request->approved_estimated_expenditure_year_wise;
            $formNoFiveInfo->received_money_during_report =$request->received_money_during_report;
            $formNoFiveInfo->report_year =$request->report_year;
            $formNoFiveInfo->percentage_of_achievement_during_project =$request->percentage_of_achievement_during_project;
            $formNoFiveInfo->prokolpo_araea =$request->prokolpo_araea;
            $formNoFiveInfo->save();

            $input = $request->all();
            $divisionName = $input['division_name'];
            $formNoFiveInfoId = $formNoFiveInfo->id;

            foreach($divisionName as $key => $divisionName){
                $form= new FormNoFiveAreaDetail();
                $form->form_no_fives_id=$formNoFiveInfoId;
                $form->division_name=$input['division_name'][$key];
                $form->district_name=$input['district_name'][$key];
                $form->city_corparation_name=$input['city_corparation_name'][$key];

                if(empty($input['upozila_name'][$key])){


                }else{

                    $form->upozila_name=$input['upozila_name'][$key];
                }


                if(empty($input['thana_name'][$key])){


                }else{

                    $form->thana_name=$input['thana_name'][$key];
                }



                if(empty($input['municipality_name'][$key])){


                }else{

                    $form->municipality_name=$input['municipality_name'][$key];
                }



                if(empty($input['ward_name'][$key])){


                }else{

                    $form->ward_name=$input['ward_name'][$key];
                }

                $form->save();
            }

            DB::commit();
            return redirect()->route('formNoFiveStepTwo',base64_encode($formNoFiveInfoId))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }



    }



    public function formNoFiveStepTwoUpdate(Request $request){


        try{

            $formNoFiveInfo = FormNoFiveStepTwo::find($request->id);
            $formNoFiveInfo->sector_of_annexure_C =$request->sector_of_annexure_C;
            $formNoFiveInfo->sector_wise_budget =$request->sector_wise_budget;
            $formNoFiveInfo->activities_and_objectives =$request->activities_and_objectives;
            $formNoFiveInfo->activity_wise_segmented_budget =$request->activity_wise_segmented_budget;
            $formNoFiveInfo->activity_based_achievement_targets =$request->activity_based_achievement_targets;
            $formNoFiveInfo->activity_based_actual_costing =$request->activity_based_actual_costing;
            $formNoFiveInfo->accounts_payable_total_actual_expenditure =$request->accounts_payable_total_actual_expenditure;
            $formNoFiveInfo->cumulative_progress_during_reporting_in_real =$request->cumulative_progress_during_reporting_in_real;
            $formNoFiveInfo->cumulative_progress_during_reporting_in_financial =$request->cumulative_progress_during_reporting_in_financial;
            $formNoFiveInfo->comment =$request->comment;
            $formNoFiveInfo->save();


            return redirect()->route('formNoFiveStepTwo',base64_encode($request->decode_id))->with('success','Updated Successfully');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }

    public function formNoFiveStepTwoDelete($id){
        try{

            $admins = FormNoFiveStepTwo::find($id);
            if (!is_null($admins)) {
                $admins->delete();
            }

            return back()->with('error','Deleted successfully!');
        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }





    public function formNoFiveStepTwoPost(Request $request){

        //dd($request->all());

        $request->validate([

            'sector_of_annexure_C' => 'required|string',
            'sector_wise_budget' => 'required|string',
            'activities_and_objectives' => 'required|string',
            'activity_wise_segmented_budget' => 'required|string',
            'activity_based_achievement_targets' => 'required|string',
            'activity_based_actual_costing' => 'required|string',
            'accounts_payable_total_actual_expenditure' => 'required|string',
            'cumulative_progress_during_reporting_in_real' => 'required|string',
            'cumulative_progress_during_reporting_in_financial' => 'required|string',

        ]);


       // dd($request->id);
        try{
            DB::beginTransaction();

            $formNoFiveInfo = new FormNoFiveStepTwo();
            $formNoFiveInfo->form_no_fives_id =$request->id;
            $formNoFiveInfo->sector_of_annexure_C =$request->sector_of_annexure_C;
            $formNoFiveInfo->sector_wise_budget =$request->sector_wise_budget;
            $formNoFiveInfo->activities_and_objectives =$request->activities_and_objectives;
            $formNoFiveInfo->activity_wise_segmented_budget =$request->activity_wise_segmented_budget;
            $formNoFiveInfo->activity_based_achievement_targets =$request->activity_based_achievement_targets;
            $formNoFiveInfo->activity_based_actual_costing =$request->activity_based_actual_costing;
            $formNoFiveInfo->accounts_payable_total_actual_expenditure =$request->accounts_payable_total_actual_expenditure;
            $formNoFiveInfo->cumulative_progress_during_reporting_in_real =$request->cumulative_progress_during_reporting_in_real;
            $formNoFiveInfo->cumulative_progress_during_reporting_in_financial =$request->cumulative_progress_during_reporting_in_financial;
            $formNoFiveInfo->comment =$request->comment;
            $formNoFiveInfo->save();

            $input = $request->all();
            $formNoFiveInfoId = $formNoFiveInfo->id;

            DB::commit();
            return redirect()->route('formNoFiveStepTwo',base64_encode($request->id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function formNoFiveStepFourPost(Request $request){

        $request->validate([

            'approval_file_of_Bureau' => 'nullable|file',
            'land_and_transport_detail' => 'required|string'

        ]);

        try{
            DB::beginTransaction();

            $formNoFiveInfo = FormNoFive::find($request->id);
            $formNoFiveInfo->land_and_transport_detail =$request->land_and_transport_detail;
            if ($request->hasfile('approval_file_of_Bureau')) {

                $filePath="FormNoFive";
                $file = $request->file('approval_file_of_Bureau');
                $formNoFiveInfo->approval_file_of_Bureau =CommonController::pdfUpload($request,$file,$filePath);

            }
            $formNoFiveInfo->save();

            $input = $request->all();
            $formNoFiveInfoId = $formNoFiveInfo->id;

            DB::commit();
            return redirect()->route('formNoFiveStepFive',base64_encode($request->id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }


    public function formNoFiveStepThreeDelete($id){
        try{

            $admins = FormNoFiveStepThree::find($id);
            if (!is_null($admins)) {
                $admins->delete();
            }

            return back()->with('error','Deleted successfully!');
        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }


    public function formNoFiveStepThreeUpdate(Request $request){


        try{

            $formNoFiveInfo = FormNoFiveStepThree::find($request->id);
            $formNoFiveInfo->district_name =$request->district_name;
            $formNoFiveInfo->comment =$request->comment;
            $formNoFiveInfo->upazila_name =$request->upazila_name;
            $formNoFiveInfo->total_allocation_for_upazila =$request->total_allocation_for_upazila;
            $formNoFiveInfo->total_actual_cost =$request->total_actual_cost;
            $formNoFiveInfo->save();

            return redirect()->route('formNoFiveStepThree',base64_encode($request->decode_id))->with('success','Updated Successfuly');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }


    }


    public function formNoFiveStepThreePost(Request $request){

        $request->validate([

            'district_name' => 'required|string',
            'upazila_name' => 'required|string',
            'total_allocation_for_upazila' => 'required|string',
            'total_actual_cost' => 'required|string',

        ]);


        try{
            DB::beginTransaction();

            $formNoFiveInfo = new FormNoFiveStepThree();
            $formNoFiveInfo->form_no_fives_id =$request->id;
            $formNoFiveInfo->district_name =$request->district_name;
            $formNoFiveInfo->comment =$request->comment;
            $formNoFiveInfo->upazila_name =$request->upazila_name;
            $formNoFiveInfo->total_allocation_for_upazila =$request->total_allocation_for_upazila;
            $formNoFiveInfo->total_actual_cost =$request->total_actual_cost;
            $formNoFiveInfo->save();

            $input = $request->all();
            $formNoFiveInfoId = $formNoFiveInfo->id;

            DB::commit();
            return redirect()->route('formNoFiveStepThree',base64_encode($request->id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }


    public function formNoFiveStepThreeExtra(Request $request){

            $formNoFiveInfo = FormNoFive::find($request->decode_id);
            $formNoFiveInfo->prokolpo_name_one =$request->prokolpo_name_one;
            $formNoFiveInfo->reporting_period =$request->reporting_period;
            $formNoFiveInfo->save();

           return  $url = url('formNoFiveStepFour/'.base64_encode($request->decode_id));


    }


    public function formNoFiveStepFourDelete($id){
        try{

            $admins = FormNoFiveStepFour::find($id);
            if (!is_null($admins)) {
                $admins->delete();
            }

            return back()->with('error','Deleted successfully!');
        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }


    public function formNoFiveStepFourPostAjax(Request $request){

            $formNoFiveInfo = new FormNoFiveStepFour();
            $formNoFiveInfo->form_no_fives_id =$request->decode_id;
            $formNoFiveInfo->description_of_property =$request->wealth_descrip;
            $formNoFiveInfo->sub_property =$request->sub_property;
            $formNoFiveInfo->quantity =$request->quantity;
            $formNoFiveInfo->collect_date =$request->collect_date;
            $formNoFiveInfo->real_buying_price =$request->real_buying_price;
            $formNoFiveInfo->fund_source =$request->fund_source;
            $formNoFiveInfo->what_is_it_used_for =$request->what_is_it_used_for;
            $formNoFiveInfo->place =$request->place;
            $formNoFiveInfo->assets_sold_transferred_number_or_quantity =$request->assets_sold_transferred_number_or_quantity;
            $formNoFiveInfo->quantity_during_start_of_organization =$request->quantity_during_start_of_organization;
            $formNoFiveInfo->total_during_start_of_organization =$request->total_during_start_of_organization;
            $formNoFiveInfo->current_status =$request->current_status;
            $formNoFiveInfo->save();


            $formNoFiveInfoList = FormNoFiveStepFour::where('form_no_fives_id',$request->decode_id)->get();

            $data = view('front.formNoFive.formNoFiveStepFourPostAjax',compact('formNoFiveInfoList'))->render();
            return response()->json($data);


    }


    public function formNoFiveStepFourUpdate(Request $request){



        $formNoFiveInfo = FormNoFiveStepFour::find($request->mainId);
        $formNoFiveInfo->description_of_property =$request->wealth_descrip;
        $formNoFiveInfo->sub_property =$request->sub_property;
        $formNoFiveInfo->quantity =$request->quantity;
        $formNoFiveInfo->collect_date =$request->collect_date;
        $formNoFiveInfo->real_buying_price =$request->real_buying_price;
        $formNoFiveInfo->fund_source =$request->fund_source;
        $formNoFiveInfo->what_is_it_used_for =$request->what_is_it_used_for;
        $formNoFiveInfo->place =$request->place;
        $formNoFiveInfo->assets_sold_transferred_number_or_quantity =$request->assets_sold_transferred_number_or_quantity;
        $formNoFiveInfo->quantity_during_start_of_organization =$request->quantity_during_start_of_organization;
        $formNoFiveInfo->total_during_start_of_organization =$request->total_during_start_of_organization;
        $formNoFiveInfo->current_status =$request->current_status;
        $formNoFiveInfo->save();


        $formNoFiveInfoList = FormNoFiveStepFour::where('form_no_fives_id',$request->decode_id)->get();

        $data = view('front.formNoFive.formNoFiveStepFourPostAjax',compact('formNoFiveInfoList'))->render();
        return response()->json($data);


    }


    public function formNoFiveStepFiveDelete(Request $request){
        try{

            $admins = FormNoFiveStepFive::find($request->id);
            if (!is_null($admins)) {
                $admins->delete();
            }

            return back()->with('error','Deleted successfully!');
        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }


    public function formNoFiveStepFiveUpdate(Request $request){


        $formNoFiveInfo = FormNoFiveStepFive::find($request->mainId);
        $formNoFiveInfo->name_of_the_officer =$request->name_of_the_officer;
        $formNoFiveInfo->designation_of_the_officer =$request->designation_of_the_officer;
        $formNoFiveInfo->joining_date =$request->joining_date;
        $formNoFiveInfo->travel_country =$request->travel_country;
        $formNoFiveInfo->organizing_organization_name =$request->organizing_organization_name;
        $formNoFiveInfo->organizing_organization_address =$request->organizing_organization_address;
        $formNoFiveInfo->name_of_training_course =$request->name_of_training_course;
        $formNoFiveInfo->course_duration =$request->course_duration;
        $formNoFiveInfo->total_expense =$request->total_expense;
        $formNoFiveInfo->name_of_donor_organization =$request->name_of_donor_organization;
        $formNoFiveInfo->country_name_of_donor_organization =$request->country_name_of_donor_organization;
        $formNoFiveInfo->save();


        $formNoFiveInfoList = FormNoFiveStepFive::where('form_no_fives_id',$request->decode_id)->get();

        $data = view('front.formNoFive.formNoFiveStepFivePostAjax',compact('formNoFiveInfoList'))->render();
        return response()->json($data);

    }


    public function formNoFiveStepFivePostAjax(Request $request){


        $formNoFiveInfo = new FormNoFiveStepFive();
        $formNoFiveInfo->form_no_fives_id =$request->decode_id;
        $formNoFiveInfo->name_of_the_officer =$request->name_of_the_officer;
        $formNoFiveInfo->designation_of_the_officer =$request->designation_of_the_officer;
        $formNoFiveInfo->joining_date =$request->joining_date;
        $formNoFiveInfo->travel_country =$request->travel_country;
        $formNoFiveInfo->organizing_organization_name =$request->organizing_organization_name;
        $formNoFiveInfo->organizing_organization_address =$request->organizing_organization_address;
        $formNoFiveInfo->name_of_training_course =$request->name_of_training_course;
        $formNoFiveInfo->course_duration =$request->course_duration;
        $formNoFiveInfo->total_expense =$request->total_expense;
        $formNoFiveInfo->name_of_donor_organization =$request->name_of_donor_organization;
        $formNoFiveInfo->country_name_of_donor_organization =$request->country_name_of_donor_organization;
        $formNoFiveInfo->save();


        $formNoFiveInfoList = FormNoFiveStepFive::where('form_no_fives_id',$request->decode_id)->get();

        $data = view('front.formNoFive.formNoFiveStepFivePostAjax',compact('formNoFiveInfoList'))->render();
        return response()->json($data);


    }


    public function destroy($id){

        try{

            $admins = FormNoFive::find($id);
            if (!is_null($admins)) {
                $admins->delete();
            }

            return back()->with('error','Deleted successfully!');
        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }


    public function formNoFiveStepSixDelete(Request $request){


        try{

            $admins = FormNoFiveOther::find($request->id);
            if (!is_null($admins)) {
                $admins->delete();
            }

            return back()->with('error','Deleted successfully!');
        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }


    public function formNoFiveStepSixUpdate(Request $request){


        $formNoFiveInfo = FormNoFiveOther::find($request->mainId);
        $formNoFiveInfo->comment =$request->comment;
        $formNoFiveInfo->name_of_the_officer_depend_on_salary =$request->name_of_the_officer_depend_on_salary;
        $formNoFiveInfo->nationality_of_the_officer_depend_on_salary =$request->nationality_of_the_officer_depend_on_salary;
        $formNoFiveInfo->designation_of_the_officer_depend_on_salary =$request->designation_of_the_officer_depend_on_salary;
        $formNoFiveInfo->responsbility_of_the_officer_depend_on_salary =$request->responsbility_of_the_officer_depend_on_salary;
        $formNoFiveInfo->education_of_the_officer_depend_on_salary =$request->education_of_the_officer_depend_on_salary;
        $formNoFiveInfo->experience_of_the_officer_depend_on_salary =$request->experience_of_the_officer_depend_on_salary;
        $formNoFiveInfo->age_of_the_officer_depend_on_salary =$request->age_of_the_officer_depend_on_salary;
        $formNoFiveInfo->salary_of_the_officer_depend_on_salary =$request->salary_of_the_officer_depend_on_salary;
        $formNoFiveInfo->other_allowances_or_benefits_of_the_officer_depend_on_salary =$request->other_allowances_or_benefits_of_the_officer_depend_on_salary;
        $formNoFiveInfo->job_duration_of_the_officer_depend_on_salary =$request->job_duration_of_the_officer_depend_on_salary;
        $formNoFiveInfo->financial_benefit_received_from_any_other_scheme =$request->financial_benefit_received_from_any_other_scheme;
        $formNoFiveInfo->save();


        $formNoFiveInfoList = FormNoFiveOther::where('form_no_fives_id',$request->decode_id)->get();

        $data = view('front.formNoFive.formNoFiveStepSixPostAjax',compact('formNoFiveInfoList'))->render();
        return response()->json($data);


    }


    public function formNoFiveStepSixPostAjax(Request $request){

        $formNoFiveInfo = new FormNoFiveOther();
        $formNoFiveInfo->comment =$request->comment;
        $formNoFiveInfo->form_no_fives_id =$request->decode_id;
        $formNoFiveInfo->name_of_the_officer_depend_on_salary =$request->name_of_the_officer_depend_on_salary;
        $formNoFiveInfo->nationality_of_the_officer_depend_on_salary =$request->nationality_of_the_officer_depend_on_salary;
        $formNoFiveInfo->designation_of_the_officer_depend_on_salary =$request->designation_of_the_officer_depend_on_salary;
        $formNoFiveInfo->responsbility_of_the_officer_depend_on_salary =$request->responsbility_of_the_officer_depend_on_salary;
        $formNoFiveInfo->education_of_the_officer_depend_on_salary =$request->education_of_the_officer_depend_on_salary;
        $formNoFiveInfo->experience_of_the_officer_depend_on_salary =$request->experience_of_the_officer_depend_on_salary;
        $formNoFiveInfo->age_of_the_officer_depend_on_salary =$request->age_of_the_officer_depend_on_salary;
        $formNoFiveInfo->salary_of_the_officer_depend_on_salary =$request->salary_of_the_officer_depend_on_salary;
        $formNoFiveInfo->other_allowances_or_benefits_of_the_officer_depend_on_salary =$request->other_allowances_or_benefits_of_the_officer_depend_on_salary;
        $formNoFiveInfo->job_duration_of_the_officer_depend_on_salary =$request->job_duration_of_the_officer_depend_on_salary;
        $formNoFiveInfo->financial_benefit_received_from_any_other_scheme =$request->financial_benefit_received_from_any_other_scheme;
        $formNoFiveInfo->save();


        $formNoFiveInfoList = FormNoFiveOther::where('form_no_fives_id',$request->decode_id)->get();

        $data = view('front.formNoFive.formNoFiveStepSixPostAjax',compact('formNoFiveInfoList'))->render();
        return response()->json($data);


    }


    public function formNoFiveStepFivePost(Request $request){


        //dd($request->all());

        $request->validate([

            'foreign_tour_file' => 'nullable|file',
            'foreign_tour_detail' => 'required|string'

        ]);

        try{
            DB::beginTransaction();

            $formNoFiveInfo = FormNoFive::find($request->main_id);
            $formNoFiveInfo->foreign_tour_detail =$request->foreign_tour_detail;
            $formNoFiveInfo->report_preparar_date =date('d-m-Y');
            $formNoFiveInfo->status = 'Review';
            $formNoFiveInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            if ($request->hasfile('foreign_tour_file')) {

                $filePath="FormNoFive";
                $file = $request->file('foreign_tour_file');
                $formNoFiveInfo->foreign_tour_file =CommonController::pdfUpload($request,$file,$filePath);

            }
            if (!empty($request->image_base64)) {
                $filePath="ngoHead";
                $file = $request->file('report_preparar_sign');
                $formNoFiveInfo->report_preparar_sign =CommonController::storeBase64($request->image_base64);

            }

            if (!empty($request->image_seal_base64)) {
                $filePath="ngoHead";
                $file = $request->file('report_preparar_seal');
                $formNoFiveInfo->report_preparar_seal =CommonController::storeBase64($request->image_seal_base64);

            }
            $formNoFiveInfo->save();

            $input = $request->all();
            $formNoFiveInfoId = $formNoFiveInfo->id;

            DB::commit();
            return redirect()->route('formNoFive.show',base64_encode($request->main_id))->with('success','Review Your Information ,Then Submit To Ngo');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }

    public function formNoFiveRetaltedPdf($title,$id){


        $get_file_data = FormNoFive::where('id',base64_decode($id))->value($title);

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
