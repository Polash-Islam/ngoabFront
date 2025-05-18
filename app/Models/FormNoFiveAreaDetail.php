<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNoFiveAreaDetail extends Model
{
    use HasFactory;

    protected $table = "form_no_five_area_details";

    protected $fillable = [
      'form_no_fives_id',
      'division_name',
      'district_name',
      'city_corparation_name',
      'upozila_name',
      'thana_name',
      'municipality_name',
      'ward_name',
    ];
}
