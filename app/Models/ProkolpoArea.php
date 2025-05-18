<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProkolpoArea extends Model
{
    use HasFactory;

    protected $table = "prokolpo_areas";

    protected $fillable = [
        'type',
        'formId',
        'user_id',
        'upload_type',
        'division_name',
        'district_name',
        'city_corparation_name',
        'upozila_name',
        'thana_name',
        'municipality_name',
        'ward_name',
        'prokolpo_type',
        'allocated_budget',
        'number_of_beneficiaries',

];


}
