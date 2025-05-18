<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdFourForm extends Model
{
    use HasFactory;

    protected $table = "fd_four_forms";

    protected $fillable = [
        'fd_one_form_id',
        'fd_four_one_form_id',
        'farm_name',
        'farm_detail',
        'prokolpo_duration',
        'ngo_name',
        'registration_number',
        'ngo_telephone',
        'ngo_website',
        'ngo_email',
        'prokolpo_name',
        'prokolpo_duration_one',
        'exam_time',
        'start_balance',
        'foreign_grant_taken_exam_year',
        'foreign_grant_cost_exam_year',
        'foreign_grant_remaining_exam_year',
        'ca_farm_seal',
        'ca_farm_sign',
        'ca_form_date',
        'ca_form_name',
        'ca_form_address',
        'file_last_check_date',
        'check_status',
        'status',
        'comment',

];


}
