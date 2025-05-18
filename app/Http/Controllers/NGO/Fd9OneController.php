<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NVisa;
use App\Models\Country;
use App\Models\Fd9Form;
use App\Models\Fd9OneForm;
use App\Models\Fd9ForeignerEmployeeFamilyMemberList;
use Illuminate\Support\Facades\Crypt;
use DB;
use Mpdf\Mpdf;
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
use Illuminate\Support\Facades\App;
class Fd9OneController extends Controller
{
    public function index(){

        $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd9OneList = Fd9OneForm::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        return view('front.fd9OneForm.index',compact('ngo_list_all','fd9OneList'));

    }


    public function create(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        return view('front.fd9OneForm.newAddForm',compact('ngo_list_all'));

    }


    public function edit($id){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd9OneList = Fd9OneForm::where('id',$id)->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        return view('front.fd9OneForm.edit',compact('ngo_list_all','fd9OneList'));


    }

    public function show($id){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd9OneList = Fd9OneForm::where('id',base64_decode($id))->first();

        CommonController::checkNgotype(1);

        $mainNgoType = CommonController::changeView();

        $nVisaEdit = NVisa::where('fd9_one_form_id',base64_decode($id))->with(['nVisaParticularOfSponsorOrEmployer','nVisaParticularsOfForeignIncumbnet','nVisaEmploymentInformation','nVisaWorkPlaceAddress','nVisaAuthorizedPersonalOfTheOrg','nVisaNecessaryDocumentForWorkPermit','nVisaManpowerOfTheOffice'])->first();

        return view('front.fd9OneForm.show',compact('nVisaEdit','ngo_list_all','fd9OneList'));

    }

    public function fd9OneChief(Request $request){
        $name = $request->name;
        $designation = $request->designation;
        $id = $request->id;

         return $data = url('mainPdfDownload/'.base64_encode($id));

    }

