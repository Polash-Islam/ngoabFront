<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Models\FormEight;
use App\Models\FdFiveForm;
use App\Models\FdOneForm;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NameChangeDoc;
use App\Models\NgoMemberNidPhoto;
use App\Models\NgoRenewInfo;
use Auth;
use Mpdf\Mpdf;
use App;
use Session;
use DateTime;
use DateTimezone;
use App\Models\DakListDetail;
use App\Models\NgoNameChange;
use App\Models\FdFiveReceivedGood;
use App\Models\FdFiveReceivedGoodUse;
use App\Models\DocumentForAmendmentOrApprovalOfConstitution;
use Illuminate\Support\Str;
use App\Http\Controllers\NGO\CommonController;
class FdFiveFormController extends Controller
{

    public function fdFiveReceivedGoodsUsedUpdate(Request $request){

        $fd5FormInfo = FdFiveReceivedGoodUse::find($request->mainId);
        $fd5FormInfo->organization_usage_volume =$request->organization_usage_volume;
        $fd5FormInfo->person_detail =$request->person_detail;
        $fd5FormInfo->details_of_any_goods_sold =$request->details_of_any_goods_sold;
        $fd5FormInfo->goods_transferred_detail =$request->goods_transferred_detail;
        $fd5FormInfo->detail_of_goods_medium =$request->detail_of_goods_medium;
        $fd5FormInfo->details_of_remaining_goods =$request->details_of_remaining_goods;
        $fd5FormInfo->status =0;
        $fd5FormInfo->user_id =Auth::user()->id;
        if (!empty($request->bureau_approval_file_hidden)) {

            $fd5FormInfo->bureau_approval_file_goods_sold =CommonController::storeBasePdf64($request->bureau_approval_file_hidden);

            }
        if (!empty($request->bureau_approval_file_transferred_hidden)) {

            $fd5FormInfo->bureau_approval_file_transferred_detail =CommonController::storeBasePdf64($request->bureau_approval_file_transferred_hidden);

        }
        if (!empty($request->bureau_approval_file_goods_medium_hidden)) {

            $fd5FormInfo->bureau_approval_file_goods_medium =CommonController::storeBasePdf64($request->bureau_approval_file_goods_medium_hidden);

        }
        $fd5FormInfo->save();



        if($request->mainEditId == 0){

            $receivedGoodUsedList = FdFiveReceivedGoodUse::where('user_id',Auth::user()->id)

            ->where('status',0)->get();
            }else{

                $receivedGoodUsedList = FdFiveReceivedGoodUse::where('fd5_form_id',$request->mainEditId)

                ->get();


            }


            $data = view('front.fdFiveForm._partial.receivedGoodsUsedTable',compact('receivedGoodUsedList'))->render();
            return response()->json($data);

    }

    public function fdFiveReceivedGoodsUsedPost(Request $request){

        $fd5FormInfo = new FdFiveReceivedGoodUse();
        $fd5FormInfo->organization_usage_volume =$request->organization_usage_volume;
        $fd5FormInfo->person_detail =$request->person_detail;
        $fd5FormInfo->details_of_any_goods_sold =$request->details_of_any_goods_sold;
        $fd5FormInfo->goods_transferred_detail =$request->goods_transferred_detail;
        $fd5FormInfo->detail_of_goods_medium =$request->detail_of_goods_medium;
        $fd5FormInfo->details_of_remaining_goods =$request->details_of_remaining_goods;
        $fd5FormInfo->status =0;
        $fd5FormInfo->user_id =Auth::user()->id;
        if (!empty($request->bureau_approval_file_hidden)) {

            $fd5FormInfo->bureau_approval_file_goods_sold =CommonController::storeBasePdf64($request->bureau_approval_file_hidden);

            }
        if (!empty($request->bureau_approval_file_transferred_hidden)) {

            $fd5FormInfo->bureau_approval_file_transferred_detail =CommonController::storeBasePdf64($request->bureau_approval_file_transferred_hidden);

        }
        if (!empty($request->bureau_approval_file_goods_medium_hidden)) {

            $fd5FormInfo->bureau_approval_file_goods_medium =CommonController::storeBasePdf64($request->bureau_approval_file_goods_medium_hidden);

        }
        $fd5FormInfo->save();



        if($request->mainEditId == 0){

            $receivedGoodUsedList = FdFiveReceivedGoodUse::where('user_id',Auth::user()->id)

            ->where('status',0)->get();
            }else{

                $receivedGoodUsedList = FdFiveReceivedGoodUse::where('fd5_form_id',$request->mainEditId)

                ->get();


            }


            $data = view('front.fdFiveForm._partial.receivedGoodsUsedTable',compact('receivedGoodUsedList'))->render();
            return response()->json($data);
    }

