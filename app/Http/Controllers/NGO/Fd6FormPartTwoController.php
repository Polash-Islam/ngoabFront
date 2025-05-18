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
use App\Models\Country;
use App\Models\EstimateCost;
use App\Models\Fd9Form;
use App\Models\ProkolpoDetail;
use App\Models\NgoDuration;
use App\Models\Fd9ForeignerEmployeeFamilyMemberList;
use Illuminate\Support\Facades\Crypt;
use DB;
use PDF;
use Mpdf\Mpdf;
use DateTime;
use DateTimezone;
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
use App\Models\Fd6AdjoiningE;
use Illuminate\Support\Facades\App;
use App\Models\DetailAsPerForm6;
use App\Models\Fd6FurnitureEquipment;
use App\Models\Fd6AdjoiningG;
class Fd6FormPartTwoController extends Controller
{


    public function fd6NewDataEditup(Request $request){

        //dd(11);

        $fd6FormList = EstimateCost::find($request->main_id);
        $main_year= $request->main_year;
        $data = view('front.fd6Form.fd6NewDataEditup',compact('fd6FormList','main_year'))->render();
        return response()->json($data);



        return 1;
    }
    public function fd6SourceOfFundDelete(Request $request){


        EstimateCost::where('id',$request->id)
       ->delete();
    

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
    public function fd6pdfview($id){

        $fd6Id = base64_decode($id);

//dd($fd6Id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $fd2FormList = Fd2Form::where('fd_one_form_id',$ngo_list_all->id)
        ->where('fd_six_form_id',$fd6Id)->latest()->first();


        if(!$fd2FormList){
            $fd2OtherInfo = Fd2FormOtherInfo::where('fd2_form_id',0)->latest()->get();
        }else{
            $fd2OtherInfo = Fd2FormOtherInfo::where('fd2_form_id',$fd2FormList->id)->latest()->get();
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





        $file_Name_Custome = 'fd_six_form';
       $data =view('front.fd6Form.fd6pdfview',[
        'fd6FormEstimateListComment'=>$fd6FormEstimateListComment,
        'prokolpoPriod'=>$prokolpoPriod,
        'fd6FormEstimateListMax'=>$fd6FormEstimateListMax,
        'fd6FormEstimateListFifth'=>$fd6FormEstimateListFifth,
        'fd6FormEstimateListFourth'=>$fd6FormEstimateListFourth,
        'fd6FormEstimateListThird'=>$fd6FormEstimateListThird,
        'fd6FormEstimateListSecond'=>$fd6FormEstimateListSecond,
        'fd6FormEstimateListFirst'=>$fd6FormEstimateListFirst,
        'fd6AdjoiningGList'=>$fd6AdjoiningGList,
        'fd6FurnitureEquipmentsTwo'=>$fd6FurnitureEquipmentsTwo,
        'fd6FurnitureEquipmentsOne'=>$fd6FurnitureEquipmentsOne,
        'fd6FurnitureEquipments'=>$fd6FurnitureEquipments,
        'fd6AdjoiningEList'=>$fd6AdjoiningEList,
        'detailAsPerForm6'=>$detailAsPerForm6,
        'fd6AdjoiningDList'=>$fd6AdjoiningDList,
        'fd6AdjoiningCList'=>$fd6AdjoiningCList,
        'fd6AdjoiningAList'=>$fd6AdjoiningAList,
        'employeeDataPostList'=>$employeeDataPostList,
        'partnerDataPostList'=>$partnerDataPostList,
        'fd6StepThree'=>$fd6StepThree,
        'fd6GovernanceAndTransparency'=>$fd6GovernanceAndTransparency,
        'fd6ProjectManagement'=>$fd6ProjectManagement,
        'districtWiseList'=>$districtWiseList,
        'expectedResultDetail'=>$expectedResultDetail,
        'fd2AllFormLastYearDetail'=>$fd2AllFormLastYearDetail,
        'SDGDevelopmentGoal'=>$SDGDevelopmentGoal,
        'fd2OtherInfo'=>$fd2OtherInfo,
        'fd2FormList'=>$fd2FormList,
        'cityCorporationList'=>$cityCorporationList,
        'districtList'=>$districtList,
        'prokolpoAreaList'=>$prokolpoAreaList,
        'fd6FormList'=>$fd6FormList,
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

    public function fd2pdfviewdfd6($id){

        $fd7Id = base64_decode($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
       $fd2FormList = Fd2Form::where('fd_one_form_id',$ngo_list_all->id)->where('fd_six_form_id',$fd7Id)->latest()->first();
       $fd2OtherInfo = Fd2FormOtherInfo::where('fd2_form_id',$fd2FormList->id)->latest()->get();
       $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
       $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
       $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
       $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
       $fd6FormList = Fd6Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd7Id)->latest()->first();

       $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
       ->where('type','fd6')
       ->get();

       $file_Name_Custome = 'fd2_form';
       $data =view('front.fd6Form.fd2pdfviewdfd6',[
        'divisionList'=>$divisionList,
        'renewWebsiteName'=>$renewWebsiteName,
        'ngoDurationLastEx'=>$ngoDurationLastEx,
        'ngoDurationReg'=>$ngoDurationReg,
        'ngo_list_all'=>$ngo_list_all,
    'fd6FormList'=>$fd6FormList,
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


    public function allPdfForFd6($title, $id){


        if($title == 'detailed_budget_statement' || $title == 'project_implementation_cost'){



            $get_file_data = Fd6StepThree::where('id',$id)->value($title);



            $file_path = url('public/'.$get_file_data);
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);
            $file= public_path('/'). $get_file_data;

            $headers = array(
                      'Content-Type: application/pdf',
                    );

            return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);




        }elseif($title == 'copy_of_contract'){

            $get_file_data = Fd6AdjoiningA::where('id',$id)->value($title);



            $file_path = url('public/'.$get_file_data);
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);
            $file= public_path('/'). $get_file_data;

            $headers = array(
                      'Content-Type: application/pdf',
                    );

            return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);

        }elseif($title == 'construction_layout'){

            $get_file_data = Fd6AdjoiningC::where('id',$id)->value($title);



            $file_path = url('public/'.$get_file_data);
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);
            $file= public_path('/'). $get_file_data;

            $headers = array(
                      'Content-Type: application/pdf',
                    );

            return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);

        }elseif($title == 'prokolpo_audit_report' || $title == 'prokolpo_final_report' || $title == 'prokolpo_local_audit_report' || $title=='after_end_prokolpo'){

            $get_file_data = Fd6AdjoiningE::where('id',$id)->value($title);
            $file_path = url('public/'.$get_file_data);
            $filename  = pathinfo($file_path, PATHINFO_FILENAME);
            $file= public_path('/'). $get_file_data;

            $headers = array(
                      'Content-Type: application/pdf',
                    );

            return Response::make(file_get_contents($file), 200, [
                'content-type'=>'application/pdf',
            ]);
        }else{


            $get_file_data = Fd6Form::where('id',$id)->value($title);



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



    public function detailsOfForm6DataPost(Request $request){

        $form= new DetailAsPerForm6();
        $form->fd6_form_id=$request->fd6Id;
        $form->work_detail=$request->work_detail;
        $form->physical_goals=$request->physical_goals;
        $form->physical_achievment=$request->physical_achievment;
        $form->financial_allocation=$request->financial_allocation;
        $form->financial_cost=$request->financial_cost;
        $form->comment=$request->comment;
        $form->save();

        $detailAsPerForm6 = DetailAsPerForm6::where('fd6_form_id',$request->fd6Id)->latest()->get();

        $data = view('front.fd6Form.partTwo.detailsOfForm6DataTable',compact('detailAsPerForm6'))->render();
        return response()->json($data);

    }


    public function dinpunjjiDataPost(Request $request){


        $form= new Fd6AdjoiningG();
        $form->fd6_form_id=$request->fd6Id;
        $form->subject=$request->subject;
        $form->seminer_date=$request->seminer_date;
        $form->seminer_time=$request->seminer_time;
        $form->seminer_place=$request->seminer_place;
        $form->seminer_number=$request->seminer_number;
        $form->seminer_budget=$request->seminer_budget;
        $form->seminer_perticipantion=$request->seminer_perticipantion;
        $form->comment=$request->comment;
        $form->save();

        $fd6AdjoiningGList = Fd6AdjoiningG::where('fd6_form_id',$request->fd6Id)->latest()->get();

        $data = view('front.fd6Form.partTwo.dinpunjjiTable',compact('fd6AdjoiningGList'))->render();
        return response()->json($data);

    }

    public function dinpunjjiDataUpdate(Request $request){


        $form= Fd6AdjoiningG::find($request->main_id);
        $form->subject=$request->subject;
        $form->seminer_date=$request->seminer_date;
        $form->seminer_time=$request->seminer_time;
        $form->seminer_place=$request->seminer_place;
        $form->seminer_number=$request->seminer_number;
        $form->seminer_budget=$request->seminer_budget;
        $form->seminer_perticipantion=$request->seminer_perticipantion;
        $form->comment=$request->comment;
        $form->save();

        $fd6AdjoiningGList = Fd6AdjoiningG::where('fd6_form_id',$request->fd6Id)->latest()->get();

        $data = view('front.fd6Form.partTwo.dinpunjjiTable',compact('fd6AdjoiningGList'))->render();
        return response()->json($data);

    }


    public function dinpunjjiDataDelete(Request $request){

        $admins = Fd6AdjoiningG::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        $fd6AdjoiningGList = Fd6AdjoiningG::where('fd6_form_id',$request->fd6Id)->latest()->get();

        $data = view('front.fd6Form.partTwo.dinpunjjiTable',compact('fd6AdjoiningGList'))->render();
        return response()->json($data);

    }


    public function adjoiningSixDataPost(Request $request){


        $form= new Fd6FurnitureEquipment();
        $form->fd6_form_id=$request->fd6Id;
        $form->stepFiveType=$request->stepFiveType;
        $form->item_name=$request->item_name;
        $form->unit_name=$request->unit_name;
        $form->item_quantity=$request->item_quantity;
        $form->item_net_price=$request->item_net_price;
        $form->item_total_price=$request->item_total_price;
        $form->save();

        if($request->stepFiveType == 'আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা'){

            $fd6FurnitureEquipments = Fd6FurnitureEquipment::where('fd6_form_id',$request->fd6Id)
                                    ->where('stepFiveType','আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা')->latest()->get();

            $data = view('front.fd6Form.partTwo.adjoiningSixDataTable',compact('fd6FurnitureEquipments'))->render();
            //return response()->json($data);
            return response()->json(["htmlData" => $data, "stepFiveType" => $request->stepFiveType]);

        }elseif($request->stepFiveType == 'মেশিনপত্রের বর্ণনা'){

            $fd6FurnitureEquipmentsOne = Fd6FurnitureEquipment::where('fd6_form_id',$request->fd6Id)
            ->where('stepFiveType','মেশিনপত্রের বর্ণনা')->latest()->get();

            $data = view('front.fd6Form.partTwo.descriptionOfMachineryTable',compact('fd6FurnitureEquipmentsOne'))->render();
            //return response()->json($data);

            return response()->json(["htmlData" => $data, "stepFiveType" => $request->stepFiveType]);

        }elseif($request->stepFiveType == 'যানবাহনের বর্ণনা'){


            $fd6FurnitureEquipmentsTwo = Fd6FurnitureEquipment::where('fd6_form_id',$request->fd6Id)
            ->where('stepFiveType','যানবাহনের বর্ণনা')->latest()->get();

            $data = view('front.fd6Form.partTwo.descriptionOfVehicle',compact('fd6FurnitureEquipmentsTwo'))->render();
            //return response()->json($data);

            return response()->json(["htmlData" => $data, "stepFiveType" => $request->stepFiveType]);

        }



    }

    public function adjoiningSixDataUpdate(Request $request){


        $form= Fd6FurnitureEquipment::find($request->main_id);
        $form->stepFiveType=$request->stepFiveType;
        $form->item_name=$request->item_name;
        $form->unit_name=$request->unit_name;
        $form->item_quantity=$request->item_quantity;
        $form->item_net_price=$request->item_net_price;
        $form->item_total_price=$request->item_total_price;
        $form->save();

        if($request->stepFiveType == 'আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা'){

            $fd6FurnitureEquipments = Fd6FurnitureEquipment::where('fd6_form_id',$request->fd6Id)
                                    ->where('stepFiveType','আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা')->latest()->get();

            $data = view('front.fd6Form.partTwo.adjoiningSixDataTable',compact('fd6FurnitureEquipments'))->render();
            //return response()->json($data);
            return response()->json(["htmlData" => $data, "stepFiveType" => $request->stepFiveType]);

        }elseif($request->stepFiveType == 'মেশিনপত্রের বর্ণনা'){

            $fd6FurnitureEquipmentsOne = Fd6FurnitureEquipment::where('fd6_form_id',$request->fd6Id)
            ->where('stepFiveType','মেশিনপত্রের বর্ণনা')->latest()->get();

            $data = view('front.fd6Form.partTwo.descriptionOfMachineryTable',compact('fd6FurnitureEquipmentsOne'))->render();
            //return response()->json($data);

            return response()->json(["htmlData" => $data, "stepFiveType" => $request->stepFiveType]);

        }elseif($request->stepFiveType == 'যানবাহনের বর্ণনা'){


            $fd6FurnitureEquipmentsTwo = Fd6FurnitureEquipment::where('fd6_form_id',$request->fd6Id)
            ->where('stepFiveType','যানবাহনের বর্ণনা')->latest()->get();

            $data = view('front.fd6Form.partTwo.descriptionOfVehicle',compact('fd6FurnitureEquipmentsTwo'))->render();
            //return response()->json($data);

            return response()->json(["htmlData" => $data, "stepFiveType" => $request->stepFiveType]);

        }



    }

    public function adjoiningSixDataDelete(Request $request){

        //dd($request->all());

        $admins = Fd6FurnitureEquipment::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        if($request->deleteEditType == 'আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা'){

            $fd6FurnitureEquipments = Fd6FurnitureEquipment::where('fd6_form_id',$request->fd6Id)
                                    ->where('stepFiveType','আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা')->latest()->get();

            $data = view('front.fd6Form.partTwo.adjoiningSixDataTable',compact('fd6FurnitureEquipments'))->render();
            //return response()->json($data);
            return response()->json(["htmlData" => $data, "stepFiveType" => $request->deleteEditType]);

        }elseif($request->deleteEditType == 'মেশিনপত্রের বর্ণনা'){

            $fd6FurnitureEquipmentsOne = Fd6FurnitureEquipment::where('fd6_form_id',$request->fd6Id)
            ->where('stepFiveType','মেশিনপত্রের বর্ণনা')->latest()->get();

            $data = view('front.fd6Form.partTwo.descriptionOfMachineryTable',compact('fd6FurnitureEquipmentsOne'))->render();
            //return response()->json($data);

            return response()->json(["htmlData" => $data, "stepFiveType" => $request->deleteEditType]);

        }elseif($request->deleteEditType == 'যানবাহনের বর্ণনা'){


            $fd6FurnitureEquipmentsTwo = Fd6FurnitureEquipment::where('fd6_form_id',$request->fd6Id)
            ->where('stepFiveType','যানবাহনের বর্ণনা')->latest()->get();

            $data = view('front.fd6Form.partTwo.descriptionOfVehicle',compact('fd6FurnitureEquipmentsTwo'))->render();
            //return response()->json($data);

            return response()->json(["htmlData" => $data, "stepFiveType" => $request->deleteEditType]);

        }

    }


    public function detailsOfForm6DataUpdate(Request $request){


        $form=DetailAsPerForm6::find($request->main_id);
        $form->work_detail=$request->work_detail;
        $form->physical_goals=$request->physical_goals;
        $form->physical_achievment=$request->physical_achievment;
        $form->financial_allocation=$request->financial_allocation;
        $form->financial_cost=$request->financial_cost;
        $form->comment=$request->comment;
        $form->save();

        $detailAsPerForm6 = DetailAsPerForm6::where('fd6_form_id',$request->fd6Id)->latest()->get();

        $data = view('front.fd6Form.partTwo.detailsOfForm6DataTable',compact('detailAsPerForm6'))->render();
        return response()->json($data);


    }


    public function detailsOfForm6DataDelete(Request $request){


        $admins = DetailAsPerForm6::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        $detailAsPerForm6 = DetailAsPerForm6::where('fd6_form_id',$request->fd6Id)->latest()->get();

        $data = view('front.fd6Form.partTwo.detailsOfForm6DataTable',compact('detailAsPerForm6'))->render();
        return response()->json($data);


    }

    public function fd6StepTwoEdit($id){



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

        return view('front.fd6Form.partTwo.fd6StepTwoEdit',compact('stepTwoIndicatorData','stepTwoTargetData','stepTwoGoalData','fd6FormEstimateListComment','prokolpoPriod','fd6FormEstimateListMax','fd6FormEstimateListFifth','fd6FormEstimateListFourth','fd6FormEstimateListThird','fd6FormEstimateListSecond','fd6FormEstimateListFirst','cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));
    }


    public function fd6StepThreeEdit($id){


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

        $fd6ProjectManagement = Fd6ProjectManagement::where('fd6_form_id',$fd6Id)->first();
        $fd6GovernanceAndTransparency = Fd6GovernanceAndTransparency::where('fd6_form_id',$fd6Id)->first();
        $fd6StepThree = Fd6StepThree::where('fd6_form_id',$fd6Id)->first();

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

    if(!$fd6ProjectManagement || !$fd6GovernanceAndTransparency || !$fd6StepThree){
        return view('front.fd6Form.fd6StepThree',compact('fd6StepThree','fd6GovernanceAndTransparency','fd6ProjectManagement','cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));
    }else{

        return view('front.fd6Form.partTwo.fd6StepThreeEdit',compact('fd6StepThree','fd6GovernanceAndTransparency','fd6ProjectManagement','cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));
    }
    }



    public function fd6StepFourEdit($id){

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

    $fd6AdjoiningAList = Fd6AdjoiningA::where('fd6_form_id',$fd6Id)->first();
    $fd6AdjoiningCList = Fd6AdjoiningC::where('fd6_form_id',$fd6Id)->first();
    $fd6AdjoiningDList = Fd6AdjoiningD::where('fd6_form_id',$fd6Id)->first();

    if(!$fd6AdjoiningAList || !$fd6AdjoiningCList || !$fd6AdjoiningDList){
        return view('front.fd6Form.fd6StepFour',compact('fd6AdjoiningDList','fd6AdjoiningCList','fd6AdjoiningAList','employeeDataPostList','partnerDataPostList','cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));
    }else{

    return view('front.fd6Form.partTwo.fd6StepFourEdit',compact('fd6AdjoiningDList','fd6AdjoiningCList','fd6AdjoiningAList','employeeDataPostList','partnerDataPostList','cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));
    }
    }


    public function fd6StepFiveEdit($id){
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

    $fd6AdjoiningEList = Fd6AdjoiningE::where('fd6_form_id',$fd6Id)->first();

    $fd6FurnitureEquipments = Fd6FurnitureEquipment::where('fd6_form_id',$fd6Id)
    ->where('stepFiveType','আসবাবপত্র ও অফিস-যন্ত্রপাতির বর্ণনা')->latest()->get();

    $fd6FurnitureEquipmentsOne = Fd6FurnitureEquipment::where('fd6_form_id',$fd6Id)
    ->where('stepFiveType','মেশিনপত্রের বর্ণনা')->latest()->get();

    $fd6FurnitureEquipmentsTwo = Fd6FurnitureEquipment::where('fd6_form_id',$fd6Id)
    ->where('stepFiveType','যানবাহনের বর্ণনা')->latest()->get();

    $fd6AdjoiningGList = Fd6AdjoiningG::where('fd6_form_id',$fd6Id)->latest()->get();

    if(!$fd6AdjoiningEList){
        return view('front.fd6Form.fd6StepFive',compact('fd6AdjoiningEList','fd6AdjoiningGList','fd6FurnitureEquipmentsTwo','fd6FurnitureEquipmentsOne','fd6FurnitureEquipments','detailAsPerForm6','employeeDataPostList','partnerDataPostList','cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }else{
    return view('front.fd6Form.partTwo.fd6StepFiveEdit',compact('fd6AdjoiningEList','fd6AdjoiningGList','fd6FurnitureEquipmentsTwo','fd6FurnitureEquipmentsOne','fd6FurnitureEquipments','detailAsPerForm6','employeeDataPostList','partnerDataPostList','cityCorporationList','thanaList','districtWiseList','divisionList','subdDistrictList','districtList','expectedResultDetail','fd2AllFormLastYearDetail','SDGDevelopmentGoal','fd6FormList','fd6Id','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));
}
    }


    public function fd6StepFiveMainUpdate(Request $request){


        //dd($request->all());

        try{
            DB::beginTransaction();
        $fd6FormInfo = Fd6AdjoiningE::find($request->fd6AdjoiningEListId);
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
            return redirect()->route('fd2Form.edit',base64_encode($request->fd6Id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function fd6StepFourMainUpdate(Request $request){

        try{

          

        $form=Fd6AdjoiningA::find($request->fd6AdjoiningAListId);
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

        $formOne=Fd6AdjoiningC::find($request->fd6AdjoiningCListId);
        $formOne->fd6_form_id=$request->fd6Id;
        $formOne->proof_of_land_ownership=$request->proof_of_land_ownership;
        $formOne->land_development_tax=$request->land_development_tax;
        $formOne->engineer_name=$request->engineer_name;
        $formOne->engineer_desi=$request->engineer_desi;
       // $formOne->construction_layout=$request->construction_layout;

       if ($request->hasfile('construction_layout')) {
        $filePath="Fd6AdjoiningC";
        $file = $request->file('construction_layout');

        $formOne->construction_layout =CommonController::pdfUpload($request,$file,$filePath);

    }

        $formOne->estimated_expenses=$request->estimated_expenses;
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


        $formTwo=Fd6AdjoiningD::find($request->fd6AdjoiningDListId);
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
        return redirect()->route('fd6StepFiveEdit',base64_encode($request->fd6Id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }

    public function fd6StepThreeMainUpdate(Request $request){


        try{
            //dd($request->all());
            DB::beginTransaction();

            $fd6ProjectManagement = Fd6ProjectManagement::find($request->fd6ProjectManagementId);
            $fd6ProjectManagement->fd6_form_id =$request->fd6Id;
            $fd6ProjectManagement->implementation_of_activities =$request->implementation_of_activities;
            $fd6ProjectManagement->associate_NGO_detail =$request->associate_NGO_detail;
            $fd6ProjectManagement->details_of_project_Officers_and_employees =$request->details_of_project_Officers_and_employees;
            $fd6ProjectManagement->construction_details =$request->construction_details;
            $fd6ProjectManagement->financial_sector_sub_sector_wise_allocation=$request->financial_sector_sub_sector_wise_allocation;
            $fd6ProjectManagement->project_sustained_and_managed =$request->project_sustained_and_managed;
            $fd6ProjectManagement->save();

            $fd6GovernanceAndTransparency =Fd6GovernanceAndTransparency::find($request->fd6GovernanceAndTransparencyId);
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


            $fd6StepThree = Fd6StepThree::find($request->fd6StepThreeId);
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
        return redirect()->route('fd6StepFourEdit',base64_encode($request->fd6Id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function fd6StepTwoMainUpdate(Request $request){


        try{
           // dd($request->all());
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

            if ($request->hasfile('estimated_expenses_file')) {
                $filePath="FdSixForm";
                $file = $request->file('estimated_expenses_file');

                $fd6FormInfo->estimated_expenses_file =CommonController::pdfUpload($request,$file,$filePath);

            }

            if ($request->hasfile('expected_result_file')) {
                $filePath="FdSixForm";
                $file = $request->file('expected_result_file');

                $fd6FormInfo->expected_result_file =CommonController::pdfUpload($request,$file,$filePath);

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
        return redirect()->route('fd6StepThreeEdit',base64_encode($fd6FormInfo->id))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }
}
