<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentForExecutiveCommitteeApproval extends Model
{
    use HasFactory;

    protected $table = "document_for_executive_committee_approvals";

    protected $fillable = [
        'fdId',
        'file_one',
        'file_two',
        'file_three',
        'file_four',
        'file_five',
        'status'

];
}
