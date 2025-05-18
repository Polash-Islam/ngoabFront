<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc1Form extends Model
{
    use HasFactory;

    protected $table = "fc1_forms";

    protected $fillable = [
        'fd_one_form_id',
        'verified_fc_one_form',
        'purpose_of_donation',
        'ngo_name',
        'subject_id',
        'ngo_address',
        'ngo_telephone_number',
        'ngo_mobile_number',
        'ngo_email',
        'ngo_website',
        'ngo_prokolpo_start_date',
        'ngo_prokolpo_end_date',
        'ngo_district',
        'ngo_sub_district',
        'total_number_of_beneficiaries',
        'foreigner_donor_full_name',
        'foreigner_donor_occupation',
        'foreigner_donor_address',
        'foreigner_donor_telephone_number',
        'foreigner_donor_email',
        'foreigner_donor_nationality',
        'foreigner_donor_is_verified',
        'foreigner_donor_is_affiliatedrict',
        'organization_name',
        'organization_address',
        'organization_telephone_number',
        'organization_email',
        'organization_website',
        'organization_is_verified',
        'organization_ceo_name',
        'organization_ceo_designation',
        'organization_name_of_executive_responsible_for_bd',
        'organization_name_of_executive_responsible_for_bd_designation',
        'objectives_of_the_organization',
        'organization_letter_of_commitment',
        'organization_name_of_the_job_amount_of_money_and_duration_pdf',
        'organization_amount_of_foreign_currency',
        'equivalent_amount_of_bd_taka',
        'commodities_value_in_bangladeshi_currency',
        'bank_name',
        'bank_address',
        'bank_account_name',
        'bank_account_number',
        'status',
        'sent_status',
        'comment',
        'file_last_check_date',
        'check_status',
       'chief_name',
       'chief_desi',
        'digital_signature',
        'digital_seal',
'administrative_certificate',
       'last_final_report',
        'previous_audit_report',
      'donor_commitment_letter',
   'donor_agency_commitment_letter'


];
}
