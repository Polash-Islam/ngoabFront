<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormEight extends Model
{
    use HasFactory;

    protected $table = "form_eights";

    protected $fillable = [
        'job_picture',
        'job_sign',
        'name',
        'name_slug',
        'desi',
        'dob',
        'nid_no',
        'phone',
        'father_name',
        'present_address',
        'permanent_address',
        'name_supouse',
        'edu_quali',
        'profession',
        'job_des',
        'service_status',
        'remarks',
        'total_year',
        'to_date',
        'form_date',
        'fd_one_form_id',
        'time_for_api',
        'complete_status',
        'verified_form_eight',
        'name_one',
        'name_two',
        'designation_one',
        'designation_two',
        'signature_one',
        'signature_two',
        'seal_one',
        'seal_two',
'employee_add_status'

        ];


        public function fdOneForm()
        {
            return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
        }
}
