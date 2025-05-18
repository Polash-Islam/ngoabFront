<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenewalFile extends Model
{
    use HasFactory;

    protected $table = 'renewal_files';

    protected $fillable = [

        'fd_one_form_id',
        'fd_eight_form_data',
        'final_fd_eight_form',
        'constitution_of_the_organization_has_changed',
        'list_of_board_of_directors_or_board_of_trustees',
        'organization_by_laws_or_constitution',
        'work_procedure_of_organization',
        'nid_and_image_of_executive_committee_members',
        'approval_of_executive_committee',
        'committee_members_list',
        'registration_renewal_fee',
        'last_ten_years_audit_report_and_annual_report_of_the_company',
        'registration_certificate',
        'attested_copy_of_latest_registration_or_renewal_certificate',
        'right_to_information_act',
        'the_constitution_of_the_company_along_with_fee_if_changed',
        'constitution_approved_by_primary_registering_authority',
        'clean_copy_of_the_constitution',
        'payment_of_change_fee',
        'section_sub_section_of_the_constitution',
        'previous_constitution_and_current_constitution_compare',
        'constitution_of_the_organization_if_unchanged',
        'time_for_api',
        'renewInfoId',
		'constitution_extra',
		'last_ten_year_annual_report',
		'form_eight_executive_committee_member',
        'final_fd_eight_form',

    ];
}
