<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd9Form extends Model
{
    use HasFactory;

    protected $table = "fd9_forms";

    protected $fillable = [
    'digital_signature',
       'digital_seal',
        'chief_name',
        'chief_desi',
        'fd_one_form_id',
        'fd9_foreigner_name',
        'fd9_father_name',
        'fd9_husband_or_wife_name',
        'fd9_mother_name',
        'fd9_birth_place',
        'fd9_dob',
        'fd9_passport_number',
        'fd9_passport_issue_date',
        'fd9_passport_expiration_date',
        'fd9_identification_mark_given_in_passport',
        'fd9_male_or_female',
        'fd9_marital_status',
        'fd9_nationality_or_citizenship',
        'fd9_details_if_multiple_citizenships',
        'fd9_previous_citizenship_is_grounds_for_non_retention',
        'fd9_current_address',
        'fd9_number_of_family_members',
        'fd9_academic_qualification',
        'fd9_technical_and_other_qualifications_if_any',
        'fd9_past_experience',
        'fd9_countries_that_have_traveled',
        'fd9_offered_post',
        'fd9_name_of_proposed_project',
        'fd9_date_of_appointment',
        'fd9_extension_date',
        'fd9_post_available_for_foreigner_and_working',
        'fd9_previous_work_experience_in_bangladesh',
        'fd9_total_foreigner_working',
        'fd9_other_information',
        'fd9_foreigner_passport_size_photo',
        'fd9_copy_of_passport',
        'verified_fd_nine_form',
        'status',
        'comment',
        'file_last_check_date',
        'check_status',

];

// public function nVisa()
// {
//     return $this->belongsTo(NVisa::class,'n_visa_id');
// }


public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }


    public function fd9ForeignerEmployeeFamilyMemberList()
    {
        return $this->hasMany(Fd9ForeignerEmployeeFamilyMemberList::class,'fd9_form_id');
    }
}
