<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CeoAndAttachFc1Form extends Model
{
    use HasFactory;

    protected $table = "ceo_and_attach_fc1_forms";

    protected $fillable = [
        'fc1_form_id',
        'ceo_name',
        'ceo_desi',
        'ceo_seal',
        'ceo_sing',
        'ceo_date',
        'audit_report',
        'donor_file',
        'donor_agency_file',
        'proof_of_audit_report',
        'final_report',
        'admin_file',

];



}
