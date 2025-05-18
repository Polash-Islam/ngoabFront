<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNoFiveStepTwo extends Model
{
    use HasFactory;

    protected $table = "form_no_five_step_twos";

    protected $fillable = [
      'form_no_fives_id',
      'sector_of_annexure_C',
      'sector_wise_budget',
      'activities_and_objectives',
      'activity_wise_segmented_budget',
      'activity_based_achievement_targets',
      'activity_based_actual_costing',
      'accounts_payable_total_actual_expenditure',
      'cumulative_progress_during_reporting_in_real',
      'cumulative_progress_during_reporting_in_financial',
      'comment',
    ];
}
