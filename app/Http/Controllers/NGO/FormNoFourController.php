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
use App\Models\FormNoFour;
use App\Models\FormNoFourSectorDetail;
use App\Models\FdOneForm;
class FormNoFourController extends Controller
{
    public function index(){
        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $formNoFourList = FormNoFour::where('fd_one_form_id',$ngo_list_all->id)
            ->latest()->get();

            return view('front.formNoFour.index',compact('ngo_list_all','formNoFourList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function show($id){

        try{
            $decode_id = base64_decode($id);
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();

            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();


            $formFourData = FormNoFour::where('id',$decode_id)->latest()->first();

            $formFourAreaList = FormNoFourSectorDetail::where('form_no_four_id',$decode_id)
                                 ->latest()->get();

            return view('front.formNoFour.show',compact('formFourAreaList','formFourData','decode_id','ngoListAll','divisionList'));



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

            $formFourAreaList = FormNoFourSectorDetail::where('form_no_four_id',$decode_id)
            ->latest()->get();
            $formFourData = FormNoFour::where('id',$decode_id)->latest()->first();


            return view('front.formNoFour.edit',compact('formFourAreaList','formFourData','decode_id','ngo_list_all','divisionList'));



        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }



    public function create(){

        try{

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            return view('front.formNoFour.create',compact('ngo_list_all','districtList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function store(Request $request){

        //dd($request->all());


        // $request->validate([

        //     'ngo_name' => 'required|string',
        //     'prokolpo_name' => 'required|string',
        //     'prokolpo_duration' => 'required|string',
        //     'prokolpo_permission_no' => 'required|string',
        //     'prokolpo_date' => 'required|string',
        //     'prokolpo_report_time' => 'required|string',
        //     'prokolpo_total_cost' => 'required|string',
        //     'allocation_amount' => 'required|string',
        //     'district_upazila_wise_total_expenditure' => 'required|string',
        //     'district_upazila_wise_annual_allocation' => 'required|string',
        //     'sign_board_avaiable_or_not' => 'required|string'
        // ]);


        //dd($request->all());

        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $formNoFour = new FormNoFour();
            $formNoFour->status = 'Review';
            $formNoFour->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $formNoFour->ngo_name = $request->ngo_name;
            $formNoFour->prokolpo_name = $request->prokolpo_name;
            $formNoFour->prokolpo_duration = $request->prokolpo_duration;
            $formNoFour->prokolpo_permission_no = $request->prokolpo_permission_no;
            $formNoFour->prokolpo_date = $request->prokolpo_date;
            $formNoFour->prokolpo_report_time = $request->prokolpo_report_time;
            $formNoFour->prokolpo_total_cost = $request->prokolpo_total_cost;
            $formNoFour->allocation_amount =$request->allocation_amount;
            $formNoFour->district_upazila_wise_total_expenditure=$request->district_upazila_wise_total_expenditure;
            $formNoFour->district_upazila_wise_annual_allocation=$request->district_upazila_wise_annual_allocation;
            $formNoFour->sign_board_avaiable_or_not=$request->sign_board_avaiable_or_not;
            $formNoFour->fd_one_form_id = $ngo_list_all->id;
            if ($request->hasfile('prokolpo_sector_detail')) {
                $filePath="FormNoFour";
                $file = $request->file('prokolpo_sector_detail');
                $formNoFour->prokolpo_sector_detail =CommonController::pdfUpload($request,$file,$filePath);

            }
            $formNoFour->save();


            $formNoFourId = $formNoFour->id;

            $input = $request->all();
            $work_area = $input['work_area'];


            foreach($work_area as $key => $work_area){

                $form= new FormNoFourSectorDetail();
                $form->form_no_four_id=$formNoFourId;
                $form->work_area=$input['work_area'][$key];
                $form->sector_detail=$input['sector_detail'][$key];
                $form->target_real=$input['target_real'][$key];
                $form->target_financial=$input['target_financial'][$key];
                $form->achievement_real=$input['achievement_real'][$key];
                $form->achievement_financial=$input['achievement_financial'][$key];
                $form->comulative_achievement=$input['comulative_achievement'][$key];
                if(empty($input['comment'][$key])){


                }else{

                    $form->comment=$input['comment'][$key];
                }

                $form->save();
            }





            return redirect()->route('formNoFour.show',base64_encode($formNoFourId))->with('success','Review Your Information And Send It To Ngo');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }


    }


    public function update(Request $request,$id){



        try{

            $formNoFour = FormNoFour::find($id);
            $formNoFour->ngo_name = $request->ngo_name;
            $formNoFour->prokolpo_name = $request->prokolpo_name;
            $formNoFour->prokolpo_duration = $request->prokolpo_duration;
            $formNoFour->prokolpo_permission_no = $request->prokolpo_permission_no;
            $formNoFour->prokolpo_date = $request->prokolpo_date;
            $formNoFour->prokolpo_report_time = $request->prokolpo_report_time;
            $formNoFour->prokolpo_total_cost = $request->prokolpo_total_cost;
            $formNoFour->allocation_amount =$request->allocation_amount;
            $formNoFour->district_upazila_wise_total_expenditure=$request->district_upazila_wise_total_expenditure;
            $formNoFour->district_upazila_wise_annual_allocation=$request->district_upazila_wise_annual_allocation;
            $formNoFour->sign_board_avaiable_or_not=$request->sign_board_avaiable_or_not;
            if ($request->hasfile('prokolpo_sector_detail')) {
                $filePath="FormNoFour";
                $file = $request->file('prokolpo_sector_detail');
                $formNoFour->prokolpo_sector_detail =CommonController::pdfUpload($request,$file,$filePath);

            }
            $formNoFour->save();


            $formNoFourId = $formNoFour->id;

            $input = $request->all();
            $work_area = $input['work_area'];

            FormNoFourSectorDetail::where('form_no_four_id',$formNoFourId)->delete();
            foreach($work_area as $key => $work_area){

                $form= new FormNoFourSectorDetail();
                $form->form_no_four_id=$formNoFourId;
                $form->work_area=$input['work_area'][$key];
                $form->sector_detail=$input['sector_detail'][$key];
                $form->target_real=$input['target_real'][$key];
                $form->target_financial=$input['target_financial'][$key];
                $form->achievement_real=$input['achievement_real'][$key];
                $form->achievement_financial=$input['achievement_financial'][$key];
                $form->comulative_achievement=$input['comulative_achievement'][$key];
                if(empty($input['comment'][$key])){


                }else{

                    $form->comment=$input['comment'][$key];
                }

                $form->save();
            }

            return redirect()->route('formNoFour.show',base64_encode($formNoFourId))->with('success','Review Your Information And Send It To Ngo');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }


    }

    public function formNoFourPdfDownload($id){

        try{
            $decode_id = base64_decode($id);
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();


            $formFourData = FormNoFour::where('id',$decode_id)->latest()->first();

            $formFourAreaList = FormNoFourSectorDetail::where('form_no_four_id',$decode_id)
            ->latest()->get();
            $data = view('front.formNoFour.formNoFourPdfDownload',compact('formFourAreaList','formFourData','decode_id','ngo_list_all','divisionList'));

            $file_Name_Custome = 'form_no_four';

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

    public function formNoFourSend($id){

        try{


        $formNoFourInfo = FormNoFour::find(base64_decode($id));
        $formNoFourInfo->status ='Ongoing';
        $formNoFourInfo->save();

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
         $regDakData->dak_type = 'formNoFour';
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
}