    public function store(Request $request){


        $request->validate([

            'digital_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:60|dimensions:width=300,height=80',
            'digital_seal' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:80|dimensions:width=300,height=100',

            'foreigner_name_for_subject' => 'required|string',
            'sarok_number' => 'required|string',
            'application_date' => 'required|string',
            'institute_name' => 'required|string',
            'prokolpo_name' => 'required|string',
            'designation_name' => 'required|string',
            'foreigner_name_for_body' => 'required|string',
            'expire_to_date' => 'required|string',
            'expire_from_date' => 'required|string',
            'arrival_date_in_nvisa' => 'required|string',
            'proposed_from_date' => 'required|string',
            'proposed_to_date' => 'required|string',
            'attestation_of_appointment_letter' => 'required|file',
            'copy_of_form_nine' => 'required|file',
            'foreigner_image' => 'required|file',
            'copy_of_nvisa' => 'required|file',
        ]);
        try{
            DB::beginTransaction();


            $fdOneFormId = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fd9OneFormInfo = new Fd9OneForm();
            $fd9OneFormInfo->fd_one_form_id = $fdOneFormId->id;
            $fd9OneFormInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fd9OneFormInfo->chief_name = $request->chief_name;
            $fd9OneFormInfo->chief_desi = $request->chief_desi;
            $fd9OneFormInfo->status = 'Review';
            $fd9OneFormInfo->foreigner_name_for_subject = $request->foreigner_name_for_subject;
            $fd9OneFormInfo->sarok_number = $request->sarok_number;
            $fd9OneFormInfo->application_date = $request->application_date;
            $fd9OneFormInfo->institute_name = $request->institute_name;
            $fd9OneFormInfo->prokolpo_name = $request->prokolpo_name;
            $fd9OneFormInfo->designation_name = $request->designation_name;
            $fd9OneFormInfo->foreigner_name_for_body = $request->foreigner_name_for_body;
            $fd9OneFormInfo->expire_to_date = $request->expire_to_date;
            $fd9OneFormInfo->expire_from_date = $request->expire_from_date;
            $fd9OneFormInfo->arrival_date_in_nvisa = $request->arrival_date_in_nvisa;
            $fd9OneFormInfo->proposed_from_date = $request->proposed_from_date;
            $fd9OneFormInfo->proposed_to_date = $request->proposed_to_date;


            if ($request->hasfile('verified_fd_nine_one_form')) {
                $filePath="ngoHead";
                $file = $request->file('verified_fd_nine_one_form');
                $fd9OneFormInfo->verified_fd_nine_one_form =CommonController::imageUpload($request,$file,$filePath);

            }


            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $fd9OneFormInfo->digital_signature =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $fd9OneFormInfo->digital_seal =CommonController::storeBase64($request->image_seal_base64);

                }


            if ($request->hasfile('attestation_of_appointment_letter')) {
            $filePath="fd9OneFormInfo";
            $file = $request->file('attestation_of_appointment_letter');
            $fd9OneFormInfo->attestation_of_appointment_letter =CommonController::pdfUpload($request,$file,$filePath);

        }
        if ($request->hasfile('foreigner_image')) {
            $filePath="fd9OneFormInfo";
            $file = $request->file('foreigner_image');
            $fd9OneFormInfo->foreigner_image =CommonController::imageUpload($request,$file,$filePath);

        }


            if ($request->hasfile('copy_of_nvisa')) {
            $filePath="fd9OneFormInfo";
            $file = $request->file('copy_of_nvisa');
            $fd9OneFormInfo->copy_of_nvisa =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('copy_of_form_nine')) {
            $filePath="fd9OneFormInfo";
            $file = $request->file('copy_of_form_nine');
            $fd9OneFormInfo->copy_of_form_nine =CommonController::pdfUpload($request,$file,$filePath);

        }


            $fd9OneFormInfo->save();

            $id = $fd9OneFormInfo->id;
            DB::commit();
            return redirect()->route('addnVisaDetail',$id)->with('success','Addedd Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function finalFdNineOneApplicationSubmit($id){


        $new_data_add = Fd9OneForm::find(base64_decode($id));
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
         $regDakData->dak_type = 'fdNineOne';
         $regDakData->receive_from_ngo = 1;
         $regDakData->receive_status = 1;
         $regDakData->status = 1;
         $regDakData->nothi_jat_id = 0;
         $regDakData->nothi_jat_status = 0;
         $regDakData->sent_status =null;
         $regDakData->amPmValue = $amPmValueFinal;
         $regDakData->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
         $regDakData->save();

        return redirect('/fdNineOneForm')->with('success','Submit To Ngo Sucessfully');


    }


    public function update(Request $request,$id){

        try{

            DB::beginTransaction();

            $nVisaId = NVisa::where('fd9_one_form_id',$id)->value('id');

            $fd9OneFormInfo =Fd9OneForm::find($id);

            $fd9OneFormInfo->foreigner_name_for_subject = $request->foreigner_name_for_subject;
            $fd9OneFormInfo->sarok_number = $request->sarok_number;
            $fd9OneFormInfo->chief_name = $request->chief_name;
            $fd9OneFormInfo->chief_desi = $request->chief_desi;
            $fd9OneFormInfo->application_date = $request->application_date;
            $fd9OneFormInfo->institute_name = $request->institute_name;
            $fd9OneFormInfo->prokolpo_name = $request->prokolpo_name;
            $fd9OneFormInfo->designation_name = $request->designation_name;
            $fd9OneFormInfo->foreigner_name_for_body = $request->foreigner_name_for_body;
            $fd9OneFormInfo->expire_to_date = $request->expire_to_date;
            $fd9OneFormInfo->expire_from_date = $request->expire_from_date;
            $fd9OneFormInfo->arrival_date_in_nvisa = $request->arrival_date_in_nvisa;
            $fd9OneFormInfo->proposed_from_date = $request->proposed_from_date;
            $fd9OneFormInfo->proposed_to_date = $request->proposed_to_date;

            if ($request->hasfile('verified_fd_nine_one_form')) {
                $filePath="ngoHead";
                $file = $request->file('verified_fd_nine_one_form');
                $fd9OneFormInfo->verified_fd_nine_one_form =CommonController::imageUpload($request,$file,$filePath);

            }


            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $fd9OneFormInfo->digital_signature =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $fd9OneFormInfo->digital_seal =CommonController::storeBase64($request->image_seal_base64);

                }


            if ($request->hasfile('attestation_of_appointment_letter')) {
            $filePath="fd9OneFormInfo";
            $file = $request->file('attestation_of_appointment_letter');
            $fd9OneFormInfo->attestation_of_appointment_letter =CommonController::pdfUpload($request,$file,$filePath);

        }
        if ($request->hasfile('foreigner_image')) {
            $filePath="fd9OneFormInfo";
            $file = $request->file('foreigner_image');
            $fd9OneFormInfo->foreigner_image =CommonController::imageUpload($request,$file,$filePath);

        }


            if ($request->hasfile('copy_of_nvisa')) {
            $filePath="fd9OneFormInfo";
            $file = $request->file('copy_of_nvisa');
            $fd9OneFormInfo->copy_of_nvisa =CommonController::pdfUpload($request,$file,$filePath);

        }

        if ($request->hasfile('copy_of_form_nine')) {
            $filePath="fd9OneFormInfo";
            $file = $request->file('copy_of_form_nine');
            $fd9OneFormInfo->copy_of_form_nine =CommonController::pdfUpload($request,$file,$filePath);

        }


            $fd9OneFormInfo->save();

        $id = $fd9OneFormInfo->id;
        DB::commit();
        if(empty($nVisaId)){

            return redirect()->route('addnVisaDetail',$id);

        }else{

        return redirect()->route('nVisa.edit',$nVisaId)->with('success','Update Successfully');

    }


    }
    catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_404');
    }
    }

    public function destroy($id){

        try{

            DB::beginTransaction();

            $admins = Fd9OneForm::find($id);
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


    public function fd9OneFormExtraPdfDownload($cat,$id){

        if($cat == 'appointment'){

            $get_file_data = Fd9OneForm::where('id',base64_decode($id))->value('attestation_of_appointment_letter');
        }elseif($cat == 'form9Copy'){

            $get_file_data = Fd9OneForm::where('id',base64_decode($id))->value('copy_of_form_nine');

        }elseif($cat == 'copyNvisa'){

            $get_file_data = Fd9OneForm::where('id',base64_decode($id))->value('copy_of_nvisa');

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


    public function niyogPotroDownload($id){

        $get_file_data = Fd9OneForm::where('id',$id)->value('attestation_of_appointment_letter');

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


    public function formNinePdfDownload($id){

        $get_file_data = Fd9OneForm::where('id',$id)->value('copy_of_form_nine');

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

    public function nVisaCopyDownload($id){

        $get_file_data = Fd9OneForm::where('id',$id)->value('copy_of_nvisa');

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


    public function mainPdfDownload($id){

        $id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd9OneList = Fd9OneForm::where('id',$id)->first();

        $file_Name_Custome = "Fd9.1_Form";

        $data =view('front.fd9OneForm.mainPdfDownload',[

            'ngo_list_all'=>$ngo_list_all,
            'fd9OneList'=>$fd9OneList

        ])->render();


        $pdfFilePath =$file_Name_Custome.'.pdf';

        $mpdf = new Mpdf(['default_font_size' => 14, 'default_font' => 'nikosh']);
        $mpdf->WriteHTML($data);
        $mpdf->Output($pdfFilePath, "I");
        die();

    }

    public function mainPdfUpload(Request $request){

        $fd9OneFormInfo = Fd9OneForm::find($request->id);

        if ($request->hasfile('verified_fd_nine_one_form')) {

            $filePath="fd9OneFormInfo";
            $file = $request->file('verified_fd_nine_one_form');
            $fd9OneFormInfo->verified_fd_nine_one_form =CommonController::pdfUpload($request,$file,$filePath);

        }

        $fd9OneFormInfo->save();


        return redirect()->back()->with('success','Update Successfully');
    }
}
