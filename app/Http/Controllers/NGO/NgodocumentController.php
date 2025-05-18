<?php

namespace App\Http\Controllers\NGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use Response;
use App\Models\NgoOtherDoc;
use App\Models\FormCompleteStatus;
use DateTime;
use DateTimezone;
use App\Models\RenewalFile;
use App\Models\FdOneForm;
use App\Http\Controllers\NGO\CommonController;

class NgodocumentController extends Controller
{
    public function index()
    {


        CommonController::checkNgotype(1);
        $mainNgoType = CommonController::changeView();

        if ($mainNgoType == 'দেশিও') {
            return view('front.ngo_doc.index');
        } else {
            return view('front.foreign.ngo_doc.index');
        }


    }


    public function create()
    {

        return view('front.ngo_doc.create');

    }


    public function store(Request $request)
    {

        $time_dy = time() . date("Ymd");
        $dt = new DateTime();
        $dt->setTimezone(new DateTimezone('Asia/Dhaka'));
        try {
            DB::beginTransaction();

            $main_time = $dt->format('H:i:s a');
            $fdOneFormId = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->value('id');

            if ($request->main_ngo_type == 'Old') {


                $newDataAll = new RenewalFile();
                $newDataAll->fd_one_form_id = $fdOneFormId;
                if ($request->hasfile('form_eight_executive_committee_member')) {

                    $filePath = "RenewalFile";
                    $file = $request->file('form_eight_executive_committee_member');
                    $newDataAll->form_eight_executive_committee_member = CommonController::pdfUpload($request, $file, $filePath);
                }


                if ($request->hasfile('last_ten_year_annual_report')) {

                    $filePath = "RenewalFile";
                    $file = $request->file('last_ten_year_annual_report');
                    $newDataAll->last_ten_year_annual_report = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('constitution_extra')) {

                    $filePath = "RenewalFile";
                    $file = $request->file('constitution_extra');
                    $newDataAll->constitution_extra = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('fd_eight_form_data')) {

                    $filePath = "RenewalFile";
                    $file = $request->file('fd_eight_form_data');
                    $newDataAll->fd_eight_form_data = CommonController::pdfUpload($request, $file, $filePath);

                }

                $newDataAll->constitution_of_the_organization_has_changed = $request->constitution_of_the_organization_has_changed;
                if ($request->hasfile('constitution_of_the_organization_if_unchanged')) {

                    $filePath = "RenewalFile";
                    $file = $request->file('constitution_of_the_organization_if_unchanged');
                    $newDataAll->constitution_of_the_organization_if_unchanged = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('nid_and_image_of_executive_committee_members')) {

                    $filePath = "RenewalFile";
                    $file = $request->file('nid_and_image_of_executive_committee_members');
                    $newDataAll->nid_and_image_of_executive_committee_members = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('approval_of_executive_committee')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('approval_of_executive_committee');
                    $newDataAll->approval_of_executive_committee = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('committee_members_list')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('committee_members_list');
                    $newDataAll->committee_members_list = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('registration_renewal_fee')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('registration_renewal_fee');
                    $newDataAll->registration_renewal_fee = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('list_of_board_of_directors_or_board_of_trustees')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('list_of_board_of_directors_or_board_of_trustees');
                    $newDataAll->list_of_board_of_directors_or_board_of_trustees = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('organization_by_laws_or_constitution')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('organization_by_laws_or_constitution');
                    $newDataAll->organization_by_laws_or_constitution = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('work_procedure_of_organization')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('work_procedure_of_organization');
                    $newDataAll->work_procedure_of_organization = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('last_ten_years_audit_report_and_annual_report_of_the_company')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('last_ten_years_audit_report_and_annual_report_of_the_company');
                    $newDataAll->last_ten_years_audit_report_and_annual_report_of_the_company = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('registration_certificate')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('registration_certificate');
                    $newDataAll->registration_certificate = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('attested_copy_of_latest_registration_or_renewal_certificate')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('attested_copy_of_latest_registration_or_renewal_certificate');
                    $newDataAll->attested_copy_of_latest_registration_or_renewal_certificate = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('right_to_information_act')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('right_to_information_act');
                    $newDataAll->right_to_information_act = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('the_constitution_of_the_company_along_with_fee_if_changed')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('the_constitution_of_the_company_along_with_fee_if_changed');
                    $newDataAll->the_constitution_of_the_company_along_with_fee_if_changed = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('constitution_approved_by_primary_registering_authority')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('constitution_approved_by_primary_registering_authority');
                    $newDataAll->constitution_approved_by_primary_registering_authority = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('clean_copy_of_the_constitution')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('clean_copy_of_the_constitution');
                    $newDataAll->clean_copy_of_the_constitution = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('payment_of_change_fee')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('payment_of_change_fee');
                    $newDataAll->payment_of_change_fee = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('section_sub_section_of_the_constitution')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('section_sub_section_of_the_constitution');
                    $newDataAll->section_sub_section_of_the_constitution = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('previous_constitution_and_current_constitution_compare')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('previous_constitution_and_current_constitution_compare');
                    $newDataAll->previous_constitution_and_current_constitution_compare = CommonController::pdfUpload($request, $file, $filePath);

                }


                $newDataAll->save();

            } else {

                $request->validate([
                    'pdf_file_list.*' => 'required|mimes:pdf',

                ]);


                $input = $request->all();
                $condition_main_image = $input['pdf_file_list'];

                foreach ($condition_main_image as $key => $all_condition_main_image) {

                    $file_size = number_format($input['pdf_file_list'][$key]->getSize() / 1048576, 2);
                    $filePath = "NgoOtherDoc";
                    $form = new NgoOtherDoc();
                    $file = $input['pdf_file_list'][$key];
                    $form->pdf_file_list = CommonController::pdfUpload($request, $file, $filePath);
                    $form->time_for_api = $main_time;
                    $form->fd_one_form_id = $fdOneFormId;
                    $form->file_size = $file_size;
                    $form->save();
                }

            }

            DB::commit();
            return redirect()->back()->with('success', 'Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'some thing went wrong ,this is why you redirect ');
        }

    }


    public function ngoDocumentFinal()
    {

        try {
            DB::beginTransaction();

            $checkCompleteStatusData = DB::table('form_complete_statuses')
                ->where('user_id', Auth::user()->id)
                ->first();

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
                $newStatusData->ngo_other_document_status = 1;
                $newStatusData->save();
            } else {

                FormCompleteStatus::where('id', $checkCompleteStatusData->id)
                    ->update([
                        'ngo_other_document_status' => 1
                    ]);


            }
            DB::commit();

            return redirect('ngoRegistrationFirstInfo');
//            return redirect('/ngoAllRegistrationForm');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function deleteRenewalFileDownload($title, $id)
    {


        if ($title == 'trustees') {
            $get_file_data = RenewalFile::where('id', $id)->value('list_of_board_of_directors_or_board_of_trustees');
        } elseif ($title == 'laws_or_constitution') {
            $get_file_data = RenewalFile::where('id', $id)->value('organization_by_laws_or_constitution');
        } elseif ($title == 'work_procedure') {
            $get_file_data = RenewalFile::where('id', $id)->value('work_procedure_of_organization');
        } elseif ($title == 'last_ten_years') {
            $get_file_data = RenewalFile::where('id', $id)->value('last_ten_years_audit_report_and_annual_report_of_the_company');
        } elseif ($title == 'registration_or_renewal_certificate') {
            $get_file_data = RenewalFile::where('id', $id)->value('attested_copy_of_latest_registration_or_renewal_certificate');
        } elseif ($title == 'registration_certificate') {
            $get_file_data = RenewalFile::where('id', $id)->value('registration_certificate');
        } elseif ($title == 'right_to_information_act') {
            $get_file_data = RenewalFile::where('id', $id)->value('right_to_information_act');
        } elseif ($title == 'fee_if_changed') {
            $get_file_data = RenewalFile::where('id', $id)->value('the_constitution_of_the_company_along_with_fee_if_changed');
        } elseif ($title == 'primary_registering_authority') {
            $get_file_data = RenewalFile::where('id', $id)->value('constitution_approved_by_primary_registering_authority');
        } elseif ($title == 'clean_copy_of_the_constitution') {
            $get_file_data = RenewalFile::where('id', $id)->value('clean_copy_of_the_constitution');
        } elseif ($title == 'payment_of_change_fee') {
            $get_file_data = RenewalFile::where('id', $id)->value('payment_of_change_fee');
        } elseif ($title == 'section_sub_section_of_the_constitution') {
            $get_file_data = RenewalFile::where('id', $id)->value('section_sub_section_of_the_constitution');
        } elseif ($title == 'previous_constitution') {
            $get_file_data = RenewalFile::where('id', $id)->value('previous_constitution_and_current_constitution_compare');
        } elseif ($title == 'organization_if_unchanged') {
            $get_file_data = RenewalFile::where('id', $id)->value('constitution_of_the_organization_if_unchanged');
        } elseif ($title == 'nid_and_image_of_executive_committee_members') {
            $get_file_data = RenewalFile::where('id', $id)->value('nid_and_image_of_executive_committee_members');
        } elseif ($title == 'approval_of_executive_committee') {
            $get_file_data = RenewalFile::where('id', $id)->value('approval_of_executive_committee');
        } elseif ($title == 'committee_members_list') {
            $get_file_data = RenewalFile::where('id', $id)->value('committee_members_list');
        } elseif ($title == 'registration_renewal_fee') {
            $get_file_data = RenewalFile::where('id', $id)->value('registration_renewal_fee');
        } elseif ($title == 'fd_eight_form_data') {
            $get_file_data = RenewalFile::where('id', $id)->value('fd_eight_form_data');
        } elseif ($title == 'form_eight_executive_committee_member') {
            $get_file_data = RenewalFile::where('id', $id)->value('form_eight_executive_committee_member');
        } elseif ($title == 'last_ten_year_annual_report') {
            $get_file_data = RenewalFile::where('id', $id)->value('last_ten_year_annual_report');
        } elseif ($title == 'constitution_extra') {
            $get_file_data = RenewalFile::where('id', $id)->value('constitution_extra');
        } elseif ($title == 'last_ten_year_annual_report') {
            $get_file_data = RenewalFile::where('id', $id)->value('last_ten_year_annual_report');
        }

        $file_path = url('public/' . $get_file_data);
        $filename = pathinfo($file_path, PATHINFO_FILENAME);

        $file = public_path('/') . $get_file_data;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
            'content-type' => 'application/pdf',
        ]);

    }


