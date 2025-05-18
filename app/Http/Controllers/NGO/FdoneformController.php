<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NGO\CommonController;
use App\Models\BankAccountInfo;
use Illuminate\Http\Request;
use Session;
use App\Models\FdOneForm;
use App\Models\FdOneOtherPdfList;
use App\Models\FdOneBankAccount;
use App\Models\FdOneAdviserList;
use App\Models\FdOneSourceOfFund;
use App\Models\FdOneMemberList;
use App\Models\FormCompleteStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use PDF;
use App\Traits\Mpdf;
use DateTime;
use DateTimezone;
use Response;



class FdoneformController extends Controller
{
    use Mpdf;

    public function fromEightChiefForOldNgo(Request $request)
    {

        $name = $request->name;
        $designation = $request->designation;
        $id = $request->id;
        $place = $request->place;

        if ($place == 0) {

        } else {

            Session::put('place', $place);
        }

        return $data = url('fdFormEightInfoPdfOld');


    }


    public function fromOneChief(Request $request)
    {

        $name = $request->name;
        $designation = $request->designation;
        $id = $request->id;
        $place = $request->place;

        if ($place == 0) {

        } else {

            Session::put('place', $place);
        }

//        return $data = url('fdFormOneInfoPdf');
        return $data = url('fdFormOneInfoPdf/' . base64_encode($id));

    }


