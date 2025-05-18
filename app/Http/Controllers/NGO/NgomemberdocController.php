<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\NgoMemberNidPhoto;
use App\Models\FormCompleteStatus;
use Response;
use DateTime;
use DateTimezone;
use App\Http\Controllers\NGO\CommonController;
class NgomemberdocController extends Controller
{
    public function index(){

        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
            return view('front.ngo_member_doc.index');
        }else{
            return view('front.foreign.ngo_member_doc.index');
        }



    }

    public function ngoMemberDocFinalUpdate(){

        $checkCompleteStatusData = DB::table('form_complete_statuses')->where('user_id',Auth::user()->id)->first();

        try{

            DB::beginTransaction();

                if(!$checkCompleteStatusData){

                    $newStatusData = new FormCompleteStatus();
                    $newStatusData->user_id = Auth::user()->id;
                    $newStatusData->fd_one_form_step_one_status = 1;
                    $newStatusData->fd_one_form_step_two_status = 1;
                    $newStatusData->fd_one_form_step_three_status = 1;
                    $newStatusData->fd_one_form_step_four_status = 1;
                    $newStatusData->form_eight_status = 1;
                    $newStatusData->ngo_member_status = 1;
                    $newStatusData->ngo_member_nid_photo_status = 1;
                    $newStatusData->ngo_other_document_status = 0;
                    $newStatusData->save();
                }else{

                    FormCompleteStatus::where('id', $checkCompleteStatusData->id)
                    ->update([
                        'ngo_member_nid_photo_status' => 1
                        ]);


                }
            DB::commit();
            return redirect('/ngoAllRegistrationForm');
            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('error_404');
            }
    }


    public function create(){


        return view('front.ngo_member_doc.create');


    }


    public function store(Request $request){


        $time_dy = time().date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');
        $input = $request->all();


        $request->validate([
            'member_name.*' => 'required|string',
            'member_image.*' => 'required',
            'member_nid_copy.*' => 'required',
        ]);


        $condition_main_image = $input['member_name'];
        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        try{
            DB::beginTransaction();
                foreach($condition_main_image as $key => $all_condition_main_image){

                    $file_size = number_format($input['member_nid_copy'][$key]->getSize() / 1048576,2);

                    $form= new NgoMemberNidPhoto();
                    $filePath="NgoMemberNidPhoto";
                    $file=$input['member_nid_copy'][$key];
                    $file_image=$input['member_image'][$key];

                    $form->member_image=CommonController::imageUpload($request,$file_image,$filePath);
                    $form->member_nid_copy=CommonController::pdfUpload($request,$file,$filePath);
                    $form->member_name=$input['member_name'][$key];
                    $form->time_for_api = $main_time;
                    $form->fd_one_form_id = $fdOneFormId;
                    $form->member_nid_copy_size =$file_size;
                    $form->save();
                }
            DB::commit();
            return redirect()->back()->with('success','Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function update(Request $request,$id){


        $time_dy = time().date("Ymd");
        try{
            DB::beginTransaction();

            $form= NgoMemberNidPhoto::find($id);
            $filePath="NgoMemberNidPhoto";
            if ($request->hasfile('member_nid_copy')) {

                $file = $request->file('member_nid_copy');
                $file_size = number_format($file->getSize() / 1048576,2);
                $form->member_nid_copy=CommonController::pdfUpload($request,$file,$filePath);
                $form->member_nid_copy_size =$file_size;

            }
            if ($request->hasfile('member_image')) {
            $file1 = $request->file('member_image');
            $form->member_image =CommonController::imageUpload($request,$file1,$filePath);
            }
            $form->member_name=$request->member_name;


            $form->save();
            DB::commit();
            return redirect()->back()->with('info','Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $admins = NgoMemberNidPhoto::find($id);
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

    public function ngoMemberDocumentDownload($id){

        $get_file_data = NgoMemberNidPhoto::where('id',$id)->value('member_nid_copy');

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
