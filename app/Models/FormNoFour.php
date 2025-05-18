<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNoFour extends Model
{
    use HasFactory;

    protected $table = "form_no_fours";

    protected $fillable = [
       'fd_one_form_id',
        'ngo_name',
        'prokolpo_name',
        'prokolpo_duration',
        'prokolpo_permission_no',
        'prokolpo_date',
        'prokolpo_report_time',
        'prokolpo_total_cost',
        'allocation_amount',
        'district_upazila_wise_total_expenditure',
        'district_upazila_wise_annual_allocation',
        'sign_board_avaiable_or_not',
        'prokolpo_sector_detail',
        'file_last_check_date',
        'check_status',
        'status',
        'comment',
        'sent_status',
    ];


}
