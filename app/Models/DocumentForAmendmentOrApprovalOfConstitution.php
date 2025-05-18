<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentForAmendmentOrApprovalOfConstitution extends Model
{
    use HasFactory;


    protected $table = "document_for_amendment_or_approval_of_constitutions";

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
