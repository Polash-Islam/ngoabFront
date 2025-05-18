<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc2Form extends Model
{
    use HasFactory;

    protected $table = "fc2_forms";

    protected $fillable = [
        'fd_one_form_id',
        'verified_fc_two_form',
        'person_full_name',
        'person_father_name',
        'person_mother_name',
        'person_occupation',
        'person_nid',
        'subject_id',
        'person_passport',
        'person_tin',
        'person_nationality',
        'person_full_address',
        'person_tele_phone_number',
        'person_mobile',
        'person_email',
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
        'comment',
        'file_last_check_date',
        'check_status',
        'purpose_of_donation',
        'purpose_of_donation_pdf',
        'bond_paper_available_or_not',
        'bond_paper_work_name',
        'bond_paper_amount',
        'bond_paper_duration',
        'bond_paper_pdf',
        'administrative_certificate',
        'last_final_report',
        'previous_audit_report',
        'donor_commitment_letter',
        'donor_agency_commitment_letter',
        'chief_name',
        'chief_desi',
        'digital_signature',
        'digital_seal',


];
}