    public function backFromStepTwo()
    {

        try {

            $particularsOfOrganisationData = FdOneForm::where('user_id', Auth::user()->id)->get();
            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();

            $data['divisionList'] = DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();

            if ($mainNgoType == 'দেশিও') {

                return view('front.form.formone.particularsOfOrganisation', $data, compact('particularsOfOrganisationData'));
            } else {
                return view('front.form.foreign.formone.particularsOfOrganisation', $data, compact('particularsOfOrganisationData'));

            }

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function planOfOperation($id)
    {

        try {

            $get_file_data = FdOneForm::where('id', base64_decode($id))->value('plan_of_operation');

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


    public function attachTheSupportingPaper($id)
    {

        try {

            $get_file_data = FdOneForm::where('id', base64_decode($id))->value('attach_the__supporting_paper');

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

    public function otherInfoFromOneDownload($id)
    {

        try {

            $get_file_data = FdOneOtherPdfList::where('id', $id)->value('information_pdf');

            $file_path = url('public/' . $get_file_data);
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

    public function sourceOfFundDocDownload($id)
    {

        try {

            $get_file_data = FdOneSourceOfFund::where('id', $id)->value('letter_file');

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

    public function fdOneFormEdit()
    {


        try {

            $particularsOfOrganisationData = FdOneForm::where('user_id', Auth::user()->id)->get();
            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();
            $data['divisionList'] = \Illuminate\Support\Facades\DB::table('civilinfos')->groupBy('division_bn')->select('division_bn')->get();

            if ($mainNgoType == 'দেশিও') {
                return view('front.form.formone.particularsOfOrganisation', $data, compact('particularsOfOrganisationData'));
            } else {
                return view('front.form.foreign.formone.particularsOfOrganisation', $data, compact('particularsOfOrganisationData'));
            }

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }

    public function particularsOfOrganisation()
    {


        try {

            $formCompleteStatus = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->value('complete_status');

            if (empty($formCompleteStatus)) {

                $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->get();
                return view('front.form.formone.particularsOfOrganisation', compact('particularsOfOrganisationData'));

            } elseif ($formCompleteStatus == 'all_complete') {

                return $this->fdFormOneInfo();

            } elseif ($formCompleteStatus == 'save_and_exit_from_one') {

                $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->get();
                return view('front.form.formone.particularsOfOrganisation', compact('particularsOfOrganisationData'));

            } elseif ($formCompleteStatus == 'next_step_from_one') {

                $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->get();
                return view('front.form.formone.fieldOfProposedActivities', compact('particularsOfOrganisationData'));

            } elseif ($formCompleteStatus == 'save_and_exit_from_two') {

                $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->get();
                return view('front.form.formone.fieldOfProposedActivities', compact('particularsOfOrganisationData'));

            } elseif ($formCompleteStatus == 'next_step_from_two') {

                $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->get();
                $formOneMemberList = FdOneMemberList::where('fd_one_form_id', Session::get('mm_id'))->get();
                return view('front.form.formone.allStaffDetailsInformation', compact('particularsOfOrganisationData', 'formOneMemberList'));

            } elseif ($formCompleteStatus == 'next_step_from_three') {

                $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->get();
                return view('front.form.formone.othersInformation', compact('particularsOfOrganisationData'));

            } elseif ($formCompleteStatus == 'save_and_exit_from_three') {

                $particularsOfOrganisationData = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->get();
                $formOneMemberList = FdOneMemberList::where('fd_one_form_id', Session::get('mm_id'))->get();

                return view('front.form.formone.allStaffDetailsInformation', compact('particularsOfOrganisationData', 'formOneMemberList'));
            }

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }


    public function fieldOfProposedActivities()
    {

        try {

            CommonController::checkNgotype(1);
            $particularsOfOrganisationData = FdOneForm::where('user_id', Auth::user()->id)->get();
            $mainNgoType = CommonController::changeView();

            if ($mainNgoType == 'দেশিও') {

                return view('front.form.formone.fieldOfProposedActivities', compact('particularsOfOrganisationData'));
            } else {

                return view('front.form.foreign.formone.fieldOfProposedActivities', compact('particularsOfOrganisationData'));
            }

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }

    public function allStaffDetailsInformation()
    {

        try {

            CommonController::checkNgotype(1);
            $particularsOfOrganisationData = FdOneForm::where('user_id', Auth::user()->id)->get();
            $formOneMemberList = FdOneMemberList::where('fd_one_form_id', Session::get('mm_id'))->get();
            $mainNgoType = CommonController::changeView();

            if ($mainNgoType == 'দেশিও') {
                return view('front.form.formone.allStaffDetailsInformation', compact('particularsOfOrganisationData', 'formOneMemberList'));
            } else {
                return view('front.form.foreign.formone.allStaffDetailsInformation', compact('particularsOfOrganisationData', 'formOneMemberList'));
            }

        } catch (\Exception $e) {
            return redirect()->route('error_404');
        }
    }

    public function othersInformation()
    {
        try {
            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();
            $particularsOfOrganisationData = FdOneForm::where('user_id', Auth::user()->id)->get();

            $data['bankList'] = DB::table('banks')->get();
            $data['bankAccountInfo'] = BankAccountInfo::where('user_id', Auth::user()->id)->first();

            if ($mainNgoType == 'দেশিও') {
                return view('front.form.formone.othersInformation', $data, compact('particularsOfOrganisationData'));
            } else {
                return view('front.form.foreign.formone.othersInformation', $data, compact('particularsOfOrganisationData'));

            }

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }
    }


    public function fdFormOneInfo()
    {

        try {

            $allformOneData = FdOneForm::where('user_id', Auth::user()->id)->first();
            $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id', $allformOneData->id)->first();
            $get_all_data_other = DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id', $allformOneData->id)->get();
            $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id', $allformOneData->id)->get();
            $formOneMemberList = FdOneMemberList::where('fd_one_form_id', $allformOneData->id)->get();
            $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id', $allformOneData->id)->get();

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

        return view('front.form.formone.fdFormOneInfo', compact('get_all_source_of_fund_data', 'formOneMemberList', 'get_all_data_adviser', 'get_all_data_other', 'get_all_data_adviser_bank', 'allformOneData'));

    }


    public function particularsOfOrganisationPost(Request $request)
    {
        $r_number = mt_rand(1000000000000000, 9999999999999999);
        $arr_all = implode(",", $request->citizenship);

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
        $main_time = $dt->format('H:i:s');

        $ngoType = CommonController::changeView();

        if ($ngoType == 'দেশিও') {
            $request->validate([
                'organization_name' => 'required|string',
                'organization_name_ban' => 'required|string',
                'division_name' => 'required',
                'district_name' => 'nullable',
                'upozila_name' => 'nullable',
                'address_of_head_office_eng' => 'required|string',
                'organization_address' => 'required|string',
                'address_of_head_office' => 'required|string',
//                'country_of_origin' => 'required|string',
                'name_of_head_in_bd' => 'required|string',
                'job_type' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|string',
                'profession' => 'required|string',
                'submit_value' => 'required|string',
            ]);
        } else {
            $request->validate([
                'organization_name' => 'required|string',
                'organization_name_ban' => 'required|string',
                'address_of_head_office_eng' => 'required|string',
                'organization_address' => 'required|string',
                'address_of_head_office' => 'required|string',
                'country_of_origin' => 'required|string',
                'name_of_head_in_bd' => 'required|string',
                'job_type' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string',
                'email' => 'required|string',
                'profession' => 'required|string',
                'submit_value' => 'required|string',
            ]);
        }


        try {

            DB::beginTransaction();

            $uploadFormOneData = new FdOneForm();
            $uploadFormOneData->chief_name = $request->chief_name;
            $uploadFormOneData->chief_desi = $request->chief_desi;
            $uploadFormOneData->place = $request->place ?? null;
            $uploadFormOneData->division_name = $request->division_name ?? null;
            $uploadFormOneData->district_name = $request->district_name ?? null;
            $uploadFormOneData->upozila_name = $request->upozila_name ?? null;
//            $uploadFormOneData->district_id = $request->district_id;
            $uploadFormOneData->user_id = Auth::user()->id;
            $uploadFormOneData->registration_number = 0;
            $uploadFormOneData->local_address = 0;
            $uploadFormOneData->registration_number_given_by_admin = $r_number;
            $uploadFormOneData->organization_name = $request->organization_name;
            $uploadFormOneData->organization_name_ban = $request->organization_name_ban;
            $uploadFormOneData->address_of_head_office_eng = $request->address_of_head_office_eng;
            $uploadFormOneData->organization_address = $request->organization_address;
            $uploadFormOneData->address_of_head_office = $request->address_of_head_office;
            $uploadFormOneData->country_of_origin = $request->country_of_origin;
            $uploadFormOneData->name_of_head_in_bd = $request->name_of_head_in_bd;
            $uploadFormOneData->job_type = $request->job_type;
            $uploadFormOneData->address = $request->address;
            $uploadFormOneData->phone = $request->phone;
            $uploadFormOneData->tele_phone_number = $request->tele_phone_number;
            $uploadFormOneData->org_phone = $request->org_phone;
            $uploadFormOneData->org_mobile = $request->org_mobile;
            $uploadFormOneData->org_email = $request->org_email;
            $uploadFormOneData->web_site_name = $request->web_site_name;
            $uploadFormOneData->nationality = $request->nationality;
            $uploadFormOneData->email = $request->email;
            $uploadFormOneData->profession = $request->profession;
            $uploadFormOneData->citizenship = $arr_all;
            $uploadFormOneData->complete_status = $request->submit_value;
            $uploadFormOneData->time_for_api = $main_time;

            if (!empty($request->image_base64)) {
                $filePath = "ngoHead";
                $file = $request->file('digital_signature');
                $uploadFormOneData->digital_signature = CommonController::storeBase64($request->image_base64);

            }

            if (!empty($request->image_seal_base64)) {
                $filePath = "ngoHead";
                $file = $request->file('digital_seal');
                $uploadFormOneData->digital_seal = CommonController::storeBase64($request->image_seal_base64);

            }

            $uploadFormOneData->save();
            $mm_id = $uploadFormOneData->id;

            Session::put('mm_id', $mm_id);

            $checkCompleteStatusData = DB::table('form_complete_statuses')
                ->where('user_id', Auth::user()->id)
                ->first();

            if (!$checkCompleteStatusData) {

                $newStatusData = new FormCompleteStatus();
                $newStatusData->user_id = Auth::user()->id;
                $newStatusData->fd_one_form_step_one_status = 1;
                $newStatusData->fd_one_form_step_two_status = 0;
                $newStatusData->fd_one_form_step_three_status = 0;
                $newStatusData->fd_one_form_step_four_status = 0;
                $newStatusData->form_eight_status = 0;
                $newStatusData->ngo_member_status = 0;
                $newStatusData->ngo_member_nid_photo_status = 0;
                $newStatusData->ngo_other_document_status = 0;
                $newStatusData->save();
            } else {

                FormCompleteStatus::where('id', $checkCompleteStatusData->id)
                    ->update([
                        'fd_one_form_step_one_status' => 1
                    ]);


            }

            DB::commit();
            $newOldNgo = CommonController::newOldNgo();

            if ($newOldNgo == 'Old') {
                return redirect()->route('addDataStepOneFd8', base64_encode($mm_id));
            } else {
                if ($request->submit_value == 'save_and_exit_from_one') {
                    return redirect('/dashboard');
                } else {
                    return redirect('/ngoAllRegistrationForm');
                }
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }

    public function particularsOfOrganisationUpdate(Request $request)
    {

        try {

            DB::beginTransaction();

            $arr_all = implode(",", $request->citizenship);

            $uploadFormOneData = FdOneForm::find($request->id);
            $uploadFormOneData->user_id = Auth::user()->id;
            $uploadFormOneData->district_id = $request->district_id;
            $uploadFormOneData->place = $request->place;
            $uploadFormOneData->chief_name = $request->chief_name;
            $uploadFormOneData->chief_desi = $request->chief_desi;
            $uploadFormOneData->organization_name_ban = $request->organization_name_ban;
            $uploadFormOneData->organization_name = $request->organization_name;
            $uploadFormOneData->organization_address = $request->organization_address;
            $uploadFormOneData->address_of_head_office_eng = $request->address_of_head_office_eng;
            $uploadFormOneData->address_of_head_office = $request->address_of_head_office;
            $uploadFormOneData->country_of_origin = $request->country_of_origin;
            $uploadFormOneData->name_of_head_in_bd = $request->name_of_head_in_bd;
            $uploadFormOneData->job_type = $request->job_type;
            $uploadFormOneData->address = $request->address;
            $uploadFormOneData->phone = $request->phone;
            $uploadFormOneData->org_phone = $request->org_phone;
            $uploadFormOneData->org_mobile = $request->org_mobile;
            $uploadFormOneData->org_email = $request->org_email;
            $uploadFormOneData->web_site_name = $request->web_site_name;
            $uploadFormOneData->nationality = $request->nationality;
            $uploadFormOneData->tele_phone_number = $request->tele_phone_number;
            $uploadFormOneData->email = $request->email;
            $uploadFormOneData->profession = $request->profession;
            $uploadFormOneData->citizenship = $arr_all;
            $uploadFormOneData->complete_status = $request->submit_value;

            if (!empty($request->image_base64)) {

                $filePath = "ngoHead";
                $file = $request->file('digital_signature');
                $uploadFormOneData->digital_signature = CommonController::storeBase64($request->image_base64);

            }


            if (!empty($request->image_seal_base64)) {

                $filePath = "ngoHead";
                $file = $request->file('digital_seal');
                $uploadFormOneData->digital_seal = CommonController::storeBase64($request->image_seal_base64);

            }

            $uploadFormOneData->save();
            $mm_id = $uploadFormOneData->id;

            Session::put('mm_id', $mm_id);

            $checkCompleteStatusData = DB::table('form_complete_statuses')->where('user_id', Auth::user()->id)->first();

            if (!$checkCompleteStatusData) {

                $newStatusData = new FormCompleteStatus();
                $newStatusData->user_id = Auth::user()->id;
                $newStatusData->fd_one_form_step_one_status = 1;
                $newStatusData->fd_one_form_step_two_status = 0;
                $newStatusData->fd_one_form_step_three_status = 0;
                $newStatusData->fd_one_form_step_four_status = 0;
                $newStatusData->form_eight_status = 0;
                $newStatusData->ngo_member_status = 0;
                $newStatusData->ngo_member_nid_photo_status = 0;
                $newStatusData->ngo_other_document_status = 0;
                $newStatusData->save();
            } else {

                FormCompleteStatus::where('id', $checkCompleteStatusData->id)
                    ->update([
                        'fd_one_form_step_one_status' => 1
                    ]);


            }
            DB::commit();
            if ($request->submit_value == 'exit_from_step_one_edit') {

                $newOldNgo = CommonController::newOldNgo();

                if ($newOldNgo == 'Old') {

                    return redirect()->route('updateDataStepOneFd8', base64_encode($mm_id));

                } else {

                    return redirect('/dashboard');
                }


            } elseif ($request->submit_value == 'go_to_step_two') {

                Session::put('fdOneFormEdit', 'fdOneFormEdit');
                $newOldNgo = CommonController::newOldNgo();

                if ($newOldNgo == 'Old') {

                    return redirect()->route('updateDataStepOneFd8', base64_encode($mm_id));

                } else {

                    return redirect('/fieldOfProposedActivities');
                }

            } else {


                $newOldNgo = CommonController::newOldNgo();

                if ($newOldNgo == 'Old') {

                    return redirect()->route('updateDataStepOneFd8', base64_encode($mm_id));

                } else {

                    return redirect('/ngoAllRegistrationForm');
                }


            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function uploadFromOnePdf(Request $request)
    {

        try {

            DB::beginTransaction();

            $cutomeFileName = time() . date("Ymd");
            $uploadVerifiedPdf = FdOneForm::find($request->id);

            if ($request->hasfile('verified_fd_one_form')) {

                $filePath = "verifiedFdOneForm";
                $file = $request->file('verified_fd_one_form');
                $uploadVerifiedPdf->verified_fd_one_form = CommonController::pdfUpload($request, $file, $filePath);

            }
            $uploadVerifiedPdf->save();
            DB::commit();
            return redirect()->back()->with('success', 'Uploaded successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function uploadFromEightPdfOld(Request $request)
    {

        try {

            DB::beginTransaction();

            $cutomeFileName = time() . date("Ymd");
            $uploadVerifiedPdf = FdOneForm::find($request->id);

            if ($request->hasfile('verified_fd_eight_form_old')) {

                $filePath = "verifiedFdOneForm";
                $file = $request->file('verified_fd_eight_form_old');
                $uploadVerifiedPdf->verified_fd_eight_form_old = CommonController::pdfUpload($request, $file, $filePath);

            }
            $uploadVerifiedPdf->save();

            DB::commit();
            return redirect()->back()->with('success', 'Uploaded successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function sourceOfFundUpdate(Request $request)
    {
        try {


            $cutomeFileName = time() . date("Ymd");

            $uploadOneSourceOfFund = FdOneSourceOfFund::find($request->id);
            $uploadOneSourceOfFund->name = $request->name_sour;
            $uploadOneSourceOfFund->address = $request->address;
            if ($request->hasfile('letter_file')) {

                $filePath = "FdOneSourceOfFund";
                $file = $request->file('letter_file');
                $uploadOneSourceOfFund->letter_file = CommonController::pdfUpload($request, $file, $filePath);

            }
            $uploadOneSourceOfFund->save();


            return redirect()->back();
        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }

    public function adviserDataUpdate(Request $request)
    {

        try {
            DB::beginTransaction();

            $addAdviserData = FdOneAdviserList::find($request->id);
            $addAdviserData->name = $request->name;
            $addAdviserData->information = $request->information;
            $addAdviserData->save();
            DB::commit();
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }

    public function otherInformationAStore(Request $request)
    {
        try {
            DB::beginTransaction();

            $fdOneDataId = FdOneForm::where('user_id', Auth::user()->id)->value('id');

            $cutomeFileName = time() . date("Ymd");
            $otherInformationData = new FdOneOtherPdfList();
            $otherInformationData->fd_one_form_id = $fdOneDataId;
            $otherInformationData->information_title = $request->information_title;
            if ($request->hasfile('information_type')) {

                $filePath = "FdOneOtherPdfList";
                $file = $request->file('information_type');
                $otherInformationData->information_pdf = CommonController::pdfUpload($request, $file, $filePath);

            }
            $otherInformationData->save();

            DB::commit();
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function otherInformationAUpdate(Request $request)
    {

        try {
            DB::beginTransaction();

            $cutomeFileName = time() . date("Ymd");
            $otherInformationData = FdOneOtherPdfList::find($request->mid);

            if ($request->hasfile('letter_file')) {

                $filePath = "FdOneOtherPdfList";
                $file = $request->file('letter_file');
                $otherInformationData->information_pdf = CommonController::pdfUpload($request, $file, $filePath);

            }
            $otherInformationData->save();

            DB::commit();
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function sourceOfFundDelete(Request $request)
    {

        $admins = FdOneSourceOfFund::find($request->id);

        if (!is_null($admins)) {
            $admins->delete();
        }
        return back()->with('error', 'Deleted successfully!');
    }


    public function adviserDataDelete(Request $request)
    {
        try {

            DB::beginTransaction();
            $admins = FdOneAdviserList::find($request->id);
            if (!is_null($admins)) {
                $admins->delete();
            }

            DB::commit();
            return back()->with('error', 'Deleted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function otherInformationADelete(Request $request)
    {
        try {
            DB::beginTransaction();
            $admins = FdOneOtherPdfList::find($request->id);
            if (!is_null($admins)) {
                $admins->delete();
            }

            DB::commit();
            return back()->with('error', 'Deleted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function fieldOfProposedActivitiesUpdate(Request $request)
    {
        if (!empty($request->name_sour)) {

            $cutomeFileName = time() . date("Ymd");

            $uploadOneSourceOfFund = FdOneSourceOfFund::find($request->id);
            $uploadOneSourceOfFund->name = $request->name_sour;
            $uploadOneSourceOfFund->address = $request->address_sour;
            if ($request->hasfile('letter_file_sour')) {

                $filePath = "FdOneSourceOfFund";
                $file = $request->file('letter_file_sour');
                $uploadOneSourceOfFund->letter_file = CommonController::pdfUpload($request, $file, $filePath);

            }
            $uploadOneSourceOfFund->save();
        }


        $cutomeFileName = time() . date("Ymd");
        if ($request->oldOrNew == 'Old') {
            $request->validate([

                'annual_budget' => 'required|string',
                'submit_value' => 'required|string',
            ]);

        } else {
            $request->validate([
                // 'plan_of_operation'=>'required',
                'district' => 'required|string',
                'annual_budget' => 'required|string',
                'submit_value' => 'required|string',
            ]);
        }

        try {

            DB::beginTransaction();

            $updateDataStepTwo = FdOneForm::find($request->mid);
            $updateDataStepTwo->user_id = Auth::user()->id;
            $updateDataStepTwo->district = $request->district ?? null;
            $updateDataStepTwo->annual_budget = $request->annual_budget;

            if ($request->hasfile('foregin_pdf')) {
                $filePath = "FdOneForm";
                $file = $request->file('foregin_pdf');

                $updateDataStepTwo->foregin_pdf = CommonController::pdfUpload($request, $file, $filePath);

            }

            if ($request->hasfile('annual_budget_file')) {
                $filePath = "FdOneForm";
                $file = $request->file('annual_budget_file');

                $updateDataStepTwo->annual_budget_file = CommonController::pdfUpload($request, $file, $filePath);

            }
            if ($request->hasfile('plan_of_operation')) {
                $filePath = "FdOneForm";
                $file = $request->file('plan_of_operation');

                $updateDataStepTwo->plan_of_operation = CommonController::pdfUpload($request, $file, $filePath);

            }
            $updateDataStepTwo->complete_status = $request->submit_value;
            $updateDataStepTwo->save();

            $mm_id = $updateDataStepTwo->id;
            $stepTwoId = $updateDataStepTwo->id;
            $input = $request->all();

            if ($request->oldOrNew == 'Old') {

            } else {

                $personName = $input['name'];

                $dt = new DateTime();
                $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
                $main_time = $dt->format('H:i:s');

                if (array_key_exists("letter_file", $input)) {

                    $deleteData = FdOneSourceOfFund::where('fd_one_form_id', $stepTwoId)->delete();

                    foreach ($personName as $key => $personName) {

                        $form = new FdOneSourceOfFund();
                        $form->name = $input['name'][$key];
                        $form->address = $input['address'][$key];
                        $file = $input['letter_file'][$key];
                        $filePath = "FdOneSourceOfFund";
                        $form->letter_file = CommonController::pdfUpload($request, $file, $filePath);
                        $form->fd_one_form_id = $stepTwoId;
                        $form->time_for_api = $main_time;
                        $form->save();

                    }

                }

            }

            Session::put('mm_id', $stepTwoId);
            $checkCompleteStatusData = DB::table('form_complete_statuses')->where('user_id', Auth::user()->id)->first();

            if (!$checkCompleteStatusData) {

                $newStatusData = new FormCompleteStatus();
                $newStatusData->user_id = Auth::user()->id;
                $newStatusData->fd_one_form_step_one_status = 1;
                $newStatusData->fd_one_form_step_two_status = 1;
                $newStatusData->fd_one_form_step_three_status = 0;
                $newStatusData->fd_one_form_step_four_status = 0;
                $newStatusData->form_eight_status = 0;
                $newStatusData->ngo_member_status = 0;
                $newStatusData->ngo_member_nid_photo_status = 0;
                $newStatusData->ngo_other_document_status = 0;
                $newStatusData->save();
            } else {

                FormCompleteStatus::where('id', $checkCompleteStatusData->id)
                    ->update([
                        'fd_one_form_step_two_status' => 1
                    ]);


            }

            DB::commit();
            if ($request->submit_value == 'exit_from_step_two_edit') {

                $newOldNgo = CommonController::newOldNgo();

                if ($newOldNgo == 'Old') {

                    return redirect()->route('addDataStepTwoFd8', base64_encode($mm_id));

                } else {

                    return redirect('/dashboard');
                }

            } elseif ($request->submit_value == 'go_to_step_three') {

                Session::put('fdOneFormEditThree', 'go_to_step_three');
                $newOldNgo = CommonController::newOldNgo();

                if ($newOldNgo == 'Old') {

                    return redirect()->route('addDataStepTwoFd8', base64_encode($mm_id));

                } else {

                    return redirect('/allStaffDetailsInformation');
                }

            } else {


                $newOldNgo = CommonController::newOldNgo();

                if ($newOldNgo == 'Old') {

                    return redirect()->route('addDataStepTwoFd8', base64_encode($mm_id));

                } else {

                    if ($request->submit_value == 'save_and_exit_from_two') {

                        return redirect('/dashboard');

                    } else {

                        return redirect('/ngoAllRegistrationForm');
                    }

                }
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }

    public function singleStaffDetailsInformationAdd(Request $request)
    {

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
        $main_time = $dt->format('H:i:s');

        if (empty($request->citizenship)) {
            $arr_all = 0;
        } else {
            $arr_all = implode(",", $request->citizenship);
        }

        $dateFormate = date('Y-m-d', strtotime($request->date_of_join));

        try {
            DB::beginTransaction();

            $form = new FdOneMemberList();
            $form->name = $request->staff_name;
            $form->position = $request->staff_position;
            $form->now_working_at = $request->now_working_at;
            $form->address = $request->staff_address;
            $form->email = $request->staff_email;
            $form->mobile = $request->staff_mobile;
            $form->date_of_join = $dateFormate;
            $form->citizenship = $arr_all;
            $form->salary_statement = $request->salary_statement;
            $form->other_occupation = $request->other_occupation;
            $form->time_for_api = $main_time;
            $form->fd_one_form_id = $request->id;

            $form->nid_number = $request->nid_number;
            $form->passport_number = $request->passport_number;

            $form->nid_copy = $request->nid_copy;
            $form->passport_attachment = $request->passport_attachment;
            //$form->passport_photo = $request->passport_photo;



            $form->dob = $request->dob;


            if ($request->hasFile('nid_copy')) {
                $nidPath = 'nid_copy';
                $file = $request->file('nid_copy');
                $form->nid_copy = CommonController::pdfUpload($request, $file, $nidPath);
            }

            if ($request->hasFile('passport_attachment')) {
                $passportPath = 'passport_attachment';
                $file = $request->file('passport_attachment');
                $form->passport_attachment = CommonController::pdfUpload($request, $file, $passportPath);
            }
            if ($request->hasFile('passport_photo')) {
                $passport_photo = 'passport_photo';
                $file = $request->file('passport_photo');
                $form->passport_photo = CommonController::pdfUpload($request, $file, $passport_photo);
            }



            $form->dob= $request->dob;

            $form->save();


            DB::commit();


            return redirect()->back()->with('success', 'Member added successfully');


        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong, this is why you were redirected');
        }
    }



    public function singleStaffDetailsInformationUpdateRenew(Request $request, $id)
    {

        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
        $main_time = $dt->format('H:i:s');


        if (empty($request->citizenship)) {
            $arr_all = 0;
        } else {
            $arr_all = implode(",", $request->citizenship);
        }

        $dateFormate = date('Y-m-d', strtotime($request->date_of_join));


        try {

            DB::beginTransaction();


            $form = FdOneMemberList::find($id);
            $form->name = $request->staff_name;
            $form->position = $request->staff_position;
            $form->now_working_at = $request->now_working_at;
            $form->address = $request->staff_address;
            $form->email = $request->staff_email;
            $form->mobile = $request->staff_mobile;
            $form->date_of_join = $dateFormate;
            $form->citizenship = $arr_all;
            $form->salary_statement = $request->salary_statement;
            $form->other_occupation = $request->other_occupation;
            $form->time_for_api = $main_time;

            $form->nid_number = $request->nid_number;
            $form->passport_number = $request->passport_number;
            $form->dob= $request->dob;
            $form->nid_copy = $request->nid_copy;
            $form->passport_attachment= $request->passport_attachment;


            $form->save();

            DB::commit();
            return redirect('allStaffInformationForRenew')->with('success', 'member Update SuccessFully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'some thing went wrong ,this is why you redirected');
        }


    }


    public function singleStaffDetailsInformationUpdate(Request $request, $id)
    {


        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
        $main_time = $dt->format('H:i:s');


        if (empty($request->citizenship)) {
            $arr_all = 0;
        } else {
            $arr_all = implode(",", $request->citizenship);
        }

        $dateFormate = date('Y-m-d', strtotime($request->date_of_join));


        try {

            DB::beginTransaction();


            $form = FdOneMemberList::find($id);
            $form->name = $request->staff_name;
            $form->position = $request->staff_position;
            $form->now_working_at = $request->now_working_at;
            $form->address = $request->staff_address;
            $form->email = $request->staff_email;
            $form->mobile = $request->staff_mobile;
            $form->date_of_join = $dateFormate;
            $form->citizenship = $arr_all;
            $form->salary_statement = $request->salary_statement;
            $form->other_occupation = $request->other_occupation;
            $form->time_for_api = $main_time;

            $form->nid_number = $request->nid_number;
            $form->passport_number = $request->passport_number;
            $form->dob= $request->dob;
            $form->nid_copy = $request->nid_copy;
            $form->passport_attachment= $request->passport_attachment;

            if ($request->hasFile('nid_copy')) {
                $nidPath = 'nid_copy';
                $file = $request->file('nid_copy');
                $form->nid_copy = CommonController::pdfUpload($request, $file, $nidPath);
            }

            if ($request->hasFile('passport_attachment')) {
                $passportPath = 'passport_attachment';
                $file = $request->file('passport_attachment');
                $form->passport_attachment = CommonController::pdfUpload($request, $file, $passportPath);
            }

            if ($request->hasFile('passport_photo')) {
                $passport_photo = 'passport_photo';
                $file = $request->file('passport_photo');
                $form->passport_photo = CommonController::pdfUpload($request, $file, $passport_photo);
            }

            $form->save();

            DB::commit();

            return redirect('ngoAllRegistrationForm')->with('success', 'member Update SuccessFully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'some thing went wrong ,this is why you redirected');
        }


    }


    public function singleStaffDetailsInformationDelete($id)
    {

        $delete_all_the_data = FdOneMemberList::where('id', $id)->delete();
        return redirect()->back()->with('error', 'member added SuccessFully');
    }

    public function singleStaffDetailsInformationEdit($id)
    {
        //dd("asggasg");

        $allFormOneMemberList = FdOneMemberList::where('id', $id)->first();
        $mainNgoType = CommonController::changeView();
        return view('front.form.allStaffDetailsInformationEdit', compact('allFormOneMemberList', 'mainNgoType'));
    }


    public function singleStaffDetailsInformationEditRenew($id)
    {

        $allFormOneMemberList = FdOneMemberList::where('id', $id)->first();
        return view('front.renew.singleStaffDetailsInformationEditRenew', compact('allFormOneMemberList'));
    }


    public function allStaffDetailsInformationUpdate(Request $request)
    {
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
        $main_time = $dt->format('H:i:s');


        $allStaffDetailInfo = FdOneForm::find($request->id);
        $allStaffDetailInfo->user_id = Auth::user()->id;
        $allStaffDetailInfo->complete_status = $request->submit_value;
        $allStaffDetailInfo->save();

        $input = $request->all();


        $checkCompleteStatusData = DB::table('form_complete_statuses')->where('user_id', Auth::user()->id)->first();

        if (!$checkCompleteStatusData) {

            $newStatusData = new FormCompleteStatus();
            $newStatusData->user_id = Auth::user()->id;
            $newStatusData->fd_one_form_step_one_status = 1;
            $newStatusData->fd_one_form_step_two_status = 1;
            $newStatusData->fd_one_form_step_three_status = 1;
            $newStatusData->fd_one_form_step_four_status = 0;
            $newStatusData->form_eight_status = 0;
            $newStatusData->ngo_member_status = 0;
            $newStatusData->ngo_member_nid_photo_status = 0;
            $newStatusData->ngo_other_document_status = 0;
            $newStatusData->save();
        } else {

            FormCompleteStatus::where('id', $checkCompleteStatusData->id)
                ->update([
                    'fd_one_form_step_three_status' => 1
                ]);


        }
        DB::commit();
        if ($request->submit_value == 'exit_from_step_three_edit') {

            return redirect('/ngoAllRegistrationForm');

        } elseif ($request->submit_value == 'next_step_from_three') {


            Session::put('fdOneFormEditFour', 'next_step_from_three');

            return redirect('/othersInformation');

        } else {

            if ($request->submit_value == 'save_and_exit_from_three') {

                return redirect('/dashboard');

            } else {

                return redirect('/othersInformation');
            }
        }


    }

    public function othersInformationUpdate(Request $request)
    {
      // dd("asfasasg");
        if (!empty($request->information_type_other)) {

            if ($request->hasfile('information_type_other')) {

                $form2 = FdOneOtherPdfList::find($request->mid);
                $filePath = "FdOneOtherPdfList";
                $file = $request->file('information_type_other');
                $form2->information_pdf = CommonController::pdfUpload($request, $file, $filePath);
                $form2->save();
            }

            return redirect()->back()->with('success', 'Update SuccessFully');

        } else {

            $dt = new DateTime();
            $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
            $main_time = $dt->format('H:i:s a');
            $cutomeFileName = time() . date("Ymd");

            try {
                DB::beginTransaction();

                $stepFourData = FdOneForm::find($request->id);
                $stepFourData->user_id = Auth::user()->id;
                $stepFourData->treasury_number = $request->treasury_number;
                $stepFourData->vat_invoice_number = $request->vat_invoice_number;
                if ($request->hasfile('copy_of_chalan')) {
                    $filePath = "copy_of_chalan";
                    $file = $request->file('copy_of_chalan');
                    $stepFourData->copy_of_chalan = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('due_vat_pdf')) {
                    $filePath = "due_vat_pdf";
                    $file = $request->file('due_vat_pdf');
                    $stepFourData->due_vat_pdf = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('change_ac_number')) {
                    $filePath = "change_ac_number";
                    $file = $request->file('change_ac_number');
                    $stepFourData->change_ac_number = CommonController::pdfUpload($request, $file, $filePath);

                }
                if ($request->hasfile('attach_the__supporting_papers')) {
                    $filePath = "attach_the_supporting_papers";
                    $file = $request->file('attach_the__supporting_papers');
                    $stepFourData->attach_the__supporting_paper = CommonController::pdfUpload($request, $file, $filePath);

                }
                if ($request->hasfile('board_of_revenue_on_fees')) {
                    $file = $request->file('board_of_revenue_on_fees');
                    $filePath = "board_of_revenue_on_fees";
                    $stepFourData->board_of_revenue_on_fees = CommonController::pdfUpload($request, $file, $filePath);

                }

                $stepFourData->complete_status = $request->submit_value;
                $stepFourData->save();

                $mm_id = $stepFourData->id;
                $input = $request->all();

                if ($request->oldOrNew == 'Old' || $request->oldOrNew == 'New') {


                    if (empty($request->bank_id)) {

                        $form = new FdOneBankAccount();
                        $form->account_number = $request->account_number;
                        $form->account_type = $request->account_type;
                        $form->name_of_bank = $request->name_of_bank;
                        $form->branch_name_of_bank = $request->branch_name_of_bank;
                        $form->bank_address = $request->bank_address;
                        $form->fd_one_form_id = $request->id;
                        $form->time_for_api = $main_time;
                        $form->save();

                    } else {

                        $formBank = FdOneBankAccount::where('id', $request->bank_id)->value('id');

                        if (empty($formBank)) {

                            $form = new FdOneBankAccount();
                            $form->account_number = '2322';
                            $form->account_type = $request->account_type;
                            $form->name_of_bank = $request->name_of_bank;
                            $form->branch_name_of_bank = $request->branch_name_of_bank;
                            $form->bank_address = $request->bank_address;
                            $form->fd_one_form_id = $request->id;
                            $form->time_for_api = $main_time;
                            $form->save();

                        } else {

                            $form = FdOneBankAccount::find($request->bank_id);
                            $form->account_number = $request->account_number;
                            $form->account_type = $request->account_type;
                            $form->name_of_bank = $request->name_of_bank;
                            $form->branch_name_of_bank = $request->branch_name_of_bank;
                            $form->bank_address = $request->bank_address;
                            $form->fd_one_form_id = $request->id;
                            $form->time_for_api = $main_time;
                            $form->save();

                        }


                    }

                    if (array_key_exists("information_type", $input)) {

                        $new_cat_dec_new = $input['information_type'];

                        if (empty($new_cat_dec_new)) {


                        } else {
                            foreach ($new_cat_dec_new as $key => $new_cat_dec_new) {


                                $form2 = new FdOneOtherPdfList();
                                $filePath = "FdOneOtherPdfList";
                                $file = $input['information_type'][$key];
                                $form2->information_title = $input['information_title'][$key];
                                $form2->information_pdf = CommonController::pdfUpload($request, $file, $filePath);
                                $form2->fd_one_form_id = $request->id;
                                $form2->time_for_api = $main_time;
                                $form2->save();

                            }
                        }
                    }

                    $checkCompleteStatusData = DB::table('form_complete_statuses')->where('user_id', Auth::user()->id)->first();


                    if ($request->ngoOrigin == 'local') {

                        if ($request->oldOrNew == 'Old') {


                        } else {
                            if (in_array(null, $input['name'])) {

                            } else {

                                if (array_key_exists("name", $input)) {

                                    $new_cat_dec = $input['name'];
                                    foreach ($new_cat_dec as $key => $new_cat_dec) {

                                        $form1 = new FdOneAdviserList();
                                        $form1->name = $input['name'][$key];
                                        $form1->information = $input['information'][$key];
                                        $form1->fd_one_form_id = $request->id;
                                        $form1->time_for_api = $main_time;
                                        $form1->save();

                                    }

                                }

                            }
                        }

                        if (!$checkCompleteStatusData) {

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
                        } else {

                            FormCompleteStatus::where('id', $checkCompleteStatusData->id)
                                ->update([
                                    'fd_one_form_step_four_status' => 1,
                                    'ngo_member_status' => 1,
                                    'form_eight_status' => 1,
                                    'ngo_member_nid_photo_status' => 1,
                                    'ngo_other_document_status' => 0
                                ]);


                        }

                    } else {

                        if ($request->oldOrNew == 'Old') {

                        } else {
                            if (in_array(null, $input['name'])) {

                            } else {

                                if (array_key_exists("name", $input)) {

                                    $new_cat_dec = $input['name'];
                                    foreach ($new_cat_dec as $key => $new_cat_dec) {

                                        $form1 = new FdOneAdviserList();
                                        $form1->name = $input['name'][$key];
                                        $form1->information = $input['information'][$key];
                                        $form1->fd_one_form_id = $request->id;
                                        $form1->time_for_api = $main_time;
                                        $form1->save();

                                    }
                                }
                            }
                        }
                        if (!$checkCompleteStatusData) {

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
                        } else {

                            FormCompleteStatus::where('id', $checkCompleteStatusData->id)
                                ->update([
                                    'fd_one_form_step_four_status' => 1,
                                    'form_eight_status' => 1,
                                    'ngo_member_status' => 1,
                                    'ngo_member_nid_photo_status' => 1,
                                    'ngo_other_document_status' => 0
                                ]);


                        }


                    }

                } else {

                    if (empty($request->account_number)) {

                    } else {

                        if ($request->bank_id == 'p') {

                            $form = new FdOneBankAccount();
                            $form->account_number = $request->account_number;
                            $form->account_type = $request->account_type;
                            $form->name_of_bank = $request->name_of_bank;
                            $form->branch_name_of_bank = $request->branch_name_of_bank;
                            $form->bank_address = $request->bank_address;
                            $form->fd_one_form_id = $request->id;
                            $form->time_for_api = $main_time;
                            $form->save();

                        } else {

                            $form = FdOneBankAccount::find($request->bank_id);
                            $form->account_number = $request->account_number;
                            $form->account_type = $request->account_type;
                            $form->name_of_bank = $request->name_of_bank;
                            $form->branch_name_of_bank = $request->branch_name_of_bank;
                            $form->bank_address = $request->bank_address;
                            $form->fd_one_form_id = $request->id;
                            $form->time_for_api = $main_time;
                            $form->save();
                        }
                    }

                    $input = $request->all();

                    if (in_array(null, $input['name'])) {

                    } else {

                        if (array_key_exists("name", $input)) {

                            $new_cat_dec = $input['name'];
                            foreach ($new_cat_dec as $key => $new_cat_dec) {

                                $form1 = new FdOneAdviserList();
                                $form1->name = $input['name'][$key];
                                $form1->information = $input['information'][$key];
                                $form1->fd_one_form_id = $request->id;
                                $form1->time_for_api = $main_time;
                                $form1->save();

                            }

                        }

                    }

                    if (array_key_exists("information_type", $input)) {

                        $new_cat_dec_new = $input['information_type'];

                        foreach ($new_cat_dec_new as $key => $new_cat_dec_new) {

                            $form2 = new FdOneOtherPdfList();
                            $filePath = "FdOneOtherPdfList";
                            $file = $input['information_type'][$key];

                            $form2->information_pdf = CommonController::pdfUpload($request, $file, $filePath);
                            $form2->fd_one_form_id = $request->id;
                            $form2->time_for_api = $main_time;
                            $form2->save();

                        }

                    }

                    $checkCompleteStatusData = DB::table('form_complete_statuses')->where('user_id', Auth::user()->id)->first();

                    if ($request->ngoOrigin == 'local') {
                        if (!$checkCompleteStatusData) {

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
                        } else {

                            FormCompleteStatus::where('id', $checkCompleteStatusData->id)
                                ->update([
                                    'fd_one_form_step_four_status' => 1,
                                    'ngo_member_status' => 1,
                                    'form_eight_status' => 1,
                                    'ngo_member_nid_photo_status' => 1,
                                    'ngo_other_document_status' => 0
                                ]);

                        }

                    } else {

                        if (!$checkCompleteStatusData) {

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
                        } else {

                            FormCompleteStatus::where('id', $checkCompleteStatusData->id)
                                ->update([
                                    'fd_one_form_step_four_status' => 1,
                                    'form_eight_status' => 1,
                                    'ngo_member_status' => 1,
                                    'ngo_member_nid_photo_status' => 1,
                                    'ngo_other_document_status' => 0
                                ]);

                        }

                    }

                }

                $newOldNgo = CommonController::newOldNgo();
                DB::commit();

                if ($newOldNgo == 'Old') {

                    return redirect()->route('addDataStepThreeFd8', base64_encode($mm_id));

                } else {


                    if ($request->submit_value == 'save_and_exit_from_four') {

                        return redirect('/dashboard');

                    } else {

                        return redirect('/ngoAllRegistrationForm');

                    }


                }

            } catch (\Exception $e) {
                DB::rollBack();
                return redirect()->route('error_404');
            }

        }
    }




    public function fdFormEightInfoPdfOld()
    {

        try {

            $allformOneData = FdOneForm::where('user_id', Auth::user()->id)->first();
            $getNgoTypeForPdf = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)->value('ngo_type');
            $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id', $allformOneData->id)->first();
            $get_all_data_other = DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id', $allformOneData->id)->get();
            $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id', $allformOneData->id)->get();
            $formOneMemberList = FdOneMemberList::where('fd_one_form_id', $allformOneData->id)->get();
            $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id', $allformOneData->id)->get();


            $file_Name_Custome = '(এফডি-৮ ফরম)' . Auth::user()->user_name;

            $payment_detail = 11;

            $data = view('front.form.foreign.formone.fdFormEightInfoPdfOld', [
                'getNgoTypeForPdf' => $getNgoTypeForPdf,
                'get_all_source_of_fund_data' => $get_all_source_of_fund_data,
                'formOneMemberList' => $formOneMemberList,
                'get_all_data_adviser' => $get_all_data_adviser,
                'get_all_data_other' => $get_all_data_other,
                'get_all_data_adviser_bank' => $get_all_data_adviser_bank,
                'allformOneData' => $allformOneData

            ])->render();


            $pdfFilePath = $file_Name_Custome . '.pdf';
            $mpdf = $this->getMpdf();
            $mpdf->WriteHTML($data);
            $mpdf->Output($pdfFilePath, "I");
            die();

        } catch (\Exception $e) {

            return redirect()->route('error_404');
        }

    }


    public function fdFormOneInfoPdf()
    {
       // dd("asasgas");
//        try {
            $allformOneData = FdOneForm::where('user_id', Auth::user()->id)->first();
            $getNgoTypeForPdf = DB::table('ngo_type_and_languages')->where('user_id', Auth::user()->id)->value('ngo_type');
            $get_all_data_adviser_bank = DB::table('fd_one_bank_accounts')->where('fd_one_form_id', $allformOneData->id)->first();
            $get_all_data_other = DB::table('fd_one_other_pdf_lists')->where('fd_one_form_id', $allformOneData->id)->get();
            $get_all_data_adviser = DB::table('fd_one_adviser_lists')->where('fd_one_form_id', $allformOneData->id)->get();
            $formOneMemberList = FdOneMemberList::where('fd_one_form_id', $allformOneData->id)->get();
            $get_all_source_of_fund_data = DB::table('fd_one_source_of_funds')->where('fd_one_form_id', $allformOneData->id)->get();

            $file_Name_Custome = '(এফডি-১ ফরম)' . Auth::user()->user_name;
            $payment_detail = 11;
            CommonController::checkNgotype(1);
            $mainNgoType = CommonController::changeView();

            if ($mainNgoType == 'দেশিও') {

                $data = view('front.form.formone.fdFormOneInfoPdf', [
                    'getNgoTypeForPdf' => $getNgoTypeForPdf,
                    'get_all_source_of_fund_data' => $get_all_source_of_fund_data,
                    'formOneMemberList' => $formOneMemberList,
                    'get_all_data_adviser' => $get_all_data_adviser,
                    'get_all_data_other' => $get_all_data_other,
                    'get_all_data_adviser_bank' => $get_all_data_adviser_bank,
                    'allformOneData' => $allformOneData

                ])->render();

                $pdfFilePath = $file_Name_Custome . '.pdf';

                $mpdf = $this->getMpdf();

                $mpdf->WriteHTML($data);
                $mpdf->Output($pdfFilePath, "I");
                die();
            } else {

                $data = view('front.form.foreign.formone.fdFormOneInfoPdf', [
                    'getNgoTypeForPdf' => $getNgoTypeForPdf,
                    'get_all_source_of_fund_data' => $get_all_source_of_fund_data,
                    'formOneMemberList' => $formOneMemberList,
                    'get_all_data_adviser' => $get_all_data_adviser,
                    'get_all_data_other' => $get_all_data_other,
                    'get_all_data_adviser_bank' => $get_all_data_adviser_bank,
                    'allformOneData' => $allformOneData

                ])->render();


                $pdfFilePath = $file_Name_Custome . '.pdf';

                $mpdf = $this->getMpdf();
                $mpdf->WriteHTML($data);
                $mpdf->Output($pdfFilePath, "I");
                die();


            }

//        } catch (\Exception $e) {
//
//            return redirect()->route('error_404');
//        }

    }


}
