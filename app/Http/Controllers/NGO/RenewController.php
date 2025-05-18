<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NGO\CommonController;
use Illuminate\Http\Request;
use DB;
use Response;
use App\Models\NgoTypeAndLanguage;
use App\Models\FormEight;
use App\Models\FdOneMemberList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;
use DateTime;
use DateTimezone;
use Carbon\Carbon;
use Session;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\App;
use App\Models\FdOneForm;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NgoMemberNidPhoto;
use App\Models\NameChange;
use App\Models\NgoRenew;
use App\Models\RenewalFile;
use App\Models\NgoRenewInfo;
use App\Models\FdOneBankAccount;

class RenewController extends Controller
{
    public function foreignNgoType(Request $request)
    {

        $structureStatus = $request->structureStatus;

        if ($structureStatus == 'Yes') {

            $data = view('front.renew.structureStatusYes')->render();
            return response()->json($data);


        } elseif ($structureStatus == 'No') {

            $data = view('front.renew.structureStatusNo')->render();
            return response()->json($data);


        }


    }


    public function localNgoType(Request $request)
    {
        $structureStatus = $request->structureStatus;
        if ($structureStatus == 'Yes') {

            $data = view('front.renew.local.structureStatusYes')->render();
            return response()->json($data);


        } elseif ($structureStatus == 'No') {

            $data = view('front.renew.local.structureStatusNo')->render();
            return response()->json($data);


        }

    }

    public function fileListForNameChange(Request $request)
    {
        $structureStatus = $request->structureStatus;
        if ($structureStatus == 'Yes') {
            $data = view('front.name_change.structureStatusYes')->render();
            return response()->json($data);
        } elseif ($structureStatus == 'No') {

            $data = view('front.name_change.structureStatusNo')->render();
            return response()->json($data);
        }
    }

    public function renewPaymentInfo()
    {
        $data['mainNgoType'] = CommonController::changeView();
        $data['ngo_list_all'] = FdOneForm::where('user_id', Auth::user()->id)->first();
        return view('front.renew.renewPaymentInfo', $data);
    }

