<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdOneForm extends Model
{
    use HasFactory;
    protected $table = "fd_one_forms";

    protected $fillable = [
        'place',
      'digital_signature',
         'digital_seal',
        'verified_fd_eight_form_old',
       'org_phone',
       'org_mobile',
        'org_email',
        'web_site_name',
        'nationality',
        'annual_budget_file',
       'copy_of_chalan',
          'due_vat_pdf',
           'change_ac_number',
        'foregin_pdf',
        'tele_phone_number',
        'chief_name',
        'chief_desi',
        'registration_number',
        'registration_number_given_by_admin',
        'organization_name',
        'organization_name_ban',
        'organization_address',
        'address_of_head_office',
        'address_of_head_office_eng',
        'country_of_origin',
        'name_of_head_in_bd',
        'job_type',
        'address',
        'district',
        'phone',
        'email',
        'citizenship',
        'profession',
        'plan_of_operation',
        'local_address',
        'annual_budget',
        'treasury_number',
        'attach_the__supporting_papers',
        'vat_invoice_number',
        'board_of_revenue_on_fees',
        'user_id',
        'time_for_api',
        'complete_status',
        'verified_fd_one_form',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getDistrict()
    {
        return $this->belongsTo(District::class,'district');
    }

    public function fdOneAdviserList()
    {
        return $this->hasMany(FdOneAdviserList::class,'fd_one_form_id');
    }


    public function fdOneBankAccount()
    {
        return $this->hasMany(FdOneBankAccount::class,'fd_one_form_id');
    }

    public function fdOneMemberList()
    {
        return $this->hasMany(FdOneMemberList::class,'fd_one_form_id');
    }

    public function fdOneOtherPdfList()
    {
        return $this->hasMany(FdOneOtherPdfList::class,'fd_one_form_id');
    }

    public function fdOneSourceOfFund()
    {
        return $this->hasMany(FdOneSourceOfFund::class,'fd_one_form_id');
    }

    public function formEight()
    {
        return $this->hasMany(FormEight::class,'fd_one_form_id');
    }
    public function ngoRenewInfo()
    {
        return $this->hasMany(NgoRenewInfo::class,'fd_one_form_id');
    }

    public function ngoRenew()
    {
        return $this->hasMany(NgoRenew::class,'fd_one_form_id');
    }

    public function ngoDuration()
    {
        return $this->hasMany(NgoDuration::class,'fd_one_form_id');
    }

    public function ngoNameChange()
    {
        return $this->hasMany(NgoNameChange::class,'fd_one_form_id');
    }

    public function ngoMemberList()
    {
        return $this->hasMany(NgoMemberList::class,'fd_one_form_id');
    }

    public function ngoMemberNidPhoto()
    {
        return $this->hasMany(NgoMemberNidPhoto::class,'fd_one_form_id');
    }

    public function ngoOtherDoc()
    {
        return $this->hasMany(NgoOtherDoc::class,'fd_one_form_id');
    }

    public function ngoStatus()
    {
        return $this->hasMany(NgoStatus::class,'fd_one_form_id');
    }



    public function fd9Form()
    {
        return $this->hasMany(Fd9Form::class,'fd_one_form_id');
    }


    public function fd9OneForm()
    {
        return $this->hasMany(Fd9OneForm::class,'fd_one_form_id');
    }

    public function nVisa()
    {
        return $this->hasMany(NVisa::class,'fd_one_form_id');
    }


}