    public function fdFiveReceivedGoodsUsedDelete(Request $request){

        $admins = FdFiveReceivedGoodUse::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        if($request->mainEditId == 0){

            $receivedGoodUsedList = FdFiveReceivedGoodUse::where('user_id',Auth::user()->id)

            ->where('status',0)->get();
            }else{

                $receivedGoodUsedList = FdFiveReceivedGoodUse::where('fd5_form_id',$request->mainEditId)

                ->get();


            }


            $data = view('front.fdFiveForm._partial.receivedGoodsUsedTable',compact('receivedGoodUsedList'))->render();
            return response()->json($data);

    }


    public function fdFiveReceivedGoodsPost(Request $request){

        $fd5FormInfo = new FdFiveReceivedGood();
        $fd5FormInfo->source_received_date =$request->source_received_date;
        $fd5FormInfo->source_of_goods_name =$request->source_of_goods_name;
        $fd5FormInfo->source_of_goods_address =$request->source_of_goods_address;
        $fd5FormInfo->actual_of_receipt_source =$request->actual_of_receipt_source;
        $fd5FormInfo->purpose_of_receipt_goods =$request->purpose_of_receipt_goods;
        $fd5FormInfo->amount_of_material_received =$request->amount_of_material_received;
        $fd5FormInfo->estimated_value_of_goods =$request->estimated_value_of_goods;
        $fd5FormInfo->date_of_project_approval =$request->date_of_project_approval;
        $fd5FormInfo->date_of_Commitment =$request->date_of_Commitment;
        $fd5FormInfo->status =0;
        $fd5FormInfo->user_id =Auth::user()->id;
        $fd5FormInfo->save();



        if($request->mainEditId == 0){

            $receivedGoodList = FdFiveReceivedGood::where('user_id',Auth::user()->id)

            ->where('status',0)->get();
            }else{

                $receivedGoodList = FdFiveReceivedGood::where('fd5_form_id',$request->mainEditId)

                ->get();


            }


            $data = view('front.fdFiveForm._partial.receivedGoodsTable',compact('receivedGoodList'))->render();
            return response()->json($data);

    }

    public function fdFiveReceivedGoodsUpdate(Request $request){



        $fd5FormInfo = FdFiveReceivedGood::find($request->mainId);
        $fd5FormInfo->source_received_date =$request->source_received_date;
        $fd5FormInfo->source_of_goods_name =$request->source_of_goods_name;
        $fd5FormInfo->source_of_goods_address =$request->source_of_goods_address;
        $fd5FormInfo->actual_of_receipt_source =$request->actual_of_receipt_source;
        $fd5FormInfo->purpose_of_receipt_goods =$request->purpose_of_receipt_goods;
        $fd5FormInfo->amount_of_material_received =$request->amount_of_material_received;
        $fd5FormInfo->estimated_value_of_goods =$request->estimated_value_of_goods;
        $fd5FormInfo->date_of_project_approval =$request->date_of_project_approval;
        $fd5FormInfo->date_of_Commitment =$request->date_of_Commitment;
        $fd5FormInfo->save();



        if($request->mainEditId == 0){

            $receivedGoodList = FdFiveReceivedGood::where('user_id',Auth::user()->id)->where('status',0)->get();
        }else{

            $receivedGoodList = FdFiveReceivedGood::where('fd5_form_id',$request->mainEditId)->get();

        }


            $data = view('front.fdFiveForm._partial.receivedGoodsTable',compact('receivedGoodList'))->render();
            return response()->json($data);

    }



