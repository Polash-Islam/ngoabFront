<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoRenewInfo extends Model
{
    use HasFactory;

    protected $table = "ngo_renew_infos";

    protected $fillable = [

         'digital_signature',
         'digital_seal',
         'yearly_budget_file',
         'chief_desi',
         'chief_name',
        'nationality',
        'registration_number',
        'organization_name',
        'organization_address',
        'address_of_head_office',
        'country_of_origin',
        'name_of_head_in_bd',
        'job_type',
        'address',
        'phone',
        'phone_new',
        'email',
        'email_new',
        'telephone_number',
        'telephone_number_new',
        'citizenship',
        'profession',
        'plan_of_operation',
        'district',
        'sub_district',
        'fee_paid_status',
        'supporting_paper',
        'foregin_pdf',
        'yearly_budget',
        'copy_of_chalan',
        'fd_one_form_id',
        'user_id',
        'main_account_type',
        'due_vat_pdf',
        'main_account_number',
        'change_ac_number',
        'main_account_name_of_branch',
        'name_of_bank',
        'bank_address_main',
        'web_site_name',
        'mobile_new',
        'mobile',

    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
