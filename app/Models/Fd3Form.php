<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd3Form extends Model
{
    use HasFactory;

    protected $table = "fd3_forms";

    protected $fillable = [
        'fd_one_form_id',
        'ngo_name',
        'verified_fd_three_form',
        'ngo_address',
        'ngo_registration_number',
        'ngo_registration_date',
        'ngo_prokolpo_name',
        'ngo_prokolpo_duration',
        'project_approval_exemption_letter_memo_number',
        'project_approval_exemption_letter_date',
        'exemption_amount_in_previous_year',
        'money_received_in_the_previous_year',

        'date_of_payment',
        'type_of_foreign_grant',
        'foreign_grant_amount',
        'local_grant_amount',
        'description_and_price_of_goods',
        'relation_with_donor',


        'foreigner_donor_full_name',
        'foreigner_donor_occupation',
        'foreigner_donor_address',
        'foreigner_donor_telephone_number',
        'foreigner_donor_fax',
        'foreigner_donor_email',
        'foreigner_donor_nationality',
        'foreigner_donor_is_verified',
        'foreigner_donor_is_affiliatedrict',
        'organization_name',
        'organization_address',
        'organization_telephone_number',
        'organization_fax',
        'organization_email',
        'organization_website',
        'organization_is_verified',
        'organization_ceo_name',
        'organization_ceo_designation',


        'organization_senior_officer_name_one',
        'organization_senior_officer_designation_one',
        'organization_senior_officer_name_two',
        'organization_senior_officer_designation_two',
        'organization_name_of_executive_responsible_for_bd',
        'organization_name_of_executive_responsible_for_bd_designation',
        'objectives_of_the_organization',
        'communication_between_NGO_and_donor',
'time_for_api',
        'bank_name',
        'bank_address',
        'bank_account_name',
        'bank_account_number',
        'status',
        'comment',
        'file_last_check_date',
        'check_status',


];


}
