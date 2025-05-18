<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fd6Form;
use App\Models\Fd6FormProkolpoArea;
use App\Models\NVisa;
use App\Models\Fd2Form;
use App\Models\Fd2FormOtherInfo;
use App\Models\NgoStatus;
use App\Models\Country;
use App\Models\Fd2AllFormLastYearDetail;
use App\Models\Fd9Form;
use App\Models\FdSevenDistributionDetail;
use App\Models\ProkolpoDetail;
use App\Models\NgoDuration;
use App\Models\Fd9ForeignerEmployeeFamilyMemberList;
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
use App\Models\FdOneForm;
use App\Models\Fd7Form;
use App\Models\Fd7FormProkolpoArea;
use App\Models\NgoRenewInfo;
use App\Models\Fd2FormForFd7Form;
use App\Models\Fd2Fd7OtherInfo;
use Illuminate\Support\Facades\App;
class Fd7FormController extends Controller
{
    public function index(){

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $fd7FormList = Fd7Form::where('fd_one_form_id',$ngo_list_all->id)->latest()->get();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id) ->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();

        return view('front.fd7Form.index',compact('ngoDurationLastEx','ngoDurationReg','ngo_list_all','fd7FormList'));
    }


    public function create(){
        $prokolpoAreaList = Fd7FormProkolpoArea::where('user_id',Auth::user()->id)
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
        return view('front.fd7Form.newAddForm',compact('thanaList','subdDistrictList','cityCorporationList','prokolpoAreaList','districtList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }


    public function postProkolpoArea(Request $request){



        $form= new Fd7FormProkolpoArea();
        //$form->fd7_form_id=0;
        $form->user_id =Auth::user()->id;
        $form->upload_type =0;

        if($request->mainEditId == 0){
            $form->user_id =Auth::user()->id;
        $form->upload_type =0;
            }else{
                $form->fd7_form_id =$request->mainEditId;
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

        $prokolpoAreaList = Fd7FormProkolpoArea::where('user_id',Auth::user()->id)
        ->where('upload_type',0)->get();
        }else{

            $prokolpoAreaList = Fd7FormProkolpoArea::where('fd7_form_id',$request->mainEditId)
            ->get();


        }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd7Form.postProkolpoArea',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);



    }

    public function updateProkolpoArea(Request $request){

        $form= Fd7FormProkolpoArea::find($request->mainId);
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

            $prokolpoAreaList = Fd7FormProkolpoArea::where('user_id',Auth::user()->id)
            ->where('upload_type',0)->get();
            }else{

                $prokolpoAreaList = Fd7FormProkolpoArea::where('fd7_form_id',$request->mainEditId)
                ->get();


            }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd7Form.postProkolpoArea',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);

    }

    public function deleteProkolpoArea(Request $request){

        $admins = Fd7FormProkolpoArea::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }

        if($request->mainEditId == 0){

            $prokolpoAreaList = Fd7FormProkolpoArea::where('user_id',Auth::user()->id)
            ->where('upload_type',0)->get();
            }else{

                $prokolpoAreaList = Fd7FormProkolpoArea::where('fd7_form_id',$request->mainEditId)
                ->get();


            }

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        $data = view('front.fd7Form.postProkolpoArea',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList'))->render();
        return response()->json($data);

    }

    public function postDistribution(Request $request){



        $formNoFiveInfo = new FdSevenDistributionDetail();
        $formNoFiveInfo->comment =$request->comment;
        $formNoFiveInfo->type =$request->distribution_type;
        $formNoFiveInfo->unit_name =$request->unit_name;
        $formNoFiveInfo->district_name =$request->districtNameDis;
        $formNoFiveInfo->upozila_name =$request->upozila_name;
        $formNoFiveInfo->product_des =$request->product_des;
        $formNoFiveInfo->product_quantity =$request->product_quantity;
        $formNoFiveInfo->unit_price =$request->unit_price;
        $formNoFiveInfo->total_amount =$request->total_amount;
        $formNoFiveInfo->total_beneficiaries =$request->total_beneficiaries;

        if($request->mainEditId == 0){
        $formNoFiveInfo->user_id =Auth::user()->id;
        $formNoFiveInfo->upload_type =0;
        }else{
            $formNoFiveInfo->fd7_form_id =$request->mainEditId;
            $formNoFiveInfo->user_id =Auth::user()->id;
        $formNoFiveInfo->upload_type =1;
        }
        $formNoFiveInfo->save();

        if($request->mainEditId == 0){

        $distributionListOne = DB::table('fd_seven_distribution_details')
        ->where('type','প্রকল্প খাতের ব্যয়')
        ->where('user_id',Auth::user()->id)->where('upload_type',0)->get();

        $distributionListTwo = DB::table('fd_seven_distribution_details')
        ->where('type','প্রশাসনিক ব্যয়')
        ->where('user_id',Auth::user()->id)->where('upload_type',0)->get();

        }else{


            $distributionListOne = DB::table('fd_seven_distribution_details')
            ->where('type','প্রকল্প খাতের ব্যয়')
            ->where('fd7_form_id',$request->mainEditId)->get();

            $distributionListTwo = DB::table('fd_seven_distribution_details')
            ->where('type','প্রশাসনিক ব্যয়')
            ->where('fd7_form_id',$request->mainEditId)->get();


        }

        $data = view('front.fd7Form.postDistribution',compact('distributionListOne','distributionListTwo'))->render();
        return response()->json($data);
    }

    public function updateDistribution(Request $request){


       // dd($request->all());



        $formNoFiveInfo = FdSevenDistributionDetail::find($request->mainId);
        $formNoFiveInfo->comment =$request->comment;
        $formNoFiveInfo->type =$request->distribution_type;
        $formNoFiveInfo->district_name =$request->districtNameDis;
        $formNoFiveInfo->upozila_name =$request->upozila_name;
        $formNoFiveInfo->product_des =$request->product_des;
        $formNoFiveInfo->product_quantity =$request->product_quantity;
        $formNoFiveInfo->unit_price =$request->unit_price;
        $formNoFiveInfo->unit_name =$request->unit_name;
        $formNoFiveInfo->total_amount =$request->total_amount;
        $formNoFiveInfo->total_beneficiaries =$request->total_beneficiaries;
        $formNoFiveInfo->save();

        if($request->mainEditId == 0){

            $distributionListOne = DB::table('fd_seven_distribution_details')
            ->where('type','প্রকল্প খাতের ব্যয়')
            ->where('user_id',Auth::user()->id)->where('upload_type',0)->get();

            $distributionListTwo = DB::table('fd_seven_distribution_details')
            ->where('type','প্রশাসনিক ব্যয়')
            ->where('user_id',Auth::user()->id)->where('upload_type',0)->get();
            }else{


                $distributionListOne = DB::table('fd_seven_distribution_details')
                ->where('type','প্রকল্প খাতের ব্যয়')
                ->where('fd7_form_id',$request->mainEditId)->get();

                $distributionListTwo = DB::table('fd_seven_distribution_details')
                ->where('type','প্রশাসনিক ব্যয়')
                ->where('fd7_form_id',$request->mainEditId)->get();


            }

        $data = view('front.fd7Form.postDistribution',compact('distributionListOne','distributionListTwo'))->render();
        return response()->json($data);

    }


    public function viewFd7EditDataAjax(Request $request){

        

        $distributionListOnesEdit = DB::table('fd_seven_distribution_details')
                ->where('id',$request->get_id_from_main)->first();

                $data = view('front.fd7Form._partial.modalEditDataView',compact('distributionListOnesEdit'))->render();
                return response()->json($data);

    }

    public function deleteDistribution(Request $request){

        $admins = FdSevenDistributionDetail::find($request->id);
        if (!is_null($admins)) {
            $admins->delete();
        }


        if($request->mainEditId == 0){

            $distributionListOne = DB::table('fd_seven_distribution_details')
            ->where('type','প্রকল্প খাতের ব্যয়')
            ->where('user_id',Auth::user()->id)->where('upload_type',0)->get();

            $distributionListTwo = DB::table('fd_seven_distribution_details')
            ->where('type','প্রশাসনিক ব্যয়')
            ->where('user_id',Auth::user()->id)->where('upload_type',0)->get();
            }else{


                $distributionListOne = DB::table('fd_seven_distribution_details')
                ->where('type','প্রকল্প খাতের ব্যয়')
                ->where('fd7_form_id',$request->mainEditId)->get();

                $distributionListTwo = DB::table('fd_seven_distribution_details')
                ->where('type','প্রশাসনিক ব্যয়')
                ->where('fd7_form_id',$request->mainEditId)->get();


            }

        $data = view('front.fd7Form.postDistribution',compact('distributionListOne','distributionListTwo'))->render();
        return response()->json($data);

    }

    public function edit($id){

        $fd6Id = base64_decode($id);

        $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
        $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
        $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
        $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $fd7FormList = Fd7Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd6Id)->latest()->first();
        $prokolpoAreaList = Fd7FormProkolpoArea::where('fd7_form_id',$fd6Id)->latest()->get();

        $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
        $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
        $cityCorporationList =  DB::table('civilinfos')->whereNotNull('city_orporation')
        ->groupBy('city_orporation')->select('city_orporation')->get();
        $subdDistrictList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();
        $thanaList = DB::table('civilinfos')->groupBy('thana_bn')->select('thana_bn')->get();

        return view('front.fd7Form.newAddFormEdit',compact('thanaList','subdDistrictList','cityCorporationList','districtList','divisionList','prokolpoAreaList','fd7FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

    }

    public function store(Request $request){

        // $request->validate([

        //     'ngo_name' => 'required|string',
        //     'ngo_address' => 'required|string',
        //     'ngo_registration_number' => 'required|string',
        //     'ngo_registration_date' => 'required|string',
        //     'ngo_prokolpo_name' => 'required|string',
        //     'donor_organization_description' => 'required|string',
        //     'donor_organization_chief_type' => 'required|string',
        //     'donor_organization_chief_name' => 'required|string',
        //     'donor_organization_name' => 'required|string',
        //     'donor_organization_address' => 'required|string',
        //     'donor_organization_phone' => 'required|string',
        //     'donor_organization_email' => 'required|string',
        //     'donor_organization_website' => 'required|string',
        //     'ongoing_prokolpo_name' => 'required|string',
        //     'total_prokolpo_cost' => 'required|string',
        //     'date_of_bureau_approval' => 'required|string',
        //     'percentage_of_the_original_project' => 'required|string',
        //     'adverse_impact_on_the_ongoing_project' => 'required|string',
        //     'ngo_prokolpo_start_date' => 'required|string',
        //     'ngo_prokolpo_end_date' => 'required|string',
        //     'bureau_approval_pdf' => 'required|file',
        //     'letter_from_donor_agency_pdf' => 'required|file',
        //     'relief_assistance_project_proposal_pdf' => 'required|file',

        // ]);



        //dd($request->all());

       try{

            DB::beginTransaction();
            $fdOneFormID = FdOneForm::where('user_id',Auth::user()->id)->first();
            $subject_all = implode(",",$request->subject_id);


            $fd7FormInfo = new Fd7Form();
            $fd7FormInfo->fd_one_form_id =$fdOneFormID->id;
            $fd7FormInfo->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
            $fd7FormInfo->subject_id =$subject_all;
            $fd7FormInfo->ngo_name =$request->ngo_name;
            $fd7FormInfo->ngo_address =$request->ngo_address;
            $fd7FormInfo->ngo_registration_number =$request->ngo_registration_number;
            $fd7FormInfo->ngo_registration_date =$request->ngo_registration_date;
            $fd7FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
            $fd7FormInfo->donor_organization_description =$request->donor_organization_description;
            $fd7FormInfo->donor_organization_chief_type =$request->donor_organization_chief_type;
            $fd7FormInfo->donor_organization_chief_name =$request->donor_organization_chief_name;
            $fd7FormInfo->donor_organization_chief_name =$request->donor_organization_chief_name;
            $fd7FormInfo->donor_organization_address =$request->donor_organization_address;
            $fd7FormInfo->donor_organization_name =$request->donor_organization_name;
            $fd7FormInfo->donor_organization_phone =$request->donor_organization_phone;
            $fd7FormInfo->donor_organization_email =$request->donor_organization_email;
            $fd7FormInfo->donor_organization_website =$request->donor_organization_website;
            $fd7FormInfo->ongoing_prokolpo_name =$request->ongoing_prokolpo_name;
            $fd7FormInfo->total_prokolpo_cost =$request->total_prokolpo_cost;
            $fd7FormInfo->date_of_bureau_approval =$request->date_of_bureau_approval;
            $fd7FormInfo->percentage_of_the_original_project =$request->percentage_of_the_original_project;
            $fd7FormInfo->adverse_impact_on_the_ongoing_project =$request->adverse_impact_on_the_ongoing_project;
            $fd7FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
            $fd7FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;
            $fd7FormInfo->status ='Review';
            $fd7FormInfo->chief_name = $request->chief_name;
            $fd7FormInfo->chief_desi = $request->chief_desi;
            $fd7FormInfo->relief_program_detail = $request->relief_program_detail;
            $fd7FormInfo->relevant_information = $request->relevant_information;
            $fd7FormInfo->bank_detail = $request->bank_detail;

            $filePath="FdSevenForm";

            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $fd7FormInfo->digital_signature =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $fd7FormInfo->digital_seal =CommonController::storeBase64($request->image_seal_base64);

                }

                if ($request->hasfile('distribution_pdf')) {

                    $file = $request->file('distribution_pdf');

                    $fd7FormInfo->distribution_pdf =CommonController::pdfUpload($request,$file,$filePath);

                }

                if ($request->hasfile('relief_program_pdf')) {

                    $file = $request->file('relief_program_pdf');

                    $fd7FormInfo->relief_program_pdf =CommonController::pdfUpload($request,$file,$filePath);

                }

                if ($request->hasfile('relevant_information_pdf')) {

                    $file = $request->file('relevant_information_pdf');

                    $fd7FormInfo->relevant_information_pdf =CommonController::pdfUpload($request,$file,$filePath);

                }

                if ($request->hasfile('bank_detail_pdf')) {

                    $file = $request->file('bank_detail_pdf');

                    $fd7FormInfo->bank_detail_pdf =CommonController::pdfUpload($request,$file,$filePath);

                }

            if ($request->hasfile('bureau_approval_pdf')) {

                $file = $request->file('bureau_approval_pdf');

                $fd7FormInfo->bureau_approval_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('letter_from_donor_agency_pdf')) {

                $file = $request->file('letter_from_donor_agency_pdf');

                $fd7FormInfo->letter_from_donor_agency_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('relief_assistance_project_proposal_pdf')) {

                $file = $request->file('relief_assistance_project_proposal_pdf');

                $fd7FormInfo->relief_assistance_project_proposal_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            $fd7FormInfo->save();

            $fd7FormInfoId = $fd7FormInfo->id;

            $prokolpoDetail = new ProkolpoDetail();
            $prokolpoDetail->formId=$fd7FormInfoId;
            $prokolpoDetail->type='fd7';
            $prokolpoDetail->save();


            Fd7FormProkolpoArea::where('user_id',Auth::user()->id)
            ->where('upload_type',0)
       ->update([
           'upload_type' => 1,
           'fd7_form_id' =>$fd7FormInfoId
        ]);

        FdSevenDistributionDetail::where('user_id',Auth::user()->id)
            ->where('upload_type',0)
       ->update([
           'upload_type' => 1,
           'fd7_form_id' =>$fd7FormInfoId
        ]);



            DB::commit();
            return redirect()->route('addFd2DetailForFd7',base64_encode($fd7FormInfoId))->with('success','Added Successfuly');

        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }

    }


    public function update(Request $request,$id){

           try{
            DB::beginTransaction();
            $subject_all = implode(",",$request->subject_id);

            $fd7FormInfo = Fd7Form::find($id);
            $fd7FormInfo->ngo_name =$request->ngo_name;
            $fd7FormInfo->subject_id =$subject_all;
            $fd7FormInfo->ngo_address =$request->ngo_address;
            $fd7FormInfo->ngo_registration_number =$request->ngo_registration_number;
            $fd7FormInfo->ngo_registration_date =$request->ngo_registration_date;
            $fd7FormInfo->ngo_prokolpo_name =$request->ngo_prokolpo_name;
            $fd7FormInfo->donor_organization_description =$request->donor_organization_description;
            $fd7FormInfo->donor_organization_chief_type =$request->donor_organization_chief_type;
            $fd7FormInfo->donor_organization_chief_name =$request->donor_organization_chief_name;
            $fd7FormInfo->donor_organization_address =$request->donor_organization_address;
            $fd7FormInfo->donor_organization_name =$request->donor_organization_name;
            $fd7FormInfo->donor_organization_phone =$request->donor_organization_phone;
            $fd7FormInfo->donor_organization_email =$request->donor_organization_email;
            $fd7FormInfo->donor_organization_website =$request->donor_organization_website;
            $fd7FormInfo->ongoing_prokolpo_name =$request->ongoing_prokolpo_name;
            $fd7FormInfo->total_prokolpo_cost =$request->total_prokolpo_cost;
            $fd7FormInfo->date_of_bureau_approval =$request->date_of_bureau_approval;
            $fd7FormInfo->percentage_of_the_original_project =$request->percentage_of_the_original_project;
            $fd7FormInfo->adverse_impact_on_the_ongoing_project =$request->adverse_impact_on_the_ongoing_project;
            $fd7FormInfo->ngo_prokolpo_start_date =$request->ngo_prokolpo_start_date;
            $fd7FormInfo->ngo_prokolpo_end_date =$request->ngo_prokolpo_end_date;

            $fd7FormInfo->chief_name = $request->chief_name;
            $fd7FormInfo->chief_desi = $request->chief_desi;
            $fd7FormInfo->relief_program_detail = $request->relief_program_detail;
            $fd7FormInfo->relevant_information = $request->relevant_information;
            $fd7FormInfo->bank_detail = $request->bank_detail;

            $filePath="FdSevenForm";

            if (!empty($request->image_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_signature');
                $fd7FormInfo->digital_signature =CommonController::storeBase64($request->image_base64);

                }


            if (!empty($request->image_seal_base64)) {

                $filePath="ngoHead";
                $file = $request->file('digital_seal');
                $fd7FormInfo->digital_seal =CommonController::storeBase64($request->image_seal_base64);

                }

                if ($request->hasfile('distribution_pdf')) {

                    $file = $request->file('distribution_pdf');

                    $fd7FormInfo->distribution_pdf =CommonController::pdfUpload($request,$file,$filePath);

                }

                if ($request->hasfile('relief_program_pdf')) {

                    $file = $request->file('relief_program_pdf');

                    $fd7FormInfo->relief_program_pdf =CommonController::pdfUpload($request,$file,$filePath);

                }

                if ($request->hasfile('relevant_information_pdf')) {

                    $file = $request->file('relevant_information_pdf');

                    $fd7FormInfo->relevant_information_pdf =CommonController::pdfUpload($request,$file,$filePath);

                }

                if ($request->hasfile('bank_detail_pdf')) {

                    $file = $request->file('bank_detail_pdf');

                    $fd7FormInfo->bank_detail_pdf =CommonController::pdfUpload($request,$file,$filePath);

                }

            if ($request->hasfile('bureau_approval_pdf')) {

                $file = $request->file('bureau_approval_pdf');

                $fd7FormInfo->bureau_approval_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('letter_from_donor_agency_pdf')) {

                $file = $request->file('letter_from_donor_agency_pdf');

                $fd7FormInfo->letter_from_donor_agency_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }


            if ($request->hasfile('relief_assistance_project_proposal_pdf')) {

                $file = $request->file('relief_assistance_project_proposal_pdf');

                $fd7FormInfo->relief_assistance_project_proposal_pdf =CommonController::pdfUpload($request,$file,$filePath);

            }

            $fd7FormInfo->save();

            $input = $request->all();


            $fd7FormInfoId = $fd7FormInfo->id;


            Fd7FormProkolpoArea::where('user_id',Auth::user()->id)
            ->where('upload_type',0)
       ->update([
           'upload_type' => 1,
           'fd7_form_id' =>$fd7FormInfoId
        ]);

        FdSevenDistributionDetail::where('user_id',Auth::user()->id)
            ->where('upload_type',0)
       ->update([
           'upload_type' => 1,
           'fd7_form_id' =>$fd7FormInfoId
        ]);





            DB::commit();
            return redirect()->route('editFd2DetailForFd7',base64_encode($fd7FormInfoId))->with('success','Updated Successfuly');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function destroy($id){

        $admins = Fd7Form::find($id);
        if (!is_null($admins)) {
            $admins->delete();
        }
        return back()->with('error','Deleted successfully!');
    }


    public function fd2pdfview($id){


        $fd7Id = base64_decode($id);

        //dd($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
       $fd2FormList = Fd2FormForFd7Form::where('fd_one_form_id',$ngo_list_all->id)->where('fd7_form_id',$fd7Id)->latest()->first();
       if(!$fd2FormList){
        $fd2OtherInfo = Fd2Fd7OtherInfo::where('fd2_form_for_fd7_form_id',0)->latest()->get();
       }else{

       
       $fd2OtherInfo = Fd2Fd7OtherInfo::where('fd2_form_for_fd7_form_id',$fd2FormList->id)->latest()->get();
    }
       $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
       $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
       $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
       $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
       $fd7FormList = Fd7Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd7Id)->latest()->first();
       $prokolpoAreaList = Fd7FormProkolpoArea::where('fd7_form_id',$fd7Id)->latest()->get();
       //FdSevenDistributionDetail
       $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
       ->where('type','fd7')
       ->get();
       $distributionListOne = DB::table('fd_seven_distribution_details')
            ->where('type','প্রকল্প খাতের ব্যয়')
            ->where('fd7_form_id',$fd7Id)->get();

            $distributionListTwo = DB::table('fd_seven_distribution_details')
            ->where('type','প্রশাসনিক ব্যয়')
            ->where('fd7_form_id',$fd7Id)->get();





       $file_Name_Custome = 'fd_seven_form';
       $data =view('front.fd7Form.fd2pdfview',[
        'divisionList'=>$divisionList,
        'renewWebsiteName'=>$renewWebsiteName,
        'ngoDurationLastEx'=>$ngoDurationLastEx,
        'ngoDurationReg'=>$ngoDurationReg,
        'ngo_list_all'=>$ngo_list_all,
'fd7FormList'=>$fd7FormList,
                       'fd2AllFormLastYearDetail'=>$fd2AllFormLastYearDetail,
                       'distributionListTwo'=>$distributionListTwo,
                       'distributionListOne'=>$distributionListOne,
                       'fd2OtherInfo'=>$fd2OtherInfo,
                       'fd2FormList'=>$fd2FormList,
                       'cityCorporationList'=>$cityCorporationList,
                       'districtList'=>$districtList,
                       'prokolpoAreaList'=>$prokolpoAreaList

                   ])->render();


       $pdfFilePath =$file_Name_Custome.'.pdf';


       $mpdf = new Mpdf([ 'default_font_size' => 14,'default_font' => 'nikosh']);
       $mpdf->WriteHTML($data);
       $mpdf->Output($pdfFilePath, "I");
       die();

    }



    public function fd7pdfview($id){


        $fd7Id = base64_decode($id);

        //dd($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
       $fd2FormList = Fd2FormForFd7Form::where('fd_one_form_id',$ngo_list_all->id)->where('fd7_form_id',$fd7Id)->latest()->first();
       if(!$fd2FormList){
        $fd2OtherInfo = Fd2Fd7OtherInfo::where('fd2_form_for_fd7_form_id',0)->latest()->get();
       }else{
       $fd2OtherInfo = Fd2Fd7OtherInfo::where('fd2_form_for_fd7_form_id',$fd2FormList->id)->latest()->get();
       }
       $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
       $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
       $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
       $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
       $fd7FormList = Fd7Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd7Id)->latest()->first();
       $prokolpoAreaList = Fd7FormProkolpoArea::where('fd7_form_id',$fd7Id)->latest()->get();
       //FdSevenDistributionDetail
       if(!$fd2FormList){

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',0)
        ->where('type','fd7')
        ->get();
       }else{
       $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
       ->where('type','fd7')
       ->get();
       }
       $distributionListOne = DB::table('fd_seven_distribution_details')
            ->where('type','প্রকল্প খাতের ব্যয়')
            ->where('fd7_form_id',$fd7Id)->get();

            $distributionListTwo = DB::table('fd_seven_distribution_details')
            ->where('type','প্রশাসনিক ব্যয়')
            ->where('fd7_form_id',$fd7Id)->get();





       $file_Name_Custome = 'fd_seven_form';
       $data =view('front.fd7Form.fd7pdfview',[
        'divisionList'=>$divisionList,
        'renewWebsiteName'=>$renewWebsiteName,
        'ngoDurationLastEx'=>$ngoDurationLastEx,
        'ngoDurationReg'=>$ngoDurationReg,
        'ngo_list_all'=>$ngo_list_all,
'fd7FormList'=>$fd7FormList,
                       'fd2AllFormLastYearDetail'=>$fd2AllFormLastYearDetail,
                       'distributionListTwo'=>$distributionListTwo,
                       'distributionListOne'=>$distributionListOne,
                       'fd2OtherInfo'=>$fd2OtherInfo,
                       'fd2FormList'=>$fd2FormList,
                       'cityCorporationList'=>$cityCorporationList,
                       'districtList'=>$districtList,
                       'prokolpoAreaList'=>$prokolpoAreaList

                   ])->render();


       $pdfFilePath =$file_Name_Custome.'.pdf';


       $mpdf = new Mpdf([ 'default_font_size' => 14,'default_font' => 'nikosh']);
       $mpdf->WriteHTML($data);
       $mpdf->Output($pdfFilePath, "I");
       die();

    }

    public function show($id){

        $fd7Id = base64_decode($id);

        //dd($id);

       $ngo_list_all = FdOneForm::where('user_id',Auth::user()->id)->first();
       $ngoDurationReg = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->value('ngo_duration_start_date');
       $fd2FormList = Fd2FormForFd7Form::where('fd_one_form_id',$ngo_list_all->id)->where('fd7_form_id',$fd7Id)->latest()->first();
       if(!$fd2FormList){
        $fd2OtherInfo = Fd2Fd7OtherInfo::where('fd2_form_for_fd7_form_id',0)->latest()->get();
       }else{

       
       $fd2OtherInfo = Fd2Fd7OtherInfo::where('fd2_form_for_fd7_form_id',$fd2FormList->id)->latest()->get();
    }
       $ngoDurationLastEx = NgoDuration::where('fd_one_form_id',$ngo_list_all->id)->orderBy('id','desc')->first();
       $renewWebsiteName = NgoRenewInfo::where('fd_one_form_id',$ngo_list_all->id)->value('web_site_name');
       $divisionList = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();
       $districtList = DB::table('civilinfos')->groupBy('district_bn')->select('district_bn')->get();
       $cityCorporationList = DB::table('civilinfos')->whereNotNull('city_orporation')->groupBy('city_orporation')->select('city_orporation')->get();
       $fd7FormList = Fd7Form::where('fd_one_form_id',$ngo_list_all->id)->where('id',$fd7Id)->latest()->first();
       $prokolpoAreaList = Fd7FormProkolpoArea::where('fd7_form_id',$fd7Id)->latest()->get();
       //FdSevenDistributionDetail

       if(!$fd2FormList){

        $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',0)
        ->where('type','fd7')
        ->get();
       }else{
       $fd2AllFormLastYearDetail = Fd2AllFormLastYearDetail::where('main_id',$fd2FormList->id)
       ->where('type','fd7')
       ->get();
       }
       $distributionListOne = DB::table('fd_seven_distribution_details')
            ->where('type','প্রকল্প খাতের ব্যয়')
            ->where('fd7_form_id',$fd7Id)->get();

            $distributionListTwo = DB::table('fd_seven_distribution_details')
            ->where('type','প্রশাসনিক ব্যয়')
            ->where('fd7_form_id',$fd7Id)->get();


       return view('front.fd7Form.view',compact('fd2AllFormLastYearDetail','distributionListTwo','distributionListOne','fd2OtherInfo','fd2FormList','cityCorporationList','districtList','prokolpoAreaList','fd7FormList','divisionList','renewWebsiteName','ngoDurationLastEx','ngoDurationReg','ngo_list_all'));

   }

   public function reliefAssistanceProjectProposalPdf($id){

    $get_file_data = Fd7Form::where('id',$id)->value('relief_assistance_project_proposal_pdf');

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


   public function finalFdSevenApplicationSubmit($id){


    $new_data_add = Fd7Form::find(base64_decode($id));
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
     $regDakData->dak_type = 'fdSeven';
     $regDakData->receive_from_ngo = 1;
     $regDakData->receive_status = 1;
         $regDakData->status = 1;
     $regDakData->nothi_jat_id = 0;
     $regDakData->nothi_jat_status = 0;
     $regDakData->sent_status =null;
     $regDakData->amPmValue = $amPmValueFinal;
     $regDakData->file_last_check_date = Date('Y-m-d', strtotime('+3 days'));
     $regDakData->save();

    return redirect('/fd7Form')->with('success','Submit To Ngo Sucessfully');


}


   public function authorizationLetter($id){

    $get_file_data = Fd7Form::where('id',$id)->value('bureau_approval_pdf');

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

   public function fd7formextrapdf($title, $id){

    $get_file_data = Fd7Form::where('id',$id)->value($title);

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

   public function letterFromDonorAgency($id){

    $get_file_data = Fd7Form::where('id',$id)->value('letter_from_donor_agency_pdf');

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
