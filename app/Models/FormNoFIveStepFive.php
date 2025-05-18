<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNoFiveStepFive extends Model
{
    use HasFactory;

    protected $table = "form_no_five_step_fives";

    protected $fillable = [
      'form_no_fives_id',
      'name_of_the_officer',
      'designation_of_the_officer',
      'joining_date',
      'travel_country',
      'organizing_organization_name',
      'organizing_organization_address',
      'name_of_training_course',
      'course_duration',
      'total_expense',
      'name_of_donor_organization',
      'country_name_of_donor_organization',
    ];
}
