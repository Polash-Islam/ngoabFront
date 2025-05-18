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
use App\Models\FdFourOneExpenditureSector;
use App\Models\FdOneForm;
use App\Models\FdFourOneForm;
use App\Models\FdFourForm;
class FdFourOneController extends Controller
{
    public function index(){
        try{
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
            $fdFourOneFormList = FdFourOneForm::where('fd_one_form_id',$ngo_list_all->id)
            ->latest()->get();

            return view('front.fdFourOneForm.index',compact('ngo_list_all','fdFourOneFormList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }



    }


    public function show($id){
        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneFormList = FdFourOneForm::where('id',$decode_id)
            ->latest()->first();


            $fdFourFormList = FdFourForm::where('fd_four_one_form_id',$decode_id)
            ->latest()->first();

            $expenditureDetails = FdFourOneExpenditureSector::where('fd_four_one_id',$decode_id)->latest()->get();




            return view('front.fdFourOneForm.show',compact('expenditureDetails','fdFourFormList','ngo_list_all','fdFourOneFormList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }



    }


    public function fd4Onepdfview($id){

        try{

            $decode_id = base64_decode($id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')
            ->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneFormList = FdFourOneForm::where('id',$decode_id)
            ->latest()->first();


            $fdFourFormList = FdFourForm::where('fd_four_one_form_id',$decode_id)
            ->latest()->first();

            $expenditureDetails = FdFourOneExpenditureSector::where('fd_four_one_id',$decode_id)->latest()->get();


            $file_Name_Custome = 'fd_four_one_form';
            $data =view('front.fdFourOneForm.fd4Onepdfview',[
             'expenditureDetails'=>$expenditureDetails,
             'fdFourFormList'=>$fdFourFormList  ,
              'ngo_list_all'=>$ngo_list_all,
              'fdFourOneFormList'=>$fdFourOneFormList

                        ])->render();


            $pdfFilePath =$file_Name_Custome.'.pdf';


            $mpdf = new Mpdf([ 'default_font_size' => 16,'default_font' => 'nikosh']);
            $mpdf->WriteHTML($data);
            $mpdf->Output($pdfFilePath, "I");
            die();


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

            $expenditureDetails = FdFourOneExpenditureSector::where('user_id',Auth::user()->id)

            ->where('status',0)->get();

            return view('front.fdFourOneForm.newAddForm',compact('ngo_list_all','districtList','expenditureDetails'));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }

    public function edit($id){


        try{

            $decode_id = base64_decode($id);

            //dd($decode_id);

            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id',Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $districtList = DB::table('civilinfos')->groupBy('district_bn')
            ->select('district_bn')->get();

            $fdFourOneFormList = FdFourOneForm::where('id',$decode_id)
            ->first();

            $expenditureDetails = FdFourOneExpenditureSector::where('fd_four_one_id',$decode_id)
            ->latest()->get();

            return view('front.fdFourOneForm.newEdit',compact('fdFourOneFormList','expenditureDetails','ngo_list_all','districtList'));

        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }

    }


    public function fdFourOneExpendaturePost(Request $request){

//dd($request->mainEditId);
                $form= new FdFourOneExpenditureSector();
                $form->expenditure_sectors=$request->expenditure_sectors;
                $form->approved_budget_money=$request->approved_budget_money;
                $form->actual_cost=$request->actual_cost;
                $form->difference=$request->difference;
                $form->percentage=$request->percentage;
                $form->reason_for_the_difference=$request->reason_for_the_difference;
                if($request->mainEditId == 0){
                $form->status =0;
                $form->user_id =Auth::user()->id;
                }else{
                $form->fd_four_one_id=$request->mainEditId;
                }
                $form->save();

                if($request->mainEditId == 0){

                    $expenditureDetails = FdFourOneExpenditureSector::where('user_id',Auth::user()->id)

                    ->where('status',0)->get();
                    }else{

                        $expenditureDetails = FdFourOneExpenditureSector::where('fd_four_one_id',$request->mainEditId)

                        ->get();


                    }


                    $data = view('front.fdFourOneForm._partial.sectorsOfExpenditureTable',compact('expenditureDetails'))->render();
                    return response()->json($data);


    }


    public function fdFourOneExpendatureUpdate(Request $request){


        $form= FdFourOneExpenditureSector::find($request->mainId);
        $form->expenditure_sectors=$request->expenditure_sectors;
        $form->approved_budget_money=$request->approved_budget_money;
        $form->actual_cost=$request->actual_cost;
        $form->difference=$request->difference;
        $form->percentage=$request->percentage;
        $form->reason_for_the_difference=$request->reason_for_the_difference;
        $form->save();

        if($request->mainEditId == 0){

            $expenditureDetails = FdFourOneExpenditureSector::where('user_id',Auth::user()->id)

            ->where('status',0)->get();
            }else{

                $expenditureDetails = FdFourOneExpenditureSector::where('fd_four_one_id',$request->mainEditId)

                ->get();


            }


            $data = view('front.fdFourOneForm._partial.sectorsOfExpenditureTable',compact('expenditureDetails'))->render();
            return response()->json($data);

    }


    public function store(Request $request){

        //dd($request->all());

        $request->validate([

            'prokolpo_name' => 'required|string',
            'prokolpo_permission_sarok_no' => 'required|string',
            'prokolpo_permission_sarok_date' => 'required|string',
            'prokolpo_year' => 'required|string',
            'prokolpo_amount_sarkrito_bangla_amount' => 'required|string',
            'prokolpo_amount_grihito' => 'required|string',
            'prokolpo_amount_grihito_date' => 'required|string',
            'prokolpo_amount_sarkrito_date' => 'required|string',
        ]);

        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneForm = new FdFourOneForm();
            $fdFourOneForm->status = 'Review';
            $fdFourOneForm->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fdFourOneForm->prokolpo_name = $request->prokolpo_name;
            $fdFourOneForm->prokolpo_permission_sarok_no = $request->prokolpo_permission_sarok_no;
            $fdFourOneForm->prokolpo_permission_sarok_date = $request->prokolpo_permission_sarok_date;
            $fdFourOneForm->prokolpo_year = $request->prokolpo_year;
            $fdFourOneForm->prokolpo_amount_sarkrito_bangla_amount = $request->prokolpo_amount_sarkrito_bangla_amount;
            $fdFourOneForm->prokolpo_amount_sarkrito_date = $request->prokolpo_amount_sarkrito_date;
            $fdFourOneForm->prokolpo_amount_grihito = $request->prokolpo_amount_grihito;
            $fdFourOneForm->prokolpo_amount_grihito_date =$request->prokolpo_amount_grihito_date;
            $fdFourOneForm->fd_one_form_id = $ngo_list_all->id;

            $fdFourOneForm->fd_four_form_id = $request->fdFourId;

            
            $fdFourOneForm->save();


            $fdFourOneFormId = $fdFourOneForm->id;


            FdFourOneExpenditureSector::where('user_id',Auth::user()->id)
            ->where('status',0)->update([
           'status' => 1,
           'fd_four_one_id' =>$fdFourOneFormId
        ]);


            return redirect()->route('fdFourForm.show',base64_encode($request->fdFourId))->with('success','Added Successfully');

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }

    public function update(Request $request,$id){



        try{
            $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();

            $fdFourOneForm = FdFourOneForm::find($id);
            $fdFourOneForm->prokolpo_name = $request->prokolpo_name;
            $fdFourOneForm->prokolpo_permission_sarok_no = $request->prokolpo_permission_sarok_no;
            $fdFourOneForm->prokolpo_permission_sarok_date = $request->prokolpo_permission_sarok_date;
            $fdFourOneForm->prokolpo_year = $request->prokolpo_year;
            $fdFourOneForm->prokolpo_amount_sarkrito_bangla_amount = $request->prokolpo_amount_sarkrito_bangla_amount;
            $fdFourOneForm->prokolpo_amount_sarkrito_date = $request->prokolpo_amount_sarkrito_date;
            $fdFourOneForm->prokolpo_amount_grihito = $request->prokolpo_amount_grihito;
            $fdFourOneForm->prokolpo_amount_grihito_date =$request->prokolpo_amount_grihito_date;
            $fdFourOneForm->fd_one_form_id = $ngo_list_all->id;
            $fdFourOneForm->fd_four_form_id = $request->fdFourId;
            $fdFourOneForm->save();


            $fdFourOneFormId = $fdFourOneForm->id;

            FdFourOneExpenditureSector::where('user_id',Auth::user()->id)
            ->where('status',0)->update([
           'status' => 1,
           'fd_four_one_id' =>$fdFourOneFormId
        ]);


        return redirect()->route('fdFourForm.show',base64_encode($request->fdFourId))->with('success','Updated Successfully');


        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }

    public function fdFourOneSend($id){

        try{


        $formNoFourInfo = FdFourOneForm::find(base64_decode($id));
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
         $regDakData->dak_type = 'fdFourOne';
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

    public function fdFourOneExpendatureDelete(Request $request){

        $admins = FdFourOneExpenditureSector::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        if($request->mainEditId == 0){

            $expenditureDetails = FdFourOneExpenditureSector::where('user_id',Auth::user()->id)

            ->where('status',0)->get();
            }else{

                $expenditureDetails = FdFourOneExpenditureSector::where('fd_four_one_id',$request->mainEditId)

                ->get();


            }


            $data = view('front.fdFourOneForm._partial.sectorsOfExpenditureTable',compact('expenditureDetails'))->render();
            return response()->json($data);


    }
}
