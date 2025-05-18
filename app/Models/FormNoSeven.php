<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNoSeven extends Model
{
    use HasFactory;

    protected $table = "form_no_sevens";

    protected $fillable = [
        'fd_one_form_id',
    'district_address',
    'upazila_address',
    'submit_date',
    'ngo_name',
    'ngo_address',
    'ngo_name_address_comment',
    'ngo_head_name',
    'ngo_head_organization',
    'ngo_head_office_mobile',
    'ngo_head_office_email',
    'ngo_head_comment',
    'ngo_registration',
    'ngo_registration_date',
    'ngo_last_renewal_date',
    'ngo_duration',
    'ngo_reg_comment',
    'ngo_local_officer_name',
    'ngo_local_officer_designation',
    'ngo_local_officer_mobile',
    'ngo_local_officer_email',
    'ngo_local_officer_comment',
    'prokolpo_name',
    'prokolpo_subject',
    'prokolpo_duration',
    'prokolpo_fund',
    'prokolpo_comment',
    'prokolpo_approval_date',
    'prokolpo_sarok_number',
    'prokolpo_certificate_year_and_time',
    'prokolpo_approval_comment',
    'prokolpo_objecttive',
    'prokolpo_objecttive_comment',
    'allocation_for_projects_in_district_or_upazila',
    'this_year_under_discussion_multi_year_projects',
    'actual_expenditure_multi_year_projects',
    'direct_beneficiaries_quantity',
    'indirect_beneficiaries_quantity',
    'jurisdiction_comment',
    'project_inspected_time',
    'inspector_name',
    'inspector_designation',
    'inspector_mobile',
    'inspector_email',
    'inspector_comment',
    'beneficiaries_involved_with_local_administration',
    'beneficiaries_involved_comment',
    'regular_participation_in_meeting',
    'regular_participation_comment',
    'conditions_properly_met',
    'conditions_properly_comment',
    'main_ngo_name',
    'main_ngo_address',
    'main_ngo_comment',
    'sign_in_closing_report',
    'sign_in_closing_report_comment',
    'feedback_on_projects_implementedt',
    'recommendation_on_projects_implementedt',
    'onulipi',
    'signature_certifying_officer',
    'seal_certifying_officer',
    'name_certifying_officer',
    'designation_certifying_officer',
    'date_certifying_officer',
    'file_last_check_date',
    'check_status',
    'comment',
    'sarok_number',
    'mian_ngo_detail',
    'main_ngo_detail_comment',
    'last_comment',
    'project_copy_approved_by_burea',
    'project_copy_approved_by_burea_comment',
    'status',
    'sent_status',
    ];


}
