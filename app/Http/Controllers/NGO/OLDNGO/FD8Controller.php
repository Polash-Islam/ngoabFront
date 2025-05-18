<?php

namespace App\Http\Controllers\NGO\OLDNGO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use PDF;
use Response;
use DateTime;
use DateTimezone;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\FdOneForm;
use App\Models\FdOneOtherPdfList;
use App\Models\FdOneBankAccount;
use App\Models\FdOneAdviserList;
use App\Models\FdOneSourceOfFund;
use App\Models\FdOneMemberList;
use App\Models\FormCompleteStatus;
use App\Models\NgoTypeAndLanguage;
use App\Models\FormEight;
use App\Models\NgoMemberList;
use App\Models\NgoOtherDoc;
use App\Models\NgoMemberNidPhoto;
use App\Models\NameChange;
use App\Models\NgoRenew;
use App\Models\RenewalFile;
use App\Models\NgoRenewInfo;
use App\Http\Controllers\NGO\CommonController;
class FD8Controller extends Controller
{
    public function addDataStepOneFd8($id){

        try{
            DB::beginTransaction();

            $deCodeId = base64_decode($id);

            $fdOneData = FdOneForm::where('id',$deCodeId)->first();
            $regnumber = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->first();

            FdOneForm::where('id',$deCodeId)->update(['registration_number' => $regnumber->registration]);

            $ngoRenew = new NgoRenewInfo();
            $ngoRenew->fd_one_form_id = $fdOneData->id;
            $ngoRenew->district_id = $fdOneData->district_id;
            $ngoRenew->user_id = Auth::user()->id;
            $ngoRenew->registration_number = $regnumber->registration;
            $ngoRenew->organization_name = $fdOneData->organization_name;
            $ngoRenew->organization_address = $fdOneData->organization_address;
            $ngoRenew->address_of_head_office = $fdOneData->address_of_head_office;
            $ngoRenew->country_of_origin = $fdOneData->country_of_origin;
            $ngoRenew->name_of_head_in_bd = $fdOneData->name_of_head_in_bd;
            $ngoRenew->job_type = $fdOneData->job_type;
            $ngoRenew->address = $fdOneData->address;
            $ngoRenew->phone = $fdOneData->tele_phone_number;
            $ngoRenew->email = $fdOneData->email;
            $ngoRenew->nationality = $fdOneData->nationality;
            $ngoRenew->mobile = $fdOneData->phone;
            $ngoRenew->web_site_name = $fdOneData->web_site_name;
            $ngoRenew->mobile_new = $fdOneData->org_mobile;
            $ngoRenew->email_new = $fdOneData->org_email;
            $ngoRenew->phone_new = $fdOneData->org_phone;
            $ngoRenew->profession = $fdOneData->profession;
            $ngoRenew->chief_name = $fdOneData->chief_name;
            $ngoRenew->chief_desi = $fdOneData->chief_desi;
            $ngoRenew->digital_signature = $fdOneData->digital_signature;
            $ngoRenew->digital_seal = $fdOneData->digital_seal;
            $ngoRenew->save();

            Session::put('newFd8Id',$ngoRenew->id);
            DB::commit();

            if($fdOneData->complete_status == 'save_and_exit_from_one'){

            return redirect('/dashboard');

            }else{

            return redirect('/ngoAllRegistrationForm');
            }

        } catch (\Exception $e) {

        DB::rollBack();
        return redirect()->route('error_404');

        }

    }