    public function fdFiveReceivedGoodsDelete(Request $request){
        $admins = FdFiveReceivedGood::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        if($request->mainEditId == 0){

            $receivedGoodList = FdFiveReceivedGood::where('user_id',Auth::user()->id)->where('status',0)->get();
        }else{

            $receivedGoodList = FdFiveReceivedGood::where('fd5_form_id',$request->mainEditId)->get();

        }


            $data = view('front.fdFiveForm._partial.receivedGoodsTable',compact('receivedGoodList'))->render();
            return response()->json($data);
    }



    public function index(){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fdFiveForm =  FdFiveForm::where('fdId',$ngoListAll->id)->latest()->get();

        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        return view('front.fdFiveForm.index',compact('ngoListAll','fdFiveForm'));

    }


    public function create(){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fdFiveForm =  FdFiveForm::where('fdId',$ngoListAll->id)->latest()->get();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngoListAll->id)->value('web_site_name');
        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();
        $receivedGoodList = FdFiveReceivedGood::where('user_id',Auth::user()->id)

        ->where('status',0)->get();

        $receivedGoodUsedList = FdFiveReceivedGoodUse::where('user_id',Auth::user()->id)

        ->where('status',0)->get();
        return view('front.fdFiveForm.newAddForm',compact('receivedGoodUsedList','receivedGoodList','renewWebsiteName','ngoListAll','fdFiveForm'));
    }



    public function store(Request $request){

        $request->validate([

            'ngo_name' => 'required',
            'ngo_address' => 'required',
            'ngo_telephone_number' => 'required',
            'ngo_mobile_number' => 'required',
            'ngo_email' => 'required',
            'ngo_website' => 'required',

        ]);


        try{
            DB::beginTransaction();
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $fdFiveForm = new FdFiveForm();
            $fdFiveForm->status = 'Review';
            $fdFiveForm->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fdFiveForm->fdId = $ngo_list_all->id;
            $fdFiveForm->ngo_name = $request->ngo_name;
            $fdFiveForm->ngo_address = $request->ngo_address;
            $fdFiveForm->ngo_telephone_number = $request->ngo_telephone_number;
            $fdFiveForm->ngo_mobile_number = $request->ngo_mobile_number;
            $fdFiveForm->ngo_email = $request->ngo_email;
            $fdFiveForm->ngo_website = $request->ngo_website;
            $fdFiveForm->chief_name = $request->chief_name;
            $fdFiveForm->chief_desi = $request->chief_desi;
            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $fdFiveForm->digital_signature =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $fdFiveForm->digital_seal =CommonController::storeBase64($request->image_seal_base64);

                }

            $fdFiveForm->save();

            $fd5FormInfoId = $fdFiveForm->id;


            FdFiveReceivedGoodUse::where('user_id',Auth::user()->id)
            ->where('status',0)
       ->update([
           'status' => 1,
           'fd5_form_id' =>$fd5FormInfoId
        ]);

        FdFiveReceivedGood::where('user_id',Auth::user()->id)
            ->where('status',0)
       ->update([
           'status' => 1,
           'fd5_form_id' =>$fd5FormInfoId
        ]);

        DB::commit();
        return redirect()->route('fdFiveForm.show',base64_encode($fdFiveForm->id))->with('success','Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }




    public function edit($id){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fdFiveForm =  FdFiveForm::where('id',base64_decode($id))->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngoListAll->id)
        ->value('web_site_name');

        $receivedGoodList = FdFiveReceivedGood::where('fd5_form_id',base64_decode($id))->get();
        $receivedGoodUsedList = FdFiveReceivedGoodUse::where('fd5_form_id',base64_decode($id))->get();

        return view('front.fdFiveForm.edit',compact('receivedGoodUsedList','receivedGoodList','renewWebsiteName','ngoListAll','fdFiveForm'));
    }

    public function fdFiveFormSend($id){

        try{


        $fd3FormInfo = FdFiveForm::find(base64_decode($id));
        $fd3FormInfo->status ='Ongoing';
        $fd3FormInfo->save();


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
         $regDakData->dak_type = 'fdFive';
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


    public function update(Request $request,$id){

      try{
            DB::beginTransaction();
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $fdFiveForm = FdFiveForm::find($id);
            $fdFiveForm->ngo_name = $request->ngo_name;
            $fdFiveForm->ngo_address = $request->ngo_address;
            $fdFiveForm->ngo_telephone_number = $request->ngo_telephone_number;
            $fdFiveForm->ngo_mobile_number = $request->ngo_mobile_number;
            $fdFiveForm->ngo_email = $request->ngo_email;
            $fdFiveForm->ngo_website = $request->ngo_website;
            $fdFiveForm->chief_name = $request->chief_name;
            $fdFiveForm->chief_desi = $request->chief_desi;
            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $fdFiveForm->digital_signature =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $fdFiveForm->digital_seal =CommonController::storeBase64($request->image_seal_base64);

                }

            $fdFiveForm->save();

            $fd5FormInfoId = $fdFiveForm->id;


            FdFiveReceivedGoodUse::where('user_id',Auth::user()->id)
            ->where('status',0)
       ->update([
           'status' => 1,
           'fd5_form_id' =>$fd5FormInfoId
        ]);

        FdFiveReceivedGood::where('user_id',Auth::user()->id)
            ->where('status',0)
       ->update([
           'status' => 1,
           'fd5_form_id' =>$fd5FormInfoId
        ]);

        DB::commit();
        return redirect()->route('fdFiveForm.index')->with('success','Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }



    public function show($id){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fdFiveForm =  FdFiveForm::where('id',base64_decode($id))->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        $receivedGoodList = FdFiveReceivedGood::where('fd5_form_id',base64_decode($id))->get();
        $receivedGoodUsedList = FdFiveReceivedGoodUse::where('fd5_form_id',base64_decode($id))->get();

        return view('front.fdFiveForm.view',compact('receivedGoodUsedList','receivedGoodList','ngoListAll','fdFiveForm'));
    }

    public function fdFiveFormPdf($id){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');

        $ngoListAll = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fdFiveForm =  FdFiveForm::where('id',base64_decode($id))->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        $receivedGoodList = FdFiveReceivedGood::where('fd5_form_id',base64_decode($id))->get();
        $receivedGoodUsedList = FdFiveReceivedGoodUse::where('fd5_form_id',base64_decode($id))->get();



        $file_Name_Custome = 'fd_five_form';
        $data =view('front.fdFiveForm.fdFiveFormPdf',['receivedGoodUsedList'=>$receivedGoodUsedList,'receivedGoodList'=>$receivedGoodList,'fdFiveForm'=>$fdFiveForm,'ngoListAll'=>$ngoListAll])->render();


       $pdfFilePath =$file_Name_Custome.'.pdf';


       $mpdf = new Mpdf([ 'default_font_size' => 14,'default_font' => 'nikosh']);
       $mpdf->WriteHTML($data);
       $mpdf->Output($pdfFilePath, "I");
       die();

    }





    public function fdFiveReceivedGoodsUsedpdf($title,$id){


        $form_one_data = FdFiveReceivedGoodUse::where('id',$id)->value($title);

        $file_path = url('public/'.$form_one_data);
        $filename  = pathinfo($file_path, PATHINFO_FILENAME);
        $file= public_path('/'). $form_one_data;
        $headers = array(
        'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
        'content-type'=>'application/pdf',
        ]);

    }


    public function destroy($id){
        try{
            DB::beginTransaction();
            $admins = FdFiveForm::find($id);
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
