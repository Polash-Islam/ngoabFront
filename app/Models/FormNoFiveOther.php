<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNoFiveOther extends Model
{
    use HasFactory;

    protected $table = "form_no_five_others";

    protected $fillable = [
      'form_no_fives_id',
      'name_of_the_officer_depend_on_salary',
      'nationality_of_the_officer_depend_on_salary',
      'designation_of_the_officer_depend_on_salary',
      'responsbility_of_the_officer_depend_on_salary',
      'education_of_the_officer_depend_on_salary',
      'experience_of_the_officer_depend_on_salary',
      'age_of_the_officer_depend_on_salary',
      'salary_of_the_officer_depend_on_salary',
      'other_allowances_or_benefits_of_the_officer_depend_on_salary',
      'job_duration_of_the_officer_depend_on_salary',
      'financial_benefit_received_from_any_other_scheme',
      'comment',
    ];
}
