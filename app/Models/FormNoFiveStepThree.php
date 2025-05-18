<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNoFiveStepThree extends Model
{
    use HasFactory;

    protected $table = "form_no_five_step_threes";

    protected $fillable = [
      'form_no_fives_id',
      'district_name',
      'upazila_name',
      'total_allocation_for_upazila',
      'total_actual_cost',
      'comment',
    ];


}
