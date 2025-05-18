<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fd6Form;
use App\Models\Fd6FormProkolpoArea;
use App\Models\NVisa;
use App\Models\SDGDevelopmentGoal;
use App\Models\Fd2Form;
use App\Models\Fd6PartnerNgo;
use App\Models\Fd6AdjoiningB;
use App\Models\Fd2FormOtherInfo;
use App\Models\Fd2AllFormLastYearDetail;
use App\Models\ExpectedResult;
use App\Models\DistrictWiseActivity;
use App\Models\NgoStatus;
use App\Models\EstimateCost;
use App\Models\Country;
use App\Models\Fd9Form;
use App\Models\ProkolpoDetail;
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
use App\Models\Fd6GovernanceAndTransparency;
use App\Models\Fd6ProjectManagement;
use App\Models\Fd6StepThree;
use App\Models\NgoRenewInfo;
use App\Models\Fd6AdjoiningA;
use App\Models\Fd6AdjoiningC;
use App\Models\Fd6AdjoiningD;
use App\Models\DetailAsPerForm6;
use App\Models\Fd6FurnitureEquipment;
use App\Models\Fd6AdjoiningG;
use App\Models\Fd6AdjoiningE;
use Illuminate\Support\Facades\App;
class Fd6FormController extends Controller
{


    public function getTargetFromGoal(Request $request){

       // dd($request->all());

        $getTargetDescription = DB::table('targets')
          ->where('goal_id',$request->id)->get();

          $data = view('front.fd6Form.getTargetFromGoal',compact('getTargetDescription'))->render();
        return response()->json($data);
    }

    public function getIndicatorFromTarget(Request $request){

        $getIndicatorDescription = DB::table('indicators')
          ->where('target_id',$request->id)->get();

          $data = view('front.fd6Form.getIndicatorFromTarget',compact('getIndicatorDescription'))->render();
        return response()->json($data);


    }

    //fd6SourceOfFundDelete




