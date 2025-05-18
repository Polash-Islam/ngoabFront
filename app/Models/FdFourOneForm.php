<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdFourOneForm extends Model
{
    use HasFactory;

    protected $table = "fd_four_one_forms";

    protected $fillable = [
        'fd_one_form_id',
        'prokolpo_name',
    'prokolpo_permission_sarok_no',
    'prokolpo_permission_sarok_date',
    'prokolpo_year',
    'prokolpo_amount_sarkrito_bangla_amount',
    'prokolpo_amount_sarkrito_date',
    'prokolpo_amount_grihito',
    'prokolpo_amount_grihito_date',
    'prokolpo_detail_file',
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
