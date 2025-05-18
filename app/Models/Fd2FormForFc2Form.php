<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd2FormForFc2Form extends Model
{
    use HasFactory;

    public $table = "fd2_form_for_fc2_forms";

    protected $fillable = [
        'fd_one_form_id',
        'fc2_form_id',
        'ngo_name',
        'ngo_address',
        'ngo_prokolpo_name',
        'ngo_prokolpo_duration',
        'ngo_prokolpo_start_date',
        'ngo_prokolpo_end_date',
        'proposed_rebate_amount_bangladeshi_taka',
        'proposed_rebate_amount_in_foreign_currency',
        'fd_2_form_pdf',
        'status',

    ];
}