    public function fd6StepFiveMainPost(Request $request){


        //dd($request->all());

        try{
            DB::beginTransaction();
        $fd6FormInfo = new Fd6AdjoiningE();
        $fd6FormInfo->fd6_form_id =$request->fd6Id;
        $fd6FormInfo->prokolpo_name =$request->prokolpo_name;
        $fd6FormInfo->prokolpo_duration =$request->prokolpo_duration;
        $fd6FormInfo->ngo_permission_date =$request->ngo_permission_date;
        $fd6FormInfo->prokolpo_price =$request->prokolpo_price;
        $fd6FormInfo->development_detail =$request->development_detail;

        if ($request->hasfile('prokolpo_audit_report')) {
            $filePath="FdSixForm";
            $file = $request->file('prokolpo_audit_report');

            $fd6FormInfo->prokolpo_audit_report =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('prokolpo_final_report')) {
            $filePath="FdSixForm";
            $file = $request->file('prokolpo_final_report');

            $fd6FormInfo->prokolpo_final_report =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('prokolpo_local_audit_report')) {
            $filePath="FdSixForm";
            $file = $request->file('prokolpo_local_audit_report');

            $fd6FormInfo->prokolpo_local_audit_report =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('after_end_prokolpo')) {
            $filePath="FdSixForm";
            $file = $request->file('after_end_prokolpo');

            $fd6FormInfo->after_end_prokolpo =CommonController::pdfUpload($request,$file,$filePath);

        }
        $fd6FormInfo->save();




        $lastDataOfFd6 = Fd6Form::find($request->fd6Id);
        $lastDataOfFd6->chief_name = $request->chief_name;
        $lastDataOfFd6->chief_desi = $request->chief_desi;

        $filePath="FdSixForm";

        if (!empty($request->image_base64)) {

            $filePath="ngoHead";
            $file = $request->file('digital_signature');
            $lastDataOfFd6->digital_signature =CommonController::storeBase64($request->image_base64);

            }


        if (!empty($request->image_seal_base64)) {

            $filePath="ngoHead";
            $file = $request->file('digital_seal');
            $lastDataOfFd6->digital_seal =CommonController::storeBase64($request->image_seal_base64);

            }

        $lastDataOfFd6->save();



        DB::commit();
            return redirect()->route('addFd2Detail',base64_encode($request->fd6Id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }
    public function index(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();

        return view('front.fd6Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fd6FormList'));
    }



    public function create(){

        $prokolpoAreaList = Fd6FormProkolpoArea::where('user_id',Auth::user()->id)
        ->where('upload_type',0)->get();

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        return view('front.fd6Form.stepOneForm',compact('prokolpoAreaList','thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function getDistrictList(Request $request){


        $divisionList = $request->getMainValue;

        $districtList = DB::table('civilinfos')->where('division_bn',$divisionList)->groupBy('district_bn')
            ->select('district_bn')->get();

        $data = view('front.fd6Form.get_district_from_division',compact('districtList'))->render();
        return response()->json($data);


    }


    public function getUpozilaListNew(Request $request){

        $divisionList = $request->getMainValue;

        $upozilaList = DB::table('civilinfos')
        ->where('division_bn',$divisionList)->groupBy('thana_bn')
            ->select('thana_bn')->get();

        $data = view('front.fd6Form.getUpozilaListNew',compact('upozilaList'))->render();
        return response()->json($data);

    }





    public function getCityCorporationList(Request $request){


        $divisionList = $request->getMainValue;

        $cityCorporationList = DB::table('civilinfos')->where('division_bn',$divisionList)->whereNotNull('city_orporation')->groupBy('city_orporation')
            ->select('city_orporation')->get();

        $data = view('front.fd6Form.getCityCorporationList',compact('cityCorporationList'))->render();
        return response()->json($data);



    }


    public function getUpozilaList(Request $request){


        $districtList = $request->getMainValue;

        $upozilaList = DB::table('civilinfos')->where('district_bn',$districtList)
        ->whereNotNull('thana_bn')->groupBy('thana_bn')
            ->select('thana_bn')->get();

        $data = view('front.fd6Form.getUpozilaList',compact('upozilaList'))->render();
        return response()->json($data);


    }




    public function store(Request $request){

       
        $request->validate([

            'ngo_name' => 'required|string',
            'ngo_registration_date' => 'required|string',
            'ngo_last_renew_date' => 'required|string',
            'ngo_expiration_date' => 'required|string',
            'ngo_address' => 'required|string',
            'ngo_telephone_number' => 'required|string',
            'ngo_mobile_number' => 'required|string',
            'ngo_email_address' => 'required|string',
            'ngo_website' => 'required|string',
            'ngo_prokolpo_name' => 'required|string',
            'ngo_prokolpo_duration' => 'required|string',
            'ngo_prokolpo_start_date' => 'required|string',
            'ngo_prokolpo_end_date' => 'required|string',


        ]);

        //dd($request->all());

        if($request->areaId > 0){

        try{
            DB::beginTransaction();

            $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();

            $subject_all = implode(",",$request->subject_id);

            $fd6FormInfo = new Fd6Form();
            $fd6FormInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fd6FormInfo->fd_one_form_id =$fdOneFormID->id;
            $fd6FormInfo->ngo_name =$request->ngo_name;
            $fd6FormInfo->subject_id =$subject_all;
            $fd6FormInfo->status ='Review';
            $fd6FormInfo->ngo_registration_date =$request->ngo_registration_date;
            $fd6FormInfo->ngo_last_renew_date =$request->ngo_last_renew_date;
            $fd6FormInfo->ngo_expiration_date =$request->ngo_expiration_date;
            $fd6FormInfo->ngo_address =$request->ngo_address;
            $fd6FormInfo->ngo_registration_number =$request->ngo_registration_number;
            $fd6FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
            $fd6FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
            $fd6FormInfo->ngo_email_address =$request->ngo_email_address;
            $fd6FormInfo->ngo_website =$request->ngo_website;
            $fd6FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
            $fd6FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
            $fd6FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
            $fd6FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
            $fd6FormInfo->save();

            $input = $request->all();

            $fd6FormInfoId = $fd6FormInfo->id;


            $prokolpoDetail = new ProkolpoDetail();
            $prokolpoDetail->formId=$fd6FormInfoId;
            $prokolpoDetail->type='fd6';
            $prokolpoDetail->save();

            Fd6FormProkolpoArea::where('user_id',Auth::user()->id)
            ->where('upload_type',0)
       ->update([
           'upload_type' => 1,
           'fd6_form_id' =>$fd6FormInfoId
        ]);

            DB::commit();

            session()->forget('ngo_prokolpo_name');
            session()->forget('ngo_prokolpo_duration');
            session()->forget('ngo_prokolpo_start_date');
            session()->forget('ngo_prokolpo_end_date');
            session()->forget('subject_id');

            return redirect()->route('fd6StepTwo',base64_encode($fd6FormInfoId))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }else{


        Session::put('ngo_prokolpo_name', $request->ngo_prokolpo_name);
        Session::put('ngo_prokolpo_duration', $request->ngo_prokolpo_duration);
        Session::put('ngo_prokolpo_start_date', $request->ngo_prokolpo_start_date);
        Session::put('ngo_prokolpo_end_date', $request->ngo_prokolpo_end_date);
        Session::put('subject_id', $request->subject_id);

        return redirect()->back()->with('error','Please Add Prokolpo Area');
    }
    }


    public function edit($id){

        $fd6Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id) ->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$fd6Id)->latest()->get();


        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        return view('front.fd6Form.editNew',compact('thanaList','subdDistrictList','cityCorporationList','districtList','prokolpoAreaList','fd6FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }

    public function finalFdSixApplicationSubmit($id){


        $new_data_add = Fd6Form::find(base64_decode($id));
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
         $regDakData->dak_type = 'fdSix';
         $regDakData->receive_from_ngo = 1;
         $regDakData->receive_status = 1;
         $regDakData->status = 1;
         $regDakData->nothi_jat_id = 0;
         $regDakData->nothi_jat_status = 0;
         $regDakData->sent_status =null;
         $regDakData->amPmValue = $amPmValueFinal;
         $regDakData->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
         $regDakData->save();

        return redirect('/fd6Form')->with('success','Submit To Ngo Sucessfully');


    }


    public function update(Request $request,$id){

        if($request->areaId > 0){


        try{

           // dd($request->all());

            $subject_all = implode(",",$request->subject_id);

            DB::beginTransaction();

            $fd6FormInfo = Fd6Form::find($id);
            $fd6FormInfo->ngo_name =$request->ngo_name;
            $fd6FormInfo->subject_id =$subject_all;
            $fd6FormInfo->ngo_registration_date =$request->ngo_registration_date;
            $fd6FormInfo->ngo_last_renew_date =$request->ngo_last_renew_date;
            $fd6FormInfo->ngo_expiration_date =$request->ngo_expiration_date;
            $fd6FormInfo->ngo_address =$request->ngo_address;
            $fd6FormInfo->ngo_registration_number =$request->ngo_registration_number;
            $fd6FormInfo->ngo_telephone_number =$request->ngo_telephone_number;
            $fd6FormInfo->ngo_mobile_number =$request->ngo_mobile_number;
            $fd6FormInfo->ngo_email_address =$request->ngo_email_address;
            $fd6FormInfo->ngo_website =$request->ngo_website;
            $fd6FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
            $fd6FormInfo->ngo_prokolpo_duration =$request->ngo_prokolpo_duration;
            $fd6FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
            $fd6FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
            $fd6FormInfo->save();

            $input = $request->all();

            $fd6FormInfoId = $fd6FormInfo->id;

            Fd6FormProkolpoArea::where('user_id',Auth::user()->id)
            ->where('upload_type',0)
       ->update([
           'upload_type' => 1,
           'fd6_form_id' =>$fd6FormInfoId
        ]);

        DB::commit();
        return redirect()->route('fd6StepTwoEdit',base64_encode($fd6FormInfoId))->with('success','Updated Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }else{

        return redirect()->back()->with('error','Please Add Prokolpo Area');
    }
    }



    public function show($id){

        $fd6Id = base64_decode($id);

//dd($fd6Id);
try{
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $fd2FormList = Fd2Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fd_six_form_id',$fd6Id)->latest()->first();

        if(!$fd2FormList){
            $fd2OtherInfo = Fd2FormOtherInfo::where('fd2_form_id',0)->latest()->get();
            $fd2AllFormLastYearDetailForFd2 = Fd2AllFormLastYearDetail::where('main_id',0)
        ->where('type','fd6fd2')
        ->get();
        }else{
            $fd2OtherInfo = Fd2FormOtherInfo::where('fd2_form_id',$fd2FormList->id)->latest()->get();
            $fd2AllFormLastYearDetailForFd2 = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
        ->where('type','fd6fd2')
        ->get();
        }


        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$fd6Id)->latest()->get();

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();
        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $expectedResultDetail = ExpectedResult::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $districtWiseList = DistrictWiseActivity::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $fd6ProjectManagement = Fd6ProjectManagement::where('fd6_form_id',$fd6Id)->first();
        $fd6GovernanceAndTransparency = Fd6GovernanceAndTransparency::where('fd6_form_id',$fd6Id)->first();
        $fd6StepThree = Fd6StepThree::where('fd6_form_id',$fd6Id)->first();

        $partnerDataPostList = Fd6PartnerNgo::where('fd6_form_id',$fd6Id)->latest()->get();
    $employeeDataPostList = Fd6AdjoiningB::where('fd6_form_id',$fd6Id)->latest()->get();

    $fd6AdjoiningAList = Fd6AdjoiningA::where('fd6_form_id',$fd6Id)->first();
    $fd6AdjoiningCList = Fd6AdjoiningC::where('fd6_form_id',$fd6Id)->first();
    $fd6AdjoiningDList = Fd6AdjoiningD::where('fd6_form_id',$fd6Id)->first();



    $detailAsPerForm6 = DetailAsPerForm6::where('fd6_form_id',$fd6Id)->latest()->get();

    $fd6AdjoiningEList = Fd6AdjoiningE::where('fd6_form_id',$fd6Id)->first();

    $fd6FurnitureEquipments = Fd6FurnitureEquipment::where('fd6_form_id',$fd6Id)
    ->where('stepFiveType','আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা')->latest()->get();

    $fd6FurnitureEquipmentsOne = Fd6FurnitureEquipment::where('fd6_form_id',$fd6Id)
    ->where('stepFiveType','মেশিনপত্রের বর্ণনা')->latest()->get();

    $fd6FurnitureEquipmentsTwo = Fd6FurnitureEquipment::where('fd6_form_id',$fd6Id)
    ->where('stepFiveType','যানবাহনের বর্ণনা')->latest()->get();

    $fd6AdjoiningGList = Fd6AdjoiningG::where('fd6_form_id',$fd6Id)->latest()->get();


    $fd6FormEstimateListFirst = EstimateCost::where('fd6_form_id',$fd6Id)
    ->where('year_status',1)
    ->latest()->first();
$fd6FormEstimateListSecond = EstimateCost::where('fd6_form_id',$fd6Id)
    ->where('year_status',2)
    ->latest()->first();
$fd6FormEstimateListThird = EstimateCost::where('fd6_form_id',$fd6Id)
    ->where('year_status',3)
    ->latest()->first();
$fd6FormEstimateListFourth = EstimateCost::where('fd6_form_id',$fd6Id)
    ->where('year_status',4)
    ->latest()->first();
$fd6FormEstimateListFifth = EstimateCost::where('fd6_form_id',$fd6Id)
    ->where('year_status',5)
    ->latest()->first();

$fd6FormEstimateListMax = EstimateCost::where('fd6_form_id',$fd6Id)
    ->max('year_status');
    $fd6FormEstimateListComment = EstimateCost::where('fd6_form_id',$fd6Id)
    ->whereNotNull('comment')
    ->orderBy('id','desc')->value('comment');
$prokolpoPriod = EstimateCost::where('fd6_form_id',$fd6Id)->latest()->get();

        return view('front.fd6Form.newview',compact('fd6FormEstimateListComment','prokolpoPriod','fd6FormEstimateListMax','fd6FormEstimateListFifth','fd6FormEstimateListFourth','fd6FormEstimateListThird','fd6FormEstimateListSecond','fd6FormEstimateListFirst','fd2AllFormLastYearDetailForFd2','fd6AdjoiningGList','fd6FurnitureEquipmentsTwo','fd6FurnitureEquipmentsOne','fd6FurnitureEquipments','fd6AdjoiningEList','detailAsPerForm6','fd6AdjoiningDList','fd6AdjoiningCList','fd6AdjoiningAList','employeeDataPostList','partnerDataPostList','fd6StepThree','fd6GovernanceAndTransparency','fd6ProjectManagement','districtWiseList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd2OtherInfo','fd2FormList','cityCorporationList','districtList','prokolpoAreaList','fd6FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));
    } catch (\Exception $e) {
       // DB::rollBack();
        return redirect()->route('error_404');
    }
    }


    public function destroy($id){
        try{
            DB::beginTransaction();

            $admins = Fd6Form::find($id);
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


    public function ProjectProposalFormPdfDownload($id){

        $get_file_data = Fd6Form::where('id',$id)->value('project_proposal_form');

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

    public function showExpenseDataInModal(Request $request){

        $fd6FormList = Fd6Form::where('id',$request->fd6Id)->latest()->first();
        $prokolpoYearId = $request->get_id_from_main;
        $data = view('front.fd6Form._partial.showExpenseDataInModal',compact('fd6FormList','prokolpoYearId'))->render();
        return response()->json($data);

    }

    public function prokolpoAreaForFd6Update(Request $request){
        $form= Fd6FormProkolpoArea::find($request->mainId);
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

        $prokolpoAreaList = Fd6FormProkolpoArea::where('user_id',Auth::user()->id)

        ->where('upload_type',0)->get();
        }else{

            $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$request->mainEditId)

            ->get();


        }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd6Form._partial.prokolpoAreaTable',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);

    }

    public function prokolpoAreaForFd6(Request $request){




        $form= new Fd6FormProkolpoArea();

        if($request->mainEditId == 0){
            $form->user_id =Auth::user()->id;
        $form->upload_type =0;
            }else{
                $form->fd6_form_id =$request->mainEditId;
                $form->user_id =Auth::user()->id;
                $form->upload_type =1;
            }
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

        $prokolpoAreaList = Fd6FormProkolpoArea::where('user_id',Auth::user()->id)

        ->where('upload_type',0)->get();
        }else{

            $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$request->mainEditId)

            ->get();


        }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd6Form._partial.prokolpoAreaTable',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);



    }





    public function prokolpoAreaForFd6Delete(Request $request){

        $admins = Fd6FormProkolpoArea::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        if($request->mainEditId == 0){

            $prokolpoAreaList = Fd6FormProkolpoArea::where('user_id',Auth::user()->id)

            ->where('upload_type',0)->get();
            }else{

                $prokolpoAreaList = Fd6FormProkolpoArea::where('fd6_form_id',$request->mainEditId)

                ->get();


            }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd6Form._partial.prokolpoAreaTable',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);


    }


    public function fd6StepTwo($id){



        $fd6Id = base64_decode($id);
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();
        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $expectedResultDetail = ExpectedResult::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $districtWiseList = DistrictWiseActivity::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();
    $thanaList = DB::table('civilinfos')
    ->groupBy('thana_bn')->select('thana_bn')->get();


    $stepTwoGoalData = DB::table('goals')->get();
    $stepTwoTargetData = DB::table('targets')->get();
    $stepTwoIndicatorData = DB::table('indicators')->get();


    $fd6FormEstimateListFirst = EstimateCost::where('fd6_form_id',$fd6Id)
    ->where('year_status',1)
    ->latest()->first();
$fd6FormEstimateListSecond = EstimateCost::where('fd6_form_id',$fd6Id)
    ->where('year_status',2)
    ->latest()->first();
$fd6FormEstimateListThird = EstimateCost::where('fd6_form_id',$fd6Id)
    ->where('year_status',3)
    ->latest()->first();
$fd6FormEstimateListFourth = EstimateCost::where('fd6_form_id',$fd6Id)
    ->where('year_status',4)
    ->latest()->first();
$fd6FormEstimateListFifth = EstimateCost::where('fd6_form_id',$fd6Id)
    ->where('year_status',5)
    ->latest()->first();

$fd6FormEstimateListMax = EstimateCost::where('fd6_form_id',$fd6Id)
    ->max('year_status');
    $fd6FormEstimateListComment = EstimateCost::where('fd6_form_id',$fd6Id)
    ->whereNotNull('comment')
    ->orderBy('id','desc')->value('comment');
$prokolpoPriod = EstimateCost::where('fd6_form_id',$fd6Id)->latest()->get();

        return view('front.fd6Form.fd6StepTwo',compact('stepTwoIndicatorData','stepTwoTargetData','stepTwoGoalData','fd6FormEstimateListComment','prokolpoPriod','fd6FormEstimateListMax','fd6FormEstimateListFifth','fd6FormEstimateListFourth','fd6FormEstimateListThird','fd6FormEstimateListSecond','fd6FormEstimateListFirst','cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));
    }


    public function fd6StepThree($id){


        $fd6Id = base64_decode($id);
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();
        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $expectedResultDetail = ExpectedResult::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $districtWiseList = DistrictWiseActivity::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();
    $thanaList = DB::table('civilinfos')
    ->groupBy('thana_bn')->select('thana_bn')->get();

        return view('front.fd6Form.fd6StepThree',compact('cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }

    public function fd6StepFive($id){
        $fd6Id = base64_decode($id);
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();
        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $expectedResultDetail = ExpectedResult::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $districtWiseList = DistrictWiseActivity::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();
    $thanaList = DB::table('civilinfos')
    ->groupBy('thana_bn')->select('thana_bn')->get();

    $partnerDataPostList = Fd6PartnerNgo::where('fd6_form_id',$fd6Id)->latest()->get();
    $employeeDataPostList = Fd6AdjoiningB::where('fd6_form_id',$fd6Id)->latest()->get();

    $detailAsPerForm6 = DetailAsPerForm6::where('fd6_form_id',$fd6Id)->latest()->get();

    $fd6FurnitureEquipments = Fd6FurnitureEquipment::where('fd6_form_id',$fd6Id)
    ->where('stepFiveType','আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা')->latest()->get();

    $fd6FurnitureEquipmentsOne = Fd6FurnitureEquipment::where('fd6_form_id',$fd6Id)
    ->where('stepFiveType','মেশিনপত্রের বর্ণনা')->latest()->get();

    $fd6FurnitureEquipmentsTwo = Fd6FurnitureEquipment::where('fd6_form_id',$fd6Id)
    ->where('stepFiveType','যানবাহনের বর্ণনা')->latest()->get();

    $fd6AdjoiningGList = Fd6AdjoiningG::where('fd6_form_id',$fd6Id)->latest()->get();
    return view('front.fd6Form.fd6StepFive',compact('fd6AdjoiningGList','fd6FurnitureEquipmentsTwo','fd6FurnitureEquipmentsOne','fd6FurnitureEquipments','detailAsPerForm6','employeeDataPostList','partnerDataPostList','cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));
    }

    public function fd6StepFour($id){

        $fd6Id = base64_decode($id);
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();
        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $expectedResultDetail = ExpectedResult::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->get();
        $districtWiseList = DistrictWiseActivity::where('main_id',$fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();
    $thanaList = DB::table('civilinfos')
    ->groupBy('thana_bn')->select('thana_bn')->get();

    $partnerDataPostList = Fd6PartnerNgo::where('fd6_form_id',$fd6Id)->latest()->get();
    $employeeDataPostList = Fd6AdjoiningB::where('fd6_form_id',$fd6Id)->latest()->get();

    return view('front.fd6Form.fd6StepFour',compact('employeeDataPostList','partnerDataPostList','cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function estimatedExpensesFd6Update(Request $request){

        $fd6FormInfo = EstimateCost::find($request->main_id);
        $fd6FormInfo->grants_received_from_abroad =$request->grants_received_from_abroad;
        $fd6FormInfo->donations_made_by_foreign_donors	 =$request->donations_made_by_foreign_donors;
        $fd6FormInfo->local_grants =$request->local_grants;
        $fd6FormInfo->fd6_form_id =$request->fd6Id;
        $fd6FormInfo->grant_total =$request->grants_total;
        $fd6FormInfo->prokolpo_year_grant_start_date =$request->prokolpo_year_grant_start_date;
        $fd6FormInfo->prokolpo_year_grant_end_date =$request->prokolpo_year_grant_end_date;
        $fd6FormInfo->comment =$request->comment_grant;
        $fd6FormInfo->prokolpo_year_grant =$request->prokolpo_year_grant;
        if($request->prokolpo_year_grant == '১ম বছর'){
            $fd6FormInfo->year_status =1;
        }elseif($request->prokolpo_year_grant == '২য় বছর'){
            $fd6FormInfo->year_status =2;
        }elseif($request->prokolpo_year_grant == '৩য় বছর'){
            $fd6FormInfo->year_status =3;
        }elseif($request->prokolpo_year_grant == '৪র্থ বছর'){
            $fd6FormInfo->year_status =4;
        }elseif($request->prokolpo_year_grant == '৫ম বছর'){
            $fd6FormInfo->year_status =5;
        }
        $fd6FormInfo->save();



        if(!empty($request->comment_grant)){
        EstimateCost::where('fd6_form_id',$request->fd6Id)
       ->update([
           'comment' => $request->comment_grant
        ]);
    }

       $fd6FormEstimateListFirst = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->where('year_status',1)
                                  ->latest()->first();
        $fd6FormEstimateListSecond = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->where('year_status',2)
                                  ->latest()->first();
        $fd6FormEstimateListThird = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->where('year_status',3)
                                  ->latest()->first();
        $fd6FormEstimateListFourth = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->where('year_status',4)
                                  ->latest()->first();
        $fd6FormEstimateListFifth = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->where('year_status',5)
                                  ->latest()->first();

        $fd6FormEstimateListMax = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->max('year_status');

                                  $fd6FormEstimateListComment = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->whereNotNull('comment')
                                  ->orderBy('id','desc')->value('comment');

       $prokolpoPriod = EstimateCost::where('fd6_form_id',$request->fd6Id)->latest()->get();

       $data = view('front.fd6Form.estimatedExpensesFd6',compact('fd6FormEstimateListComment','fd6FormEstimateListMax','fd6FormEstimateListFifth','fd6FormEstimateListFourth','fd6FormEstimateListThird','fd6FormEstimateListSecond','fd6FormEstimateListFirst'))->render();
       $prokolpoPriodData = view('front.fd6Form.prokolpoPriodData',compact('prokolpoPriod'))->render();
       
       $response = [
        'data' => $data,
        'prokolpoPriodData' => $prokolpoPriodData
    ];
    
    
    return response()->json($response);

    }


    public function checkProkolpoYear(Request $request){

        $checkDataAvailableOrNot = EstimateCost::where('prokolpo_year_grant',$request->yearValue)
                               ->where('fd6_form_id',$request->fd6Id)->count('id');


        $msg = 'আপনি ইতিমধ্যেই '.$request->yearValue.' এর তথ্য যোগ করেছেন';


                               $response = [
                                'data' => $checkDataAvailableOrNot,
                                'prokolpoMsg' => $msg
                            ];
                            
                            
                            return response()->json($response);
    }


    public function estimatedExpensesFd6(Request $request){


       // dd($request->all());

        $fd6FormInfo = new EstimateCost();
        $fd6FormInfo->grants_received_from_abroad =$request->grants_received_from_abroad;
        $fd6FormInfo->donations_made_by_foreign_donors	 =$request->donations_made_by_foreign_donors;
        $fd6FormInfo->local_grants =$request->local_grants;
        $fd6FormInfo->fd6_form_id =$request->fd6Id;
        $fd6FormInfo->grant_total =$request->grants_total;
        $fd6FormInfo->prokolpo_year_grant_start_date =$request->prokolpo_year_grant_start_date;
        $fd6FormInfo->prokolpo_year_grant_end_date =$request->prokolpo_year_grant_end_date;
        $fd6FormInfo->comment =$request->comment_grant;
        $fd6FormInfo->prokolpo_year_grant =$request->prokolpo_year_grant;
        if($request->prokolpo_year_grant == '১ম বছর'){
            $fd6FormInfo->year_status =1;
        }elseif($request->prokolpo_year_grant == '২য় বছর'){
            $fd6FormInfo->year_status =2;
        }elseif($request->prokolpo_year_grant == '৩য় বছর'){
            $fd6FormInfo->year_status =3;
        }elseif($request->prokolpo_year_grant == '৪র্থ বছর'){
            $fd6FormInfo->year_status =4;
        }elseif($request->prokolpo_year_grant == '৫ম বছর'){
            $fd6FormInfo->year_status =5;
        }
        $fd6FormInfo->save();



        if(!empty($request->comment_grant)){
        EstimateCost::where('fd6_form_id',$request->fd6Id)
       ->update([
           'comment' => $request->comment_grant
        ]);
    }

       $fd6FormEstimateListFirst = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->where('year_status',1)
                                  ->latest()->first();
        $fd6FormEstimateListSecond = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->where('year_status',2)
                                  ->latest()->first();
        $fd6FormEstimateListThird = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->where('year_status',3)
                                  ->latest()->first();
        $fd6FormEstimateListFourth = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->where('year_status',4)
                                  ->latest()->first();
        $fd6FormEstimateListFifth = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->where('year_status',5)
                                  ->latest()->first();

        $fd6FormEstimateListMax = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->max('year_status');

                                  $fd6FormEstimateListComment = EstimateCost::where('fd6_form_id',$request->fd6Id)
                                  ->whereNotNull('comment')
                                  ->orderBy('id','desc')->value('comment');

       $prokolpoPriod = EstimateCost::where('fd6_form_id',$request->fd6Id)->latest()->get();

       $data = view('front.fd6Form.estimatedExpensesFd6',compact('fd6FormEstimateListComment','fd6FormEstimateListMax','fd6FormEstimateListFifth','fd6FormEstimateListFourth','fd6FormEstimateListThird','fd6FormEstimateListSecond','fd6FormEstimateListFirst'))->render();
       $prokolpoPriodData = view('front.fd6Form.prokolpoPriodData',compact('prokolpoPriod'))->render();
       
       $response = [
        'data' => $data,
        'prokolpoPriodData' => $prokolpoPriodData
    ];
    
    
    return response()->json($response);

    }


    public function fd6ExpectedResultTarget(Request $request){

        $form= new ExpectedResult();
        $form->main_id=$request->fd6Id;
        $form->type='fd6';
        $form->multiplicative=$request->multiplicative;
        $form->number_reader=$request->number_reader;
        $form->duration=$request->duration;
        $form->save();

        $expectedResultDetail = ExpectedResult::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->get();

        $fd6Id=$request->fd6Id;

        $data = view('front.fd6Form.fd6ExpectedResultTable',compact('expectedResultDetail','fd6Id'))->render();
        return response()->json($data);


    }

    public function fd6ExpectedResultUpdate(Request $request){

        $form= ExpectedResult::find($request->mainId);
        $form->multiplicative=$request->multiplicative;
        $form->number_reader=$request->number_reader;
        $form->duration=$request->duration;
        $form->save();

        $expectedResultDetail = ExpectedResult::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->get();
        $fd6Id=$request->fd6Id;
        $data = view('front.fd6Form.fd6ExpectedResultTable',compact('expectedResultDetail','fd6Id'))->render();
        return response()->json($data);

    }

    public function fd6ExpectedResultDelete(Request $request){

        $admins = ExpectedResult::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        $expectedResultDetail = ExpectedResult::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->get();
        $fd6Id=$request->fd6Id;
        $data = view('front.fd6Form.fd6ExpectedResultTable',compact('expectedResultDetail','fd6Id'))->render();
        return response()->json($data);

    }


    public function fd6Target(Request $request){

        $form= new Fd2AllFormLastYearDetail();
        $form->upload_type =1;
        $form->main_id=$request->fd6Id;
        $form->type='fd6';
        $form->prokolpoName=$request->prokolpoName;
        $form->last_year_target_real=$request->last_year_target_real;
        $form->last_year_target_financial=$request->last_year_target_financial;
        $form->last_year_achievment_real=$request->last_year_achievment_real;
        $form->target_year=$request->target_year;
        $form->total_benificiari=$request->total_benificiari;
        $form->comment=$request->comment;
        $form->save();

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->get();

        $fd6Id = $request->fd6Id;

        $data = view('front.fd6Form.fd6TargetTable',compact('fd2AllFormLastYearDetail','fd6Id'))->render();
        return response()->json($data);

    }

    public function fd6TargetUpdate(Request $request){


        $form= Fd2AllFormLastYearDetail::find($request->mainId);
        $form->prokolpoName=$request->prokolpoName;
        $form->last_year_target_real=$request->last_year_target_real;
        $form->last_year_target_financial=$request->last_year_target_financial;
        $form->last_year_achievment_real=$request->last_year_achievment_real;
        $form->target_year=$request->target_year;
        $form->total_benificiari=$request->total_benificiari;
        $form->comment=$request->comment;
        $form->save();
        $fd6Id = $request->fd6Id;
        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->get();

        $data = view('front.fd6Form.fd6TargetTable',compact('fd2AllFormLastYearDetail','fd6Id'))->render();
        return response()->json($data);

    }

    public function fd6TargetDelete(Request $request){


        $admins = Fd2AllFormLastYearDetail::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $fd6Id = $request->fd6Id;

        $data = view('front.fd6Form.fd6TargetTable',compact('fd2AllFormLastYearDetail','fd6Id'))->render();
        return response()->json($data);
    }


    public function districtWiseUpdate(Request $request){


        $form= DistrictWiseActivity::find($request->mainId);
        $form->division_name=$request->division_name;
        $form->district_name=$request->district_name;
        $form->city_corparation_name=$request->city_corparation_name;
        $form->upozila_name=$request->upozila_name;
        $form->thana_name=$request->thana_name;
        $form->municipality_name=$request->municipality_name;
        $form->ward_name=$request->ward_name;
        $form->prokolpo_time=$request->prokolpo_time;
        $form->target_year=$request->target_year;
        $form->last_year_target_real=$request->last_year_target_real;
        $form->last_year_target_financial=$request->last_year_target_financial;
        $form->activities=$request->activities;
        $form->total_budget=$request->total_budget;
        $form->comment=$request->comment;
        $form->save();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

        $districtWiseList = DistrictWiseActivity::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();

    $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
    $fd6Id=$request->fd6Id;
        $data = view('front.fd6Form.districtWise',compact('fd6Id','cityCorporationList','thanaList','divisionList','subdDistrictList','districtList','districtWiseList'))->render();
        return response()->json($data);


    }


    public function districtWise(Request $request){


        $form= new DistrictWiseActivity();
        $form->main_id=$request->fd6Id;
        $form->type='fd6';
        $form->division_name=$request->division_name;
        $form->district_name=$request->district_name;
        $form->city_corparation_name=$request->city_corparation_name;
        $form->upozila_name=$request->upozila_name;
        $form->thana_name=$request->thana_name;
        $form->municipality_name=$request->municipality_name;
        $form->ward_name=$request->ward_name;
        $form->prokolpo_time=$request->prokolpo_time;
        $form->target_year=$request->target_year;
        $form->last_year_target_real=$request->last_year_target_real;
        $form->last_year_target_financial=$request->last_year_target_financial;
        $form->activities=$request->activities;
        $form->total_budget=$request->total_budget;
        $form->comment=$request->comment;
        $form->save();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

        $districtWiseList = DistrictWiseActivity::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();

    $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

    $fd6Id=$request->fd6Id;

        $data = view('front.fd6Form.districtWise',compact('fd6Id','cityCorporationList','thanaList','divisionList','subdDistrictList','districtList','districtWiseList'))->render();
        return response()->json($data);

    }
    public function fd6FormStepTwoSDG(Request $request){


    //dd($request->all());
        $form= new SDGDevelopmentGoal();
        $form->fc1_form_id=$request->fd6Id;
        $form->type='fd6';
        $form->goal=$request->goal;
        $form->target=$request->target;
        $form->indicator=$request->indicator;
        $form->budget_allocation=$request->budget_allocation;
        $form->rationality=$request->rationality;
        $form->comment=$request->comment;
        $form->save();

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();



        $data = view('front.fd6Form.fd6FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
        return response()->json($data);
    }

    public function fd6FormStepTwoSDGUpdate(Request $request){

        $form= SDGDevelopmentGoal::find($request->mainId);
        $form->goal=$request->goal;
        $form->target=$request->target;
        $form->indicator=$request->indicator;
        $form->budget_allocation=$request->budget_allocation;
        $form->rationality=$request->rationality;
        $form->comment=$request->comment;
        $form->save();

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $data = view('front.fd6Form.fd6FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
        return response()->json($data);

    }

    public function fd6FormStepTwoSDGDelete(Request $request){


        $admins = SDGDevelopmentGoal::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $SDGDevelopmentGoal = SDGDevelopmentGoal::where('fc1_form_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $data = view('front.fd6Form.fd6FormStepTwoSDG',compact('SDGDevelopmentGoal'))->render();
        return response()->json($data);
    }


    public function districtWiseDelete(Request $request){

        $admins = DistrictWiseActivity::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $districtWiseList = DistrictWiseActivity::where('main_id',$request->fd6Id)
        ->where('type','fd6')
        ->latest()->get();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

        $districtList = DB::table('civilinfos')->groupBy('district_bn')
        ->select('district_bn')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
        ->select('thana_bn')->get();

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')
        ->select('division_bn')->get();

        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')
        ->select('thana_bn')->get();

        $fd6Id=$request->fd6Id;

        $data = view('front.fd6Form.districtWise',compact('fd6Id','cityCorporationList','thanaList','divisionList','subdDistrictList','districtList','districtWiseList'))->render();
        return response()->json($data);

    }


    public function fd6StepTwoMainPost(Request $request){


        try{
            //dd($request->all());
            DB::beginTransaction();

            $fd6FormInfo = Fd6Form::find($request->fd6Id);
            $fd6FormInfo->estimated_expenses =$request->estimated_expenses;
            $fd6FormInfo->donor_organization_name =$request->donor_organization_name;
            $fd6FormInfo->donor_organization_address =$request->donor_organization_address;
            $fd6FormInfo->donor_organization_phone_mobile_email =$request->donor_organization_phone_mobile_email;
            $fd6FormInfo->donor_organization_mobile =$request->donor_organization_mobile;
            $fd6FormInfo->donor_organization_email =$request->donor_organization_email;
            $fd6FormInfo->donor_organization_website =$request->donor_organization_website;
            $fd6FormInfo->money_laundering_and_terrorist_financing =$request->money_laundering_and_terrorist_financing;
            $fd6FormInfo->security_council_check =$request->security_council_check;
            $fd6FormInfo->introduction_and_background =$request->introduction_and_background;
            $fd6FormInfo->rationality_and_plan =$request->rationality_and_plan;
            $fd6FormInfo->rationale_project_araea =$request->rationale_project_araea;
            $fd6FormInfo->sdg_objective_file =$request->sdg_objective_file;

            if ($request->hasfile('expected_result_file')) {
                $filePath="FdSixForm";
                $file = $request->file('expected_result_file');

                $fd6FormInfo->expected_result_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('estimated_expenses_file')) {
                $filePath="FdSixForm";
                $file = $request->file('estimated_expenses_file');

                $fd6FormInfo->estimated_expenses_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('sdg_file')) {
                $filePath="FdSixForm";
                $file = $request->file('sdg_file');

                $fd6FormInfo->sdg_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('target_from_perspective_file')) {
                $filePath="FdSixForm";
                $file = $request->file('target_from_perspective_file');

                $fd6FormInfo->target_from_perspective_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('district_wise_activity_file')) {
                $filePath="FdSixForm";
                $file = $request->file('district_wise_activity_file');

                $fd6FormInfo->district_wise_activity_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            $fd6FormInfo->save();

        DB::commit();
        return redirect()->route('fd6StepThree',base64_encode($fd6FormInfo->id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function fd6StepThreeMainPost(Request $request){


        try{
            //dd($request->all());
            DB::beginTransaction();

            $fd6ProjectManagement = new Fd6ProjectManagement();
            $fd6ProjectManagement->fd6_form_id =$request->fd6Id;
            $fd6ProjectManagement->implementation_of_activities =$request->implementation_of_activities;
            $fd6ProjectManagement->associate_NGO_detail =$request->associate_NGO_detail;
            $fd6ProjectManagement->details_of_project_Officers_and_employees =$request->details_of_project_Officers_and_employees;
            $fd6ProjectManagement->construction_details =$request->construction_details;
            $fd6ProjectManagement->financial_sector_sub_sector_wise_allocation=$request->financial_sector_sub_sector_wise_allocation;
            $fd6ProjectManagement->project_sustained_and_managed =$request->project_sustained_and_managed;
            $fd6ProjectManagement->save();

            $fd6GovernanceAndTransparency = new Fd6GovernanceAndTransparency();
            $fd6GovernanceAndTransparency->fd6_form_id =$request->fd6Id;
            $fd6GovernanceAndTransparency->private_individuals_advice =$request->private_individuals_advice;
            $fd6GovernanceAndTransparency->govt_ongoing_activities =$request->govt_ongoing_activities;
            $fd6GovernanceAndTransparency->similar_project_run_previously =$request->similar_project_run_previously;
            $fd6GovernanceAndTransparency->project_in_form_no_eight =$request->project_in_form_no_eight;
            $fd6GovernanceAndTransparency->audit_report =$request->audit_report;
            $fd6GovernanceAndTransparency->annual_report =$request->annual_report;
            $fd6GovernanceAndTransparency->action_plan_with_budget =$request->action_plan_with_budget;
            $fd6GovernanceAndTransparency->beneficiary_database =$request->beneficiary_database;
            $fd6GovernanceAndTransparency->detailed_results_of_the_project =$request->detailed_results_of_the_project;
            $fd6GovernanceAndTransparency->complaints_detail =$request->complaints_detail;
            $fd6GovernanceAndTransparency->focal_point_name_mobile_email =$request->focal_point_name_mobile_email;
            $fd6GovernanceAndTransparency->online_training =$request->online_training;
            $fd6GovernanceAndTransparency->save();


            $fd6StepThree = new Fd6StepThree();
            $fd6StepThree->fd6_form_id =$request->fd6Id;
            $fd6StepThree->previous_project_detail =$request->previous_project_detail;
            $fd6StepThree->receipt_of_audit_report =$request->receipt_of_audit_report;
            $fd6StepThree->new_phase_project =$request->new_phase_project;
            $fd6StepThree->annual_allocation_to_beneficiaries =$request->annual_allocation_to_beneficiaries;
            $fd6StepThree->ratio_of_expenditure =$request->ratio_of_expenditure;
            $fd6StepThree->project_benifit =$request->project_benifit;

            if ($request->hasfile('detailed_budget_statement')) {
                $filePath="FdSixForm";
                $file = $request->file('detailed_budget_statement');

                $fd6StepThree->detailed_budget_statement =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('project_implementation_cost')) {
                $filePath="FdSixForm";
                $file = $request->file('project_implementation_cost');

                $fd6StepThree->project_implementation_cost =CommonController::pdfUpload($request,$file,$filePath);

            }
            $fd6StepThree->save();

        DB::commit();
        return redirect()->route('fd6StepFour',base64_encode($request->fd6Id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }

    public function partnerDataPost(Request $request){

        $form=new Fd6PartnerNgo();
        $form->fd6_form_id=$request->fd6Id;
        $form->division_name=$request->division_name;
        $form->district_name=$request->district_name;
        $form->city_corparation_name=$request->city_corparation_name;
        $form->upozila_name=$request->upozila_name;
        $form->thana_name=$request->thana_name;
        $form->municipality_name=$request->municipality_name;
        $form->ward_name=$request->ward_name;
        $form->partner_ngo_name=$request->partner_ngo_name;
        $form->partner_ngo_address=$request->partner_ngo_address;
        $form->partner_ngo_telephone=$request->partner_ngo_telephone;
        $form->partner_ngo_mobile=$request->partner_ngo_mobile;
        $form->partner_ngo_email=$request->partner_ngo_email;
        $form->partner_ngo_reg_name=$request->partner_ngo_reg_name;
        $form->partner_ngo_duration=$request->partner_ngo_duration;

        $form->partner_ngo_work_detail=$request->partner_ngo_work_detail;
        $form->budget_detail=$request->budget_detail;
        $form->execution_deadline=$request->execution_deadline;
        $form->beneficiary=$request->beneficiary;
        $form->save();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

        $partnerDataPostList = Fd6PartnerNgo::where('fd6_form_id',$request->fd6Id)

        ->latest()->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();

    $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

    $fd6Id=$request->fd6Id;

        $data = view('front.fd6Form.partnerNgoTable',compact('fd6Id','cityCorporationList','thanaList','divisionList','subdDistrictList','districtList','partnerDataPostList'))->render();
        return response()->json($data);

    }

    public function employeeDataPost(Request $request){


        $form=new Fd6AdjoiningB();
        $form->fd6_form_id=$request->fd6Id;
        $form->name=$request->name;
        $form->designation=$request->designation;
        $form->nationality=$request->nationality;
        $form->duration=$request->duration;
        $form->educational_qualification=$request->educational_qualification;
        $form->experience=$request->experience;
        $form->responsibility=$request->responsibility;
        $form->salary_from_this_project=$request->salary_from_this_project;
        $form->salary_from_other_project=$request->salary_from_other_project;
        $form->save();

        $employeeDataPostList = Fd6AdjoiningB::where('fd6_form_id',$request->fd6Id)

        ->latest()->get();

        $fd6Id = $request->fd6Id;

        $data = view('front.fd6Form.employeeTable',compact('employeeDataPostList','fd6Id'))->render();
        return response()->json($data);

    }

    public function employeeDataUpdate(Request $request){


        $form=Fd6AdjoiningB::find($request->mainId);
        $form->name=$request->name;
        $form->designation=$request->designation;
        $form->nationality=$request->nationality;
        $form->duration=$request->duration;
        $form->educational_qualification=$request->educational_qualification;
        $form->experience=$request->experience;
        $form->responsibility=$request->responsibility;
        $form->salary_from_this_project=$request->salary_from_this_project;
        $form->salary_from_other_project=$request->salary_from_other_project;
        $form->save();

        $employeeDataPostList = Fd6AdjoiningB::where('fd6_form_id',$request->fd6Id)

        ->latest()->get();

        $fd6Id = $request->fd6Id;

        $data = view('front.fd6Form.employeeTable',compact('employeeDataPostList','fd6Id'))->render();
        return response()->json($data);

    }


    public function employeeDataDelete(Request $request){

       // dd(12);

        $admins = Fd6AdjoiningB::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $employeeDataPostList = Fd6AdjoiningB::where('fd6_form_id',$request->fd6Id)

        ->latest()->get();

        $fd6Id = $request->fd6Id;

        $data = view('front.fd6Form.employeeTable',compact('employeeDataPostList','fd6Id'))->render();
        return response()->json($data);
    }

    public function partnerDataDelete(Request $request){


        $admins = Fd6PartnerNgo::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

        $partnerDataPostList = Fd6PartnerNgo::where('fd6_form_id',$request->fd6Id)

        ->latest()->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();

    $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

    $fd6Id=$request->fd6Id;

        $data = view('front.fd6Form.partnerNgoTable',compact('fd6Id','cityCorporationList','thanaList','divisionList','subdDistrictList','districtList','partnerDataPostList'))->render();
        return response()->json($data);



    }

    public function partnerDataUpdate(Request $request){

        $form=Fd6PartnerNgo::find($request->mainId);
        $form->division_name=$request->division_name;
        $form->district_name=$request->district_name;
        $form->city_corparation_name=$request->city_corparation_name;
        $form->upozila_name=$request->upozila_name;
        $form->thana_name=$request->thana_name;
        $form->municipality_name=$request->municipality_name;
        $form->ward_name=$request->ward_name;
        $form->partner_ngo_name=$request->partner_ngo_name;
        $form->partner_ngo_address=$request->partner_ngo_address;
        $form->partner_ngo_telephone=$request->partner_ngo_telephone;
        $form->partner_ngo_mobile=$request->partner_ngo_mobile;
        $form->partner_ngo_email=$request->partner_ngo_email;
        $form->partner_ngo_reg_name=$request->partner_ngo_reg_name;
        $form->partner_ngo_duration=$request->partner_ngo_duration;

        $form->partner_ngo_work_detail=$request->partner_ngo_work_detail;
        $form->budget_detail=$request->budget_detail;
        $form->execution_deadline=$request->execution_deadline;
        $form->beneficiary=$request->beneficiary;
        $form->save();

        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();

        $partnerDataPostList = Fd6PartnerNgo::where('fd6_form_id',$request->fd6Id)

        ->latest()->get();

    $districtList = DB::table('civilinfos')->groupBy('district_bn')
    ->select('district_bn')->get();
    $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')
    ->select('thana_bn')->get();

    $divisionList = DB::table('civilinfos')->groupBy('division_bn')
    ->select('division_bn')->get();

    $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
 $fd6Id=$request->fd6Id;
        $data = view('front.fd6Form.partnerNgoTable',compact('fd6Id','cityCorporationList','thanaList','divisionList','subdDistrictList','districtList','partnerDataPostList'))->render();
        return response()->json($data);

    }


    public function fd6StepFourMainPost(Request $request){


        //dd(12);

        try{

          

        $form=new Fd6AdjoiningA();
        $form->fd6_form_id=$request->fd6Id;
        $form->grant_amount_in_cash=$request->grant_amount_in_cash;
        $form->strategic_coperation=$request->strategic_coperation;
        $form->help_with_product=$request->help_with_product;
        $form->other=$request->other;
        $form->project_implementation_area=$request->project_implementation_area;
        $form->other_information_note=$request->other_information_note;
        if ($request->hasfile('copy_of_contract')) {
            $filePath="Fd6AdjoiningA";
            $file = $request->file('copy_of_contract');

            $form->copy_of_contract =CommonController::pdfUpload($request,$file,$filePath);

        }
        $form->save();

        $formOne=new Fd6AdjoiningC();
        $formOne->fd6_form_id=$request->fd6Id;
        $formOne->proof_of_land_ownership=$request->proof_of_land_ownership;
        $formOne->land_development_tax=$request->land_development_tax;
        $formOne->engineer_name=$request->engineer_name;
        $formOne->engineer_desi=$request->engineer_desi;
        //$formOne->construction_layout=$request->construction_layout;
        $formOne->estimated_expenses=$request->estimated_expenses;
        if ($request->hasfile('construction_layout')) {
            $filePath="Fd6AdjoiningC";
            $file = $request->file('construction_layout');

            $form->construction_layout =CommonController::pdfUpload($request,$file,$filePath);

        }
        if (!empty($request->image_base64)) {

            $filePath="ngoHead";
            $file = $request->file('digital_signature');
            $formOne->engineer_sign =CommonController::storeBase64($request->image_base64);

            }


        if (!empty($request->image_seal_base64)) {

            $filePath="ngoHead";
            $file = $request->file('digital_seal');
            $formOne->engineer_seal =CommonController::storeBase64($request->image_seal_base64);

            }
        $formOne->save();


        $formTwo=new Fd6AdjoiningD();
        $formTwo->fd6_form_id=$request->fd6Id;
        $formTwo->prokolpo_name=$request->prokolpo_name;
        $formTwo->prokolpo_duration=$request->prokolpo_duration;
        $formTwo->total_allocation=$request->total_allocation;
        $formTwo->total_allocation_prokolpo_area=$request->total_allocation_prokolpo_area;
        $formTwo->total_benificiare=$request->total_benificiare;
        $formTwo->total_benificiare_prokolpo_area=$request->total_benificiare_prokolpo_area;
        $formTwo->donor_name=$request->donor_name;
        $formTwo->save();

        DB::commit();
        return redirect()->route('fd6StepFive',base64_encode($request->fd6Id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }



}
