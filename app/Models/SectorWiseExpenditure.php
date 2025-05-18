<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectorWiseExpenditure extends Model
{
    use HasFactory;

    protected $table = "sector_wise_expenditures";

    protected $fillable = [

        'fc1_form_id',
        'activities',
        'estimated_expenses',
        'work_area_district',
        'work_area_sub_district',
        'time_limit',
        'number_of_beneficiaries',

];

}
