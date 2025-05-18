<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNoFive extends Model
{
    use HasFactory;

    protected $table = "form_no_fives";

    protected $fillable = [

        'fd_one_form_id',
        'prokolpo_name',
        'prokolpo_subject',
        'prokolpo_duration',
        'ngo_registration_number',
        'ngo_registration_date',
        'approved_estimated_expenditure_year_wise',
        'received_money_during_report',
        'report_year',
        'percentage_of_achievement_during_project',
        'prokolpo_araea',
        'prokolpo_subject_one',
        'prokolpo_name_one',
        'reporting_period',
        'approval_file_of_Bureau',
        'land_and_transport_detail',
        'foreign_tour_detail',
        'foreign_tour_file',
        'report_preparar_seal',
        'report_preparar_sign',
        'report_preparar_date',
        'file_last_check_date',
        'check_status',
        'status',
        'comment',
        'sent_status',
    ];
}