    public function renew()
    {
        try {
            $checkNgoTypeForForeginNgo = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)->value('ngo_type');
            $ngo_list_all = FdOneForm::where('user_id', Auth::user()->id)->first();
            $name_change_list_all = NgoRenew::where('fd_one_form_id', $ngo_list_all->id)->latest()->get();
            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();
            if ($mainNgoType == 'দেশিও') {
                return view('front.renew.renew', compact('ngo_list_all', 'name_change_list_all', 'mainNgoType'));
            } else {
                return view('front.renew.foreign.renew', compact('ngo_list_all', 'name_change_list_all', 'mainNgoType'));
            }

        } catch (\Exception $e) {
            return redirect()->route('error_404');
        }
    }


    public function ngoRenewStepOne()
    {

        try {

            $get_all_data_new = NgoRenewInfo::where('user_id', Auth::user()->id)->latest()->get();
            $all_parti = FdOneForm::where('user_id', Auth::user()->id)->get();
            $ngo_list_all = FdOneForm::where('user_id', Auth::user()->id)->first();
            $name_change_list_all = NgoRenew::where('fd_one_form_id', $ngo_list_all->id)->latest()->get();

            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();

            if ($mainNgoType == 'দেশিও') {
                return view('front.renew.ngo_renew_list_new', compact('get_all_data_new', 'ngo_list_all', 'name_change_list_all', 'all_parti'));
            } else {
                return view('front.renew.foreign.ngo_renew_list_new', compact('get_all_data_new', 'ngo_list_all', 'name_change_list_all', 'all_parti'));
            }

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function ngoRenewStepAdd()
    {
        try {
            $get_all_data_new = NgoRenewInfo::where('user_id', 'for_add')->latest()->get();
            $all_parti = FdOneForm::where('user_id', Auth::user()->id)->get();
            $ngo_list_all = FdOneForm::where('user_id', Auth::user()->id)->first();
            $name_change_list_all = NgoRenew::where('fd_one_form_id', $ngo_list_all->id)->latest()->get();

            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();

            if ($mainNgoType == 'দেশিও') {
                return view('front.renew.ngo_renew_list_new', compact('get_all_data_new', 'ngo_list_all', 'name_change_list_all', 'all_parti'));
            } else {
                return view('front.renew.foreign.ngo_renew_list_new', compact('get_all_data_new', 'ngo_list_all', 'name_change_list_all', 'all_parti'));
            }

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }


    public function updateRenewInformationList(Request $request)
    {

        //dd($request->all());

        try {

            DB::beginTransaction();

            $time_dy = time() . date("Ymd");
            $filePath = "NgoRenewInfo";

            $ngoRenew = NgoRenewInfo::find($request->id);
            $ngoRenew->user_id = Auth::user()->id;
            $ngoRenew->registration_number = $request->registration_number;
            $ngoRenew->organization_name = $request->organization_name;
            $ngoRenew->organization_address = $request->organization_address;
            $ngoRenew->address_of_head_office = $request->address_of_head_office;
            $ngoRenew->country_of_origin = $request->country_of_origin;
            $ngoRenew->name_of_head_in_bd = $request->name_of_head_in_bd;
            $ngoRenew->job_type = $request->job_type;
            $ngoRenew->address = $request->address;
            $ngoRenew->chief_name = $request->chief_name;
            $ngoRenew->chief_desi = $request->chief_desi;
            $ngoRenew->phone = $request->phone;
            $ngoRenew->nationality = $request->nationality;
            $ngoRenew->email = $request->email;
            $ngoRenew->mobile = $request->mobile;
            $ngoRenew->web_site_name = $request->web_site_name;
            $ngoRenew->mobile_new = $request->mobile_new;
            $ngoRenew->email_new = $request->email_new;
            $ngoRenew->phone_new = $request->phone_new;
            $ngoRenew->profession = $request->profession;
            $ngoRenew->yearly_budget = $request->yearly_budget;

            if (!empty($request->image_base64)) {
                $filePath = "ngoHead";
                $file = $request->file('digital_signature');
                $ngoRenew->digital_signature = CommonController::storeBase64($request->image_base64);

            }

            if (!empty($request->image_seal_base64)) {
                $filePath = "ngoHead";
                $file = $request->file('digital_seal');
                $ngoRenew->digital_seal = CommonController::storeBase64($request->image_seal_base64);

            }

            // if ($request->hasfile('digital_signature')) {

            //     $filePath="ngoHead";
            //     $file = $request->file('digital_signature');
            //     $ngoRenew->digital_signature =CommonController::imageUpload($request,$file,$filePath);

            // }

            // if ($request->hasfile('digital_seal')) {

            //     $filePath="ngoHead";
            //     $file = $request->file('digital_seal');
            //     $ngoRenew->digital_seal =CommonController::imageUpload($request,$file,$filePath);
            // }
            if ($request->hasfile('foregin_pdf')) {

                $file = $request->file('foregin_pdf');
                $ngoRenew->foregin_pdf = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('yearly_budget_file')) {

                $file = $request->file('yearly_budget_file');
                $ngoRenew->yearly_budget_file = CommonController::pdfUpload($request, $file, $filePath);

            }

            $ngoRenew->save();
            $mm_id = $ngoRenew->id;
            DB::commit();
            return redirect('ngoRenewStepTwo/' . base64_encode($mm_id));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function ngoRenewStepTwoUpdate(Request $request)
    {

        //dd($request->all());

        try {

            DB::beginTransaction();

            $time_dy = time() . date("Ymd");
            $filePath = "NgoRenewInfo";

            $ngoRenew = NgoRenewInfo::find($request->fileId);
            $ngoRenew->yearly_budget = $request->yearly_budget;
            if ($request->hasfile('foregin_pdf')) {
                $file = $request->file('foregin_pdf');
                $ngoRenew->foregin_pdf = CommonController::pdfUpload($request, $file, $filePath);
            }

            if ($request->hasfile('yearly_budget_file')) {

                $file = $request->file('yearly_budget_file');
                $ngoRenew->yearly_budget_file = CommonController::pdfUpload($request, $file, $filePath);

            }

            $ngoRenew->save();
            $mm_id = $ngoRenew->id;
            DB::commit();
            return redirect('/allStaffInformationForRenew');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function storeRenewInformationList(Request $request)
    {

        $request->validate([

            'digital_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:60|dimensions:width=300,height=80',
            'digital_seal' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:80|dimensions:width=300,height=100',
        ]);

        try {

            DB::beginTransaction();

            $time_dy = time() . date("Ymd");
            $filePath = "NgoRenewInfo";

            $ngoRenew = new NgoRenewInfo();
            $ngoRenew->fd_one_form_id = $request->id;
            $ngoRenew->user_id = Auth::user()->id;
            $ngoRenew->registration_number = $request->registration_number;
            $ngoRenew->organization_name = $request->organization_name;
            $ngoRenew->organization_address = $request->organization_address;
            $ngoRenew->address_of_head_office = $request->address_of_head_office;
            $ngoRenew->country_of_origin = $request->country_of_origin;
            $ngoRenew->name_of_head_in_bd = $request->name_of_head_in_bd;
            $ngoRenew->job_type = $request->job_type;
            $ngoRenew->address = $request->address;
            $ngoRenew->phone = $request->phone;
            $ngoRenew->email = $request->email;
            $ngoRenew->chief_name = $request->chief_name;
            $ngoRenew->chief_desi = $request->chief_desi;
            $ngoRenew->nationality = $request->nationality;
            $ngoRenew->mobile = $request->mobile;
            $ngoRenew->web_site_name = $request->web_site_name;
            $ngoRenew->mobile_new = $request->mobile_new;
            $ngoRenew->email_new = $request->email_new;
            $ngoRenew->phone_new = $request->phone_new;
            $ngoRenew->profession = $request->profession;
            $ngoRenew->yearly_budget = $request->yearly_budget;


            if (!empty($request->image_base64)) {
                $filePath = "ngoHead";
                $file = $request->file('digital_signature');
                $ngoRenew->digital_signature = CommonController::storeBase64($request->image_base64);

            }

            if (!empty($request->image_seal_base64)) {
                $filePath = "ngoHead";
                $file = $request->file('digital_seal');
                $ngoRenew->digital_seal = CommonController::storeBase64($request->image_seal_base64);

            }


            // if ($request->hasfile('digital_signature')) {
            //     $filePath="ngoHead";
            //     $file = $request->file('digital_signature');
            //     $ngoRenew->digital_signature =CommonController::imageUpload($request,$file,$filePath);

            //     }

            //     if ($request->hasfile('digital_seal')) {
            //         $filePath="ngoHead";
            //         $file = $request->file('digital_seal');
            //         $ngoRenew->digital_seal =CommonController::imageUpload($request,$file,$filePath);
            //     }

            if ($request->hasfile('foregin_pdf')) {

                $file = $request->file('foregin_pdf');
                $ngoRenew->foregin_pdf = CommonController::pdfUpload($request, $file, $filePath);

            }


            if ($request->hasfile('yearly_budget_file')) {

                $file = $request->file('yearly_budget_file');
                $ngoRenew->yearly_budget_file = CommonController::pdfUpload($request, $file, $filePath);

            }

            $ngoRenew->save();
            $mm_id = $ngoRenew->id;

            DB::commit();
            return redirect('ngoRenewStepTwo/' . base64_encode($mm_id));

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function renewInfo($id)
    {

        try {

            //dd(base64_decode($id));

            $getUserIdFrom = NgoRenew::where('id', base64_decode($id))->first();
            $all_partiw1 = FdOneForm::where('id', $getUserIdFrom->fd_one_form_id)->first();
            $get_all_data_new = NgoRenewInfo::where('fd_one_form_id', $getUserIdFrom->fd_one_form_id)->first();
            $all_partiw = FdOneMemberList::where('fd_one_form_id', $getUserIdFrom->fd_one_form_id)->get();
            $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id', $getUserIdFrom->fd_one_form_id)->first();

            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();

            if ($mainNgoType == 'দেশিও') {

                return view('front.renew.renewInfo', compact('get_all_data_adviser_bank', 'all_partiw1', 'all_partiw', 'get_all_data_new', 'getUserIdFrom'));

            } else {

                return view('front.renew.foreign.renewInfo', compact('get_all_data_adviser_bank', 'all_partiw1', 'all_partiw', 'get_all_data_new', 'getUserIdFrom'));

            }
        } catch (\Exception $e) {

            return $e;
        }
    }


    public function verifiedFdEightDownload(Request $request)
    {

        try {

            DB::beginTransaction();

            $fd9FormInfo = NgoRenewInfo::find($request->id);
            if ($request->hasfile('verified_fd_eight_form')) {

                $filePath = "fd8FormInfo";
                $file = $request->file('verified_fd_eight_form');
                $fd9FormInfo->verified_form = CommonController::pdfUpload($request, $file, $filePath);

            }
            $fd9FormInfo->save();

            DB::commit();
            return redirect()->back()->with('success', 'Update Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function renewChief(Request $request)
    {

        $name = $request->name;
        $designation = $request->designation;
        $id = $request->id;

        return $data = url('downloadRenewPdf/' . base64_encode($id));

    }

    public function downloadRenewPdf($id)
    {

        try {
            $get_all_data_new = NgoRenewInfo::where('id', base64_decode($id))->first();
            $all_partiw1 = FdOneForm::where('id', $get_all_data_new->fd_one_form_id)->first();
            $all_partiw = FdOneMemberList::where('fd_one_form_id', $get_all_data_new->fd_one_form_id)->get();
            $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id', $get_all_data_new->fd_one_form_id)->first();

            $file_Name_Custome = 'fd_eight_form';

            $data = view('front.renew.downloadRenewPdf', [
                'get_all_data_new' => $get_all_data_new,

                'all_partiw1' => $all_partiw1,
                'all_partiw' => $all_partiw,
                'get_all_data_adviser_bank' => $get_all_data_adviser_bank

            ])->render();


            $pdfFilePath = $file_Name_Custome . '.pdf';
            $mpdf = new Mpdf(['default_font' => 'nikosh']);
            $mpdf->WriteHTML($data);
            $mpdf->Output($pdfFilePath, "I");
            die();
        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }


    public function allStaffInformationForRenew()
    {

        try {

            $getUserIdFrom = FdOneForm::where('user_id', Auth::user()->id)->value('id');
            $all_partiw = FdOneMemberList::where('fd_one_form_id', $getUserIdFrom)->get();

            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();

            if ($mainNgoType == 'দেশিও') {

                return view('front.renew.all_staff_information_for_renew', compact('all_partiw'));

            } else {

                return view('front.renew.foreign.all_staff_information_for_renew', compact('all_partiw'));

            }

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function otherInformationForRenew()
    {
        try {

            $getLatestRenewInfo = NgoRenewInfo::where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')->value('id');

            $getUserIdFromNew = FdOneForm::where('user_id', Auth::user()->id)->value('id');
            $getUserIdFrom = NgoRenew::where('fd_one_form_id', $getUserIdFromNew)->orderBy('id', 'desc')->first();
            $all_partiw = FdOneBankAccount::where('fd_one_form_id', $getUserIdFromNew)->latest()->limit(1)->get();
            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();


            $mainNgoTypenewOldNgo = CommonController::newOldNgo();

            if ($mainNgoTypenewOldNgo == 'Old' || $mainNgoTypenewOldNgo == 'New') {

                $ngoOtherDocLists = DB::table('renewal_files')
                    ->where('renewInfoId', $getLatestRenewInfo)
                    ->where('fd_one_form_id', $getUserIdFromNew)->latest()->get();
                $ngoOtherDocListsFirst = DB::table('renewal_files')
                    ->where('renewInfoId', $getLatestRenewInfo)
                    ->where('fd_one_form_id', $getUserIdFromNew)->orderBy('id', 'desc')->first();
            } else {
                $ngoOtherDocLists = DB::table('ngo_other_docs')
                    ->where('fd_one_form_id', $getUserIdFromNew)->latest()->get();

            }


            if (count($ngoOtherDocLists) > 0) {
                return view('front.renew.completeList', compact('all_partiw', 'getUserIdFrom', 'getUserIdFromNew'));

            } else {
                return view('front.renew.other_information_for_renew', compact('all_partiw', 'getUserIdFrom', 'getUserIdFromNew'));

            }


        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function ngoRenewStepFour($id)
    {
        try {
            $mainId = base64_decode($id);
            $getUserIdFrom = FdOneForm::where('user_id', Auth::user()->id)->value('id');
            $all_partiw = FdOneBankAccount::where('fd_one_form_id', $getUserIdFrom)->latest()->limit(1)->get();
            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();
            return view('front.renew.ngoRenewStepFour', compact('all_partiw', 'mainId'));
        } catch (\Exception $e) {
            return redirect()->route('error_404');
        }
    }

    public function otherInformationForRenewNewPost(Request $request)
    {

        $input = $request->all();
        try {

            DB::beginTransaction();
            $condition_main_id = $input['id'];

            foreach ($condition_main_id as $key => $condition_main_id) {
                $form = FdOneMemberList::find($input['id'][$key]);
                $form->mobile = $input['staff_mobile'][$key];
                $form->email = $input['staff_email'][$key];

                $form->save();
            }
            DB::commit();
            return redirect()->route('otherInformationForRenew');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }

    public function ngoRenewStepFourUpdate(Request $request)
    {

//dd($request->all());
        $time_dy = time() . date("Ymd");
        try {
            DB::beginTransaction();

            $Ngorenewinfo_get_id = NgoRenewInfo::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->value('id');
            $filePath = "NgoRenewInfo";

            $ngoRenew = NgoRenewInfo::find($request->fileId);
            $ngoRenew->main_account_number = $request->main_account_number;
            $ngoRenew->main_account_type = $request->main_account_type;
            $ngoRenew->name_of_bank = $request->name_of_bank;
            $ngoRenew->main_account_name_of_branch = $request->main_account_name_of_branch;
            $ngoRenew->bank_address_main = $request->bank_address_main;

            if ($request->hasfile('change_ac_number')) {
                $file = $request->file('change_ac_number');

                $ngoRenew->change_ac_number = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('copy_of_chalan')) {
                $file = $request->file('copy_of_chalan');

                $ngoRenew->copy_of_chalan = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('due_vat_pdf')) {
                $file = $request->file('due_vat_pdf');

                $ngoRenew->due_vat_pdf = CommonController::pdfUpload($request, $file, $filePath);

            }
            $ngoRenew->save();

            DB::commit();
            return redirect('/otherInformationForRenew')->with('success', 'Renew Request Send Successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }


    }


    public function otherInformationForRenewGet(Request $request)
    {

        $time_dy = time() . date("Ymd");
        try {
            DB::beginTransaction();

            $Ngorenewinfo_get_id = NgoRenewInfo::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->value('id');
            $filePath = "NgoRenewInfo";

            $ngoRenew = NgoRenewInfo::find($Ngorenewinfo_get_id);
            $ngoRenew->main_account_number = $request->main_account_number;
            $ngoRenew->main_account_type = $request->main_account_type;
            $ngoRenew->name_of_bank = $request->name_of_bank;
            $ngoRenew->main_account_name_of_branch = $request->main_account_name_of_branch;
            $ngoRenew->bank_address_main = $request->bank_address_main;

            if ($request->hasfile('change_ac_number')) {
                $file = $request->file('change_ac_number');

                $ngoRenew->change_ac_number = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('copy_of_chalan')) {
                $file = $request->file('copy_of_chalan');

                $ngoRenew->copy_of_chalan = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('due_vat_pdf')) {
                $file = $request->file('due_vat_pdf');

                $ngoRenew->due_vat_pdf = CommonController::pdfUpload($request, $file, $filePath);

            }
            $ngoRenew->save();


            $getUserIdFrom = FdOneForm::where('user_id', Auth::user()->id)->value('id');
            $getLatestRenewInfo = NgoRenewInfo::where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')->value('id');

            $filePath = "RenewalFile";
            $newDataAll = new RenewalFile();
            $newDataAll->fd_one_form_id = $getUserIdFrom;
            $newDataAll->renewInfoId = $getLatestRenewInfo;
            $newDataAll->constitution_of_the_organization_has_changed = $request->constitution_of_the_organization_has_changed;
            if ($request->hasfile('constitution_of_the_organization_if_unchanged')) {

                $file = $request->file('constitution_of_the_organization_if_unchanged');
                $newDataAll->constitution_of_the_organization_if_unchanged = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('form_eight_executive_committee_member')) {

                $file = $request->file('form_eight_executive_committee_member');
                $newDataAll->form_eight_executive_committee_member = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('constitution_extra')) {

                $file = $request->file('constitution_extra');
                $newDataAll->constitution_extra = CommonController::pdfUpload($request, $file, $filePath);

            }


            if ($request->hasfile('last_ten_year_annual_report')) {

                $file = $request->file('last_ten_year_annual_report');
                $newDataAll->last_ten_year_annual_report = CommonController::pdfUpload($request, $file, $filePath);

            }


            if ($request->hasfile('nid_and_image_of_executive_committee_members')) {

                $file = $request->file('nid_and_image_of_executive_committee_members');
                $newDataAll->nid_and_image_of_executive_committee_members = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('approval_of_executive_committee')) {

                $file = $request->file('approval_of_executive_committee');
                $newDataAll->approval_of_executive_committee = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('committee_members_list')) {

                $file = $request->file('committee_members_list');
                $newDataAll->committee_members_list = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('registration_renewal_fee')) {

                $file = $request->file('registration_renewal_fee');
                $newDataAll->registration_renewal_fee = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('list_of_board_of_directors_or_board_of_trustees')) {

                $file = $request->file('list_of_board_of_directors_or_board_of_trustees');
                $newDataAll->list_of_board_of_directors_or_board_of_trustees = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('organization_by_laws_or_constitution')) {

                $file = $request->file('organization_by_laws_or_constitution');
                $newDataAll->organization_by_laws_or_constitution = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('work_procedure_of_organization')) {

                $file = $request->file('work_procedure_of_organization');
                $newDataAll->work_procedure_of_organization = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('last_ten_years_audit_report_and_annual_report_of_the_company')) {

                $file = $request->file('last_ten_years_audit_report_and_annual_report_of_the_company');
                $newDataAll->last_ten_years_audit_report_and_annual_report_of_the_company = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('registration_certificate')) {

                $file = $request->file('registration_certificate');
                $newDataAll->registration_certificate = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('attested_copy_of_latest_registration_or_renewal_certificate')) {

                $file = $request->file('attested_copy_of_latest_registration_or_renewal_certificate');
                $newDataAll->attested_copy_of_latest_registration_or_renewal_certificate = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('right_to_information_act')) {

                $file = $request->file('right_to_information_act');
                $newDataAll->right_to_information_act = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('the_constitution_of_the_company_along_with_fee_if_changed')) {

                $file = $request->file('the_constitution_of_the_company_along_with_fee_if_changed');
                $newDataAll->the_constitution_of_the_company_along_with_fee_if_changed = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('constitution_approved_by_primary_registering_authority')) {

                $file = $request->file('constitution_approved_by_primary_registering_authority');
                $newDataAll->constitution_approved_by_primary_registering_authority = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('clean_copy_of_the_constitution')) {

                $file = $request->file('clean_copy_of_the_constitution');
                $newDataAll->clean_copy_of_the_constitution = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('payment_of_change_fee')) {

                $file = $request->file('payment_of_change_fee');
                $newDataAll->payment_of_change_fee = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('section_sub_section_of_the_constitution')) {

                $file = $request->file('section_sub_section_of_the_constitution');
                $newDataAll->section_sub_section_of_the_constitution = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('previous_constitution_and_current_constitution_compare')) {

                $file = $request->file('previous_constitution_and_current_constitution_compare');
                $newDataAll->previous_constitution_and_current_constitution_compare = CommonController::pdfUpload($request, $file, $filePath);

            }

            $newDataAll->save();


            $dt = new DateTime();
            $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
            $main_time = $dt->format('H:i:s a');


            $ngo_list_all = FdOneForm::where('user_id', Auth::user()->id)->first();

            $add_renew_request = new NgoRenew();
            $add_renew_request->fd_one_form_id = $ngo_list_all->id;
            $add_renew_request->time_for_api = $main_time;
            $add_renew_request->status = 'Review';
            $add_renew_request->save();
            DB::commit();

            return redirect('renewInfo/' . base64_encode($add_renew_request->id))->with('success', 'Review Your Renew Request,Then Send To Ngo');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }

    public function foreginPdfDownload($id)
    {

        try {

            $get_file_data = NgoRenewInfo::where('id', base64_decode($id))->value('foregin_pdf');

            $file_path = url('public/' . $get_file_data);
            $filename = pathinfo($file_path, PATHINFO_FILENAME);
            $file = public_path('/') . $get_file_data;

            $headers = array(
                'Content-Type: application/pdf',
            );

            return Response::make(file_get_contents($file), 200, [
                'content-type' => 'application/pdf',
            ]);

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function yearlyBudgetPdfDownload($id)
    {

        try {

            $get_file_data = NgoRenewInfo::where('id', base64_decode($id))->value('yearly_budget');

            $file_path = url('public/' . $get_file_data);
            $filename = pathinfo($file_path, PATHINFO_FILENAME);
            $file = public_path('/') . $get_file_data;

            $headers = array(
                'Content-Type: application/pdf',
            );

            return Response::make(file_get_contents($file), 200, [
                'content-type' => 'application/pdf',
            ]);

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function copyOfChalanPdfDownload($id)
    {
        try {

            $get_file_data = NgoRenewInfo::where('id', base64_decode($id))->value('copy_of_chalan');

            $file_path = url('public/' . $get_file_data);
            $filename = pathinfo($file_path, PATHINFO_FILENAME);
            $file = public_path('/') . $get_file_data;

            $headers = array(
                'Content-Type: application/pdf',
            );

            return Response::make(file_get_contents($file), 200, [
                'content-type' => 'application/pdf',
            ]);

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }

    public function dueVatPdfDownload($id)
    {

        try {

            $get_file_data = NgoRenewInfo::where('id', base64_decode($id))->value('due_vat_pdf');

            $file_path = url('public/' . $get_file_data);
            $filename = pathinfo($file_path, PATHINFO_FILENAME);
            $file = public_path('/') . $get_file_data;

            $headers = array(
                'Content-Type: application/pdf',
            );

            return Response::make(file_get_contents($file), 200, [
                'content-type' => 'application/pdf',
            ]);

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function changeAcNumberDownload($id)
    {

        try {

            $get_file_data = NgoRenewInfo::where('id', base64_decode($id))->value('change_ac_number');

            $file_path = url('public/' . $get_file_data);
            $filename = pathinfo($file_path, PATHINFO_FILENAME);
            $file = public_path('/') . $get_file_data;

            $headers = array(
                'Content-Type: application/pdf',
            );

            return Response::make(file_get_contents($file), 200, [
                'content-type' => 'application/pdf',
            ]);

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }


    public function finalRenewApplicationSubmit($id)
    {


        $new_data_add = NgoRenew::find(base64_decode($id));
        $new_data_add->status = 'Ongoing';
        $new_data_add->save();

        return redirect('/renew')->with('success', 'Submit To Ngo Sucessfully');


    }


    public function ngoRenewStepTwo($id)
    {
        try {
            $mainId = base64_decode($id);
            $get_all_data_new = NgoRenewInfo::where('user_id', Auth::user()->id)->latest()->get();
            $all_parti = FdOneForm::where('user_id', Auth::user()->id)->get();
            $ngo_list_all = FdOneForm::where('user_id', Auth::user()->id)->first();
            $name_change_list_all = NgoRenew::where('fd_one_form_id', $ngo_list_all->id)->latest()->get();

            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();

            return view('front.renew.ngoRenewStepTwo', compact('mainId', 'get_all_data_new', 'ngo_list_all', 'name_change_list_all', 'all_parti'));


        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }


    }
}

