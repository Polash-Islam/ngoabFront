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
use App\Models\FdFourForm;
use App\Models\NgoRenewInfo;
use App\Models\NgoDuration;
use App\Models\FdFourOneExpenditureSector;
use App\Models\FdFourOneForm;
class FdFourFormController extends Controller
{

    public function index(){
        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $fdFourFormList = FdFourForm::where('fd_one_form_id',$ngo_list_all->id)
            ->latest()->get();

            return view('front.fdFourForm.index',compact('ngo_list_all','fdFourFormList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }



    }
    public function create(){
        try{

            $decodeId = base64_decode(1);
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();


            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');

            $fdFourFormList = FdFourForm::where('fd_one_form_id',$ngo_list_all->id)
            ->where('fd_four_one_form_id',$decodeId)
            ->first();

//dd(12);

            return view('front.fdFourForm.newAddForm',compact('renewWebsiteName','ngoDurationLastEx','ngoDurationReg','decodeId','ngo_list_all','fdFourFormList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }
    public function addFdFourFormData($id){
        try{

            $decodeId = base64_decode($id);
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();


            $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');

            $fdFourFormList = FdFourForm::where('fd_one_form_id',$ngo_list_all->id)
            ->where('fd_four_one_form_id',$decodeId)
            ->first();



            return view('front.fdFourForm.create',compact('renewWebsiteName','ngoDurationLastEx','ngoDurationReg','decodeId','ngo_list_all','fdFourFormList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }

    public function store(Request $request){

        //dd($request->all());


        $request->validate([

            'prokolpo_name' => 'required|string',
            'ngo_website' => 'required|string',
            'prokolpo_duration_one' => 'required|string',
            'exam_time' => 'required|string',
            'start_balance' => 'required|string',
            'foreign_grant_taken_exam_year' => 'required|string',
            'foreign_grant_cost_exam_year' => 'required|string',
            'foreign_grant_remaining_exam_year' => 'required|string',
        ]);

        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneForm = new FdFourForm();
            $fdFourOneForm->status = 'Review';
            $fdFourOneForm->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fdFourOneForm->prokolpo_name = $request->prokolpo_name;
            $fdFourOneForm->ngo_name = $request->ngo_name;
            $fdFourOneForm->registration_number = $request->registration_number;
            $fdFourOneForm->ngo_telephone = $request->ngo_telephone;
            $fdFourOneForm->ngo_email = $request->ngo_email;
            $fdFourOneForm->ngo_mobile_number = $request->ngo_mobile_number;
            $fdFourOneForm->ngo_address = $request->ngo_address;
            $fdFourOneForm->farm_name = $request->farm_name;
            $fdFourOneForm->farm_detail = $request->farm_detail;
            $fdFourOneForm->prokolpo_duration = $request->prokolpo_duration;
            $fdFourOneForm->ngo_website = $request->ngo_website;
            $fdFourOneForm->prokolpo_duration_one = $request->prokolpo_duration_one;
            $fdFourOneForm->exam_time =$request->exam_time;
            $fdFourOneForm->start_balance =$request->start_balance;
            $fdFourOneForm->foreign_grant_cost_exam_year =$request->foreign_grant_cost_exam_year;
            $fdFourOneForm->foreign_grant_taken_exam_year =$request->foreign_grant_taken_exam_year;
            $fdFourOneForm->foreign_grant_remaining_exam_year =$request->foreign_grant_remaining_exam_year;
            $fdFourOneForm->fd_one_form_id = $ngo_list_all->id;
            $fdFourOneForm->fd_four_one_form_id = $request->decodeId;
            $fdFourOneForm->save();


            $fdFourOneFormId = $fdFourOneForm->id;

            


            return redirect()->route('fdFourOneDataPost',base64_encode($fdFourOneFormId))->with('success','Added Successfully');


           // return redirect()->route('fdFourForm.show',base64_encode($fdFourOneFormId))->with('success','Added Successfully');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function fdFourOneDataPost($id){

        try{

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            $expenditureDetails = FdFourOneExpenditureSector::where('user_id',Auth::user()->id)

            ->where('status',0)->get();

            $fdFourFormId = base64_decode($id);

            return view('front.fdFourOneForm.newAddForm',compact('fdFourFormId','ngo_list_all','districtList','expenditureDetails'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }

    public function update(Request $request,$id){

//dd($request->all());

        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneForm = FdFourForm::find($id);
            $fdFourOneForm->prokolpo_name = $request->prokolpo_name;
            $fdFourOneForm->ngo_name = $request->ngo_name;
            $fdFourOneForm->registration_number = $request->registration_number;
            $fdFourOneForm->ngo_telephone = $request->ngo_telephone;
            $fdFourOneForm->ngo_email = $request->ngo_email;
            $fdFourOneForm->ngo_mobile_number = $request->ngo_mobile_number;
            $fdFourOneForm->ngo_address = $request->ngo_address;
            $fdFourOneForm->farm_name = $request->farm_name;
            $fdFourOneForm->farm_detail = $request->farm_detail;
            $fdFourOneForm->prokolpo_duration = $request->prokolpo_duration;
            $fdFourOneForm->foreign_grant_cost_exam_year =$request->foreign_grant_cost_exam_year;
            $fdFourOneForm->ngo_website = $request->ngo_website;
            $fdFourOneForm->prokolpo_duration_one = $request->prokolpo_duration_one;
            $fdFourOneForm->exam_time =$request->exam_time;
            $fdFourOneForm->start_balance =$request->start_balance;
            $fdFourOneForm->foreign_grant_taken_exam_year =$request->foreign_grant_taken_exam_year;
            $fdFourOneForm->foreign_grant_remaining_exam_year =$request->foreign_grant_remaining_exam_year;
            $fdFourOneForm->fd_one_form_id = $ngo_list_all->id;
            $fdFourOneForm->save();


            $fdFourOneFormId = $fdFourOneForm->id;


            $getCheckNewId = FdFourOneForm::where('fd_four_form_id',$fdFourOneFormId)->first();


            if(!$getCheckNewId){
                return redirect()->route('fdFourOneDataPost',base64_encode($fdFourOneFormId))->with('success','Updated Successfully');
            }else{
            return redirect()->route('fdFourOneDataUpdate',base64_encode($fdFourOneFormId))->with('success','Updated Successfully');
            }
        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function fdFourOneDataUpdate($id){


        try{

            $fdFourFormId = base64_decode($id);

            //dd($decode_id);

            $getCheckNewId = FdFourOneForm::where('fd_four_form_id',$fdFourFormId)->first();

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            $fdFourOneFormList = FdFourOneForm::where('id',$getCheckNewId->id)
            ->first();

            $expenditureDetails = FdFourOneExpenditureSector::where('fd_four_one_id',$getCheckNewId->id)
            ->latest()->get();

            return view('front.fdFourOneForm.newEdit',compact('fdFourFormId','fdFourOneFormList','expenditureDetails','ngo_list_all','districtList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function show($id){

        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $fdFourFormList = FdFourForm::where('fd_one_form_id',$ngo_list_all->id)->where('id',base64_decode($id))
            ->first();

            $fdFourOneFormList = FdFourOneForm::where('fd_four_form_id',$fdFourFormList->id)
            ->latest()->first();


            if(!$fdFourOneFormList){
                $expenditureDetails =0;
            }else{
            $expenditureDetails = FdFourOneExpenditureSector::where('fd_four_one_id',$fdFourOneFormList->id)->latest()->get();
            }
            return view('front.fdFourForm.show',compact('expenditureDetails','fdFourOneFormList','ngo_list_all','fdFourFormList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function edit($id){

        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $fdFourFormList = FdFourForm::where('fd_one_form_id',$ngo_list_all->id)->where('id',base64_decode($id))
            ->first();

            return view('front.fdFourForm.edit',compact('ngo_list_all','fdFourFormList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }

    public function fd4pdfview($id){

        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $fdFourFormList = FdFourForm::where('fd_one_form_id',$ngo_list_all->id)->where('id',base64_decode($id))
            ->first();

            //return view('front.fdFourForm.edit',compact('ngo_list_all','fdFourFormList'));


            $file_Name_Custome = 'fd_four_form';
            $data =view('front.fdFourForm.fd4pdfview',[

             'fdFourFormList'=>$fdFourFormList  ,
              'ngo_list_all'=>$ngo_list_all,

                        ])->render();


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

    public function fdFourSend($id){

        try{


        $formNoFourInfo = FdFourForm::find(base64_decode($id));
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
         $regDakData->dak_type = 'fdFour';
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