    public function renewFileDownloadFromView($title, $id)
    {


        if ($title == 'foregin_pdf') {
            $get_file_data = FdOneForm::where('id', $id)->value('foregin_pdf');

        } elseif ($title == 'copy_of_chalan') {
            $get_file_data = FdOneForm::where('id', $id)->value('copy_of_chalan');
        } elseif ($title == 'annual_file') {
            $get_file_data = FdOneForm::where('id', $id)->value('annual_budget_file');
        } elseif ($title == 'due_vat_pdf') {
            $get_file_data = FdOneForm::where('id', $id)->value('due_vat_pdf');
        } elseif ($title == 'change_ac_number') {
            $get_file_data = FdOneForm::where('id', $id)->value('change_ac_number');
        }

        $file_path = url('public/' . $get_file_data);
        $filename = pathinfo($file_path, PATHINFO_FILENAME);

        $file = public_path('/') . $get_file_data;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
            'content-type' => 'application/pdf',
        ]);

    }


    public function deleteRenewalFile($title, $id)
    {

        try {
            DB::beginTransaction();
            $newDataAll = RenewalFile::find($id);
            if ($title == 'trustees') {

                $newDataAll->list_of_board_of_directors_or_board_of_trustees = null;
            } elseif ($title == 'laws_or_constitution') {
                $newDataAll->organization_by_laws_or_constitution = null;
            } elseif ($title == 'work_procedure') {
                $newDataAll->work_procedure_of_organization = null;
            } elseif ($title == 'last_ten_years') {
                $newDataAll->last_ten_years_audit_report_and_annual_report_of_the_company = null;
            } elseif ($title == 'registration_or_renewal_certificate') {
                $newDataAll->attested_copy_of_latest_registration_or_renewal_certificate = null;
            } elseif ($title == 'registration_certificate') {
                $newDataAll->registration_certificate = null;
            } elseif ($title == 'right_to_information_act') {
                $newDataAll->right_to_information_act = null;
            } elseif ($title == 'fee_if_changed') {
                $newDataAll->the_constitution_of_the_company_along_with_fee_if_changed = null;
            } elseif ($title == 'primary_registering_authority') {
                $newDataAll->constitution_approved_by_primary_registering_authority = null;
            } elseif ($title == 'clean_copy_of_the_constitution') {
                $newDataAll->clean_copy_of_the_constitution = null;
            } elseif ($title == 'payment_of_change_fee') {
                $newDataAll->payment_of_change_fee = null;
            } elseif ($title == 'section_sub_section_of_the_constitution') {
                $newDataAll->section_sub_section_of_the_constitution = null;
            } elseif ($title == 'previous_constitution') {
                $newDataAll->previous_constitution_and_current_constitution_compare = null;
            } elseif ($title == 'organization_if_unchanged') {
                $newDataAll->constitution_of_the_organization_if_unchanged = null;
            } elseif ($title == 'nid_and_image_of_executive_committee_members') {
                $newDataAll->nid_and_image_of_executive_committee_members = null;
            } elseif ($title == 'approval_of_executive_committee') {
                $newDataAll->approval_of_executive_committee = null;
            } elseif ($title == 'committee_members_list') {
                $newDataAll->committee_members_list = null;
            } elseif ($title == 'registration_renewal_fee') {
                $newDataAll->registration_renewal_fee = null;
            } elseif ($title == 'fd_eight_form_data') {
                $newDataAll->fd_eight_form_data = null;
            } elseif ($title == 'constitution_extra') {
                $newDataAll->constitution_extra = null;
            } elseif ($title == 'last_ten_year_annual_report') {
                $newDataAll->last_ten_year_annual_report = null;
            } elseif ($title == 'form_eight_executive_committee_member') {
                $newDataAll->form_eight_executive_committee_member = null;
            } elseif ($title == 'last_ten_year_annual_report') {
                $newDataAll->last_ten_year_annual_report = null;
            }
            $newDataAll->save();
            DB::commit();
            return back()->with('error', 'Deleted successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


    public function ngoDocumentDownload($id)
    {

        $get_file_data = NgoOtherDoc::where('id', $id)->value('pdf_file_list');

        $file_path = url('public/' . $get_file_data);
        $filename = pathinfo($file_path, PATHINFO_FILENAME);
        $file = public_path('/') . $get_file_data;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::make(file_get_contents($file), 200, [
            'content-type' => 'application/pdf',
        ]);
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $admins = NgoOtherDoc::find($id);
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


    public function update(Request $request, $id)
    {


        try {
            DB::beginTransaction();
            $fdOneFormId = DB::table('fd_one_forms')->where('user_id', Auth::user()->id)->value('id');

            if ($request->main_ngo_type == 'Old') {

                $newDataAll = RenewalFile::find($id);

                if ($request->hasfile('form_eight_executive_committee_member')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('form_eight_executive_committee_member');
                    $newDataAll->form_eight_executive_committee_member = CommonController::pdfUpload($request, $file, $filePath);
                }


                if ($request->hasfile('last_ten_year_annual_report')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('last_ten_year_annual_report');
                    $newDataAll->last_ten_year_annual_report = CommonController::pdfUpload($request, $file, $filePath);
                }


                if ($request->hasfile('constitution_extra')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('constitution_extra');
                    $newDataAll->constitution_extra = CommonController::pdfUpload($request, $file, $filePath);
                }

                if ($request->hasfile('fd_eight_form_data')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('fd_eight_form_data');
                    $newDataAll->fd_eight_form_data = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('constitution_of_the_organization_if_unchanged')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('constitution_of_the_organization_if_unchanged');
                    $newDataAll->constitution_of_the_organization_if_unchanged = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('nid_and_image_of_executive_committee_members')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('nid_and_image_of_executive_committee_members');
                    $newDataAll->nid_and_image_of_executive_committee_members = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('approval_of_executive_committee')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('approval_of_executive_committee');
                    $newDataAll->approval_of_executive_committee = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('committee_members_list')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('committee_members_list');
                    $newDataAll->committee_members_list = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('registration_renewal_fee')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('registration_renewal_fee');
                    $newDataAll->registration_renewal_fee = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('list_of_board_of_directors_or_board_of_trustees')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('list_of_board_of_directors_or_board_of_trustees');
                    $newDataAll->list_of_board_of_directors_or_board_of_trustees = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('organization_by_laws_or_constitution')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('organization_by_laws_or_constitution');
                    $newDataAll->organization_by_laws_or_constitution = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('work_procedure_of_organization')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('work_procedure_of_organization');
                    $newDataAll->work_procedure_of_organization = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('last_ten_years_audit_report_and_annual_report_of_the_company')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('last_ten_years_audit_report_and_annual_report_of_the_company');
                    $newDataAll->last_ten_years_audit_report_and_annual_report_of_the_company = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('registration_certificate')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('registration_certificate');
                    $newDataAll->registration_certificate = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('attested_copy_of_latest_registration_or_renewal_certificate')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('attested_copy_of_latest_registration_or_renewal_certificate');
                    $newDataAll->attested_copy_of_latest_registration_or_renewal_certificate = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('right_to_information_act')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('right_to_information_act');
                    $newDataAll->right_to_information_act = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('the_constitution_of_the_company_along_with_fee_if_changed')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('the_constitution_of_the_company_along_with_fee_if_changed');
                    $newDataAll->the_constitution_of_the_company_along_with_fee_if_changed = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('constitution_approved_by_primary_registering_authority')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('constitution_approved_by_primary_registering_authority');
                    $newDataAll->constitution_approved_by_primary_registering_authority = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('clean_copy_of_the_constitution')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('clean_copy_of_the_constitution');
                    $newDataAll->clean_copy_of_the_constitution = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('payment_of_change_fee')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('payment_of_change_fee');
                    $newDataAll->payment_of_change_fee = CommonController::pdfUpload($request, $file, $filePath);

                }

                if ($request->hasfile('section_sub_section_of_the_constitution')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('section_sub_section_of_the_constitution');
                    $newDataAll->section_sub_section_of_the_constitution = CommonController::pdfUpload($request, $file, $filePath);

                }


                if ($request->hasfile('previous_constitution_and_current_constitution_compare')) {
                    $filePath = "RenewalFile";
                    $file = $request->file('previous_constitution_and_current_constitution_compare');
                    $newDataAll->previous_constitution_and_current_constitution_compare = CommonController::pdfUpload($request, $file, $filePath);

                }


                $newDataAll->save();


            } else {

                $time_dy = time() . date("Ymd");
                $filePath = "NgoOtherDoc";

                $updateOtherPdf = NgoOtherDoc::find($id);
                $updateOtherPdf->fd_one_form_id = $fdOneFormId;
                if ($request->hasfile('pdf_file_list')) {
                    $file_size = number_format($request->pdf_file_list->getSize() / 1048576, 2);
                    $file = $request->file('pdf_file_list');
                    $updateOtherPdf->pdf_file_list = CommonController::pdfUpload($request, $file, $filePath);
                    $updateOtherPdf->file_size = $file_size;

                }

                $updateOtherPdf->save();

            }
            DB::commit();
            return redirect()->back()->with('success', 'Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }
}
