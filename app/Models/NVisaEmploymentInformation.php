<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NVisaEmploymentInformation extends Model
{
    use HasFactory;

    protected $table = "n_visa_employment_information";

    protected $fillable = [
        'n_visa_id',
        'employed_designation',
        'date_of_arrival_in_bangladesh',
        'visa_type',
        'first_appoinment_date',
        'desired_effective_date',
        'travel_visa_cate',
        'visa_validity',
        'brief_job_description',
        'employee_justification',
        'desired_end_date',

];

public function nVisa()
    {
        return $this->belongsTo(NVisa::class,'n_visa_id');
    }

}
