<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationReceiveDetail extends Model
{
    use HasFactory;

    protected $table = "donation_receive_details";

    protected $fillable = [
        'fc1_form_id',
        'purpose_or_activities',
        'registration_sarok_number',
        'registration_date',
        'donor_name',
        'money_amount',
        'audit_report',
        'final_report',
        'local_certificate',
        'comment',

];


}
