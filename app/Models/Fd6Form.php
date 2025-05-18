<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd6Form extends Model
{
    use HasFactory;
    protected $table = "fd6_forms";

    protected $fillable = [
        'partner_ngo_status',
        'fd_one_form_id',
        'ngo_name',
        'subject_id',
        'ngo_registration_date',

        'ngo_last_renew_date',
        'ngo_expiration_date',
        'ngo_address',
        'ngo_telephone_number',
        'ngo_mobile_number',
        'ngo_email_address',
        'ngo_website',
        'ngo_prokolpo_name',
        'ngo_prokolpo_duration',
        'ngo_prokolpo_start_date',
        'ngo_prokolpo_end_date',
        'ngo_registration_date',
        'grants_received_from_abroad_first_year',
        'grants_received_from_abroad_second_year',
        'grants_received_from_abroad_third_year',
        'grants_received_from_abroad_fourth_year',
        'grants_received_from_abroad_fifth_year',
        'grants_received_from_abroad_total',
        'grants_received_from_abroad_comment',

        'donations_made_by_foreign_donors_first_year',
        'donations_made_by_foreign_donors_second_year',
        'donations_made_by_foreign_donors_third_year',
        'donations_made_by_foreign_donors_fourth_year',
        'donations_made_by_foreign_donors_fifth_year',
        'donations_made_by_foreign_donors_total',
        'donations_made_by_foreign_donors_comment',

        'local_grants_first_year',
        'local_grants_second_year',
        'local_grants_third_year',
        'local_grants_fourth_year',
        'local_grants_fifth_year',
        'local_grants_donors_total',
        'local_grants_donors_comment',

        'total_first_year',
        'total_second_year',
        'total_third_year',
        'total_fourth_year',
        'total_fifth_year',
        'total_donors_total',
        'total_donors_comment',

        'donor_organization_name',
        'donor_organization_address',
        'donor_organization_phone_mobile_email',
        'donor_organization_website',
        'money_laundering_and_terrorist_financing',
        'project_cost',
        'project_cost_ratio',
        'administrative_cost',
        'administrative_ratio',
        'project_and_administrative_cost',
        'project_and_administrative_cost_ratio',
        'project_name',
        'duration_of_project',
        'total_allocation_of_project',
        'total_allocation_in_project_area',
        'total_beneficiaries',
        'total_population_in_project_area',
        'donor_organization_name_two',
        'project_proposal_form',

        'status',
        'comment',
        'file_last_check_date',
        'check_status',


];
}