    public function addDataStepTwoFd8($id){
        try{

            DB::beginTransaction();

            $deCodeId = base64_decode($id);
            $fdOneData = FdOneForm::where('id',$deCodeId)->first();
            $regnumber = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->first();

            if(empty(Session::get('updateFd8Id'))){

               $ngoRenew = NgoRenewInfo::find(Session::get('newFd8Id'));

            }else{

                $ngoRenew = NgoRenewInfo::find(Session::get('newFd8Id'));
            }


            $ngoRenew->yearly_budget = $fdOneData->annual_budget;
            $ngoRenew->foregin_pdf = $fdOneData->foregin_pdf;
            $ngoRenew->yearly_budget_file =$fdOneData->annual_budget_file;
            $ngoRenew->save();

            Session::put('newFd8Id',$ngoRenew->id);

            if(empty(Session::get('updateFd8Id'))){

            }else{
            Session::forget('updateFd8Id');
            }

            DB::commit();

            if($fdOneData->complete_status == 'go_to_step_three'){

                return redirect('/allStaffDetailsInformation');

            }else{

                if($fdOneData->complete_status == 'save_and_exit_from_two' || $fdOneData->complete_status == 'exit_from_step_two_edit'){

                    return redirect('/dashboard');

                }else{

                return redirect('/ngoAllRegistrationForm');
                }

            }


        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }


    public function addDataStepThreeFd8($id){

        try{

            DB::beginTransaction();

            $deCodeId = base64_decode($id);

            $fdOneData = FdOneForm::where('id',$deCodeId)->first();
            $regnumber = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->first();

            $ngoRenew = NgoRenewInfo::find(Session::get('newFd8Id'));
            $ngoRenew->main_account_number = $fdOneData->account_number;
            $ngoRenew->main_account_type = $fdOneData->account_type;
            $ngoRenew->name_of_bank = $fdOneData->name_of_bank;
            $ngoRenew->main_account_name_of_branch = $fdOneData->branch_name_of_bank;
            $ngoRenew->bank_address_main = $fdOneData->bank_address;
            $ngoRenew->change_ac_number =$fdOneData->change_ac_number;
            $ngoRenew->copy_of_chalan =$fdOneData->copy_of_chalan;
            $ngoRenew->due_vat_pdf =$fdOneData->due_vat_pdf;
            $ngoRenew->save();

            Session::put('newFd8Id',$ngoRenew->id);

            DB::commit();

            if($fdOneData->complete_status == 'save_and_exit_from_four'){

                return redirect('/dashboard');

            }else{

            return redirect('/ngoAllRegistrationForm');

            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }

    }

    public function updateDataStepOneFd8($id){
        try{

            DB::beginTransaction();

            $deCodeId = base64_decode($id);

            $fdOneData = FdOneForm::where('id',$deCodeId)->first();

			//dd($fdOneData);
            $regnumber = NgoTypeAndLanguage::where('user_id',Auth::user()->id)->first();

            $renewId = NgoRenewInfo::where('fd_one_form_id',$deCodeId)->orderBy('id','desc')->value('id');

            FdOneForm::where('id',$deCodeId)->update(['registration_number' => $regnumber->registration]);

            $ngoRenew = NgoRenewInfo::find($renewId);
            $ngoRenew->fd_one_form_id = $fdOneData->id;
            $ngoRenew->district_id = $fdOneData->district_id;
            $ngoRenew->organization_name = $fdOneData->organization_name;
            $ngoRenew->organization_address = $fdOneData->organization_address;
            $ngoRenew->address_of_head_office = $fdOneData->address_of_head_office;
            $ngoRenew->country_of_origin = $fdOneData->country_of_origin;
            $ngoRenew->name_of_head_in_bd = $fdOneData->name_of_head_in_bd;
            $ngoRenew->job_type = $fdOneData->job_type;
            $ngoRenew->address = $fdOneData->address;
            $ngoRenew->phone = $fdOneData->tele_phone_number;
            $ngoRenew->email = $fdOneData->email;
            $ngoRenew->nationality = $fdOneData->nationality;
            $ngoRenew->mobile = $fdOneData->phone;
            $ngoRenew->web_site_name = $fdOneData->web_site_name;
            $ngoRenew->mobile_new = $fdOneData->org_mobile;
            $ngoRenew->email_new = $fdOneData->org_email;
            $ngoRenew->phone_new = $fdOneData->org_phone;
            $ngoRenew->profession = $fdOneData->profession;
            $ngoRenew->chief_name = $fdOneData->chief_name;
            $ngoRenew->chief_desi = $fdOneData->chief_desi;
            $ngoRenew->digital_signature = $fdOneData->digital_signature;
            $ngoRenew->digital_seal = $fdOneData->digital_seal;
            $ngoRenew->save();

            Session::put('newFd8Id',$ngoRenew->id);

            DB::commit();

            if($fdOneData->complete_status == 'go_to_step_two'){

                return redirect('/fieldOfProposedActivities');

            }elseif($fdOneData->complete_status == 'next_step_from_three'){
				return redirect('/fieldOfProposedActivities');
			}else{
                return redirect('/dashboard');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('error_404');
        }
    }


}
