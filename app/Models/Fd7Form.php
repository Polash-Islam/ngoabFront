<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd7Form extends Model
{
    use HasFactory;

    protected $table = "fd7_forms";

    protected $fillable = [
        'fd_one_form_id',
        'ngo_name',
        'ngo_address',
        'subject_id',
        'distribution_pdf',
        'relief_program_detail',
        'relief_program_pdf',
        'relevant_information',
        'relevant_information_pdf',
        'bank_detail',
        'bank_detail_pdf',
        'digital_signature',
        'digital_seal',
         'chief_name',
         'chief_desi',
        'ngo_registration_number',
        'ngo_registration_date',
        'ngo_prokolpo_name',
        'donor_organization_description',
        'donor_organization_chief_type',
        'donor_organization_chief_name',
        'donor_organization_name',
        'donor_organization_address',
        'donor_organization_phone',
        'donor_organization_email',
        'donor_organization_website',
        'ongoing_prokolpo_name',

        'total_prokolpo_cost',
        'date_of_bureau_approval',
        'bureau_approval_pdf',
        'percentage_of_the_original_project',
        'adverse_impact_on_the_ongoing_project',
        'letter_from_donor_agency_pdf',
        'ngo_prokolpo_start_date',

        'ngo_prokolpo_end_date',
        'relief_assistance_project_proposal_pdf',

        'status',
        'comment',
        'file_last_check_date',
        'check_status',


];
}
