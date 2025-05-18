<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use App\Models\NgoMemberList;
use App\Models\FormCompleteStatus;
use DateTime;
use DateTimezone;
use App\Http\Controllers\NGO\CommonController;
class NgomemberController extends Controller
{
    public function index(){


        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if($mainNgoType== 'দেশিও'){
        return view('front.ngomember.index');
        }else{
            return view('front.foreign.ngomember.index');
        }
    }

    public function create(){
        return view('front.ngomember.create');

    }

    public function edit($id){
        $all_data_list = NgoMemberList::where('name_slug',$id)->first();

        return view('front.ngomember.edit',compact('all_data_list'));

    }


    public function ngoMemberFinalUpdate(){
        try{
            DB::beginTransaction();
        $checkCompleteStatusData = DB::table('form_complete_statuses')
   ->where('user_id',Auth::user()->id)
   ->first();

   if(!$checkCompleteStatusData){

       $newStatusData = new FormCompleteStatus();
       $newStatusData->user_id = Auth::user()->id;
       $newStatusData->fd_one_form_step_one_status = 1;
       $newStatusData->fd_one_form_step_two_status = 1;
       $newStatusData->fd_one_form_step_three_status = 1;
       $newStatusData->fd_one_form_step_four_status = 1;
       $newStatusData->form_eight_status = 1;
       $newStatusData->ngo_member_status = 1;
       $newStatusData->ngo_member_nid_photo_status = 0;
       $newStatusData->ngo_other_document_status = 0;
       $newStatusData->save();
   }else{

       FormCompleteStatus::where('id', $checkCompleteStatusData->id)
       ->update([
           'ngo_member_status' => 1
        ]);


   }
   DB::commit();
   return redirect('/ngoAllRegistrationForm');
} catch (\Exception $e) {
    DB::rollBack();
    return redirect()->route('error_404');
}
    }

    public function store(Request $request){


        //dd($request->all());


        $time_dy = time().date("Ymd");

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));

        $main_time = $dt->format('H:i:s');

        $request->validate([
            'name' => 'required|string',
            'desi' => 'required|string',
            'dob' => 'required|string',
            'phone' => 'required|string',
            'nid_no' => 'required|string',
            'father_name' => 'required|string',
            'present_address' => 'required|string',
            'permanent_address' => 'required|string',
            'name_supouse' => 'required|string',
        ]);

        try{
            DB::beginTransaction();
        $fdOneFormId = DB::table('fd_one_forms')->where('user_id',Auth::user()->id)->value('id');
        $ngoMemberData = new NgoMemberList();
        $ngoMemberData->member_name = $request->name;
        $ngoMemberData->member_name_slug = Str::slug($request->name,"_");
        $ngoMemberData->member_designation = $request->desi;
        $ngoMemberData->member_dob = $request->dob;
        $ngoMemberData->time_for_api = $main_time;
        $ngoMemberData->verified_file = 0;
        $ngoMemberData->member_mobile = $request->phone;
        $ngoMemberData->member_nid_no = $request->nid_no;
        $ngoMemberData->member_father_name = $request->father_name;
        $ngoMemberData->member_present_address = $request->present_address;
        $ngoMemberData->member_permanent_address = $request->permanent_address;
        $ngoMemberData->member_name_supouse = $request->name_supouse;
        $ngoMemberData->fd_one_form_id  = $fdOneFormId;
        $ngoMemberData->save();

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
        $ngoMemberData = NgoMemberList::find($id);
        $ngoMemberData->member_name = $request->name;
        $ngoMemberData->member_name_slug = Str::slug($request->name,"_");
        $ngoMemberData->member_designation = $request->desi;
        $ngoMemberData->member_dob = $request->dob;
        $ngoMemberData->member_mobile = $request->phone;
        $ngoMemberData->member_nid_no = $request->nid_no;
        $ngoMemberData->member_father_name = $request->father_name;
        $ngoMemberData->member_present_address = $request->present_address;
        $ngoMemberData->member_permanent_address = $request->permanent_address;
        $ngoMemberData->member_name_supouse = $request->name_supouse;
        $ngoMemberData->save();

        DB::commit();
        return redirect()->back()->with('success','Created Successfully');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('error_404');
    }
    }


    public function destroy($id)
    {
        try{
            DB::beginTransaction();
        $admins = NgoMemberList::find($id);
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

    public function ngoMemberView(Request $request){

        //dd($request->id_for_pass);

        $all_data_list = NgoMemberList::where('id',$request->id_for_pass)->first();

        return view('front.ngomember.view',compact('all_data_list'));


    }
}
