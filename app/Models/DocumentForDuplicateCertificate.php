<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentForDuplicateCertificate extends Model
{
    use HasFactory;

    protected $table = "document_for_duplicate_certificates";

    protected $fillable = [
        'fd_one_form_id',
        'file_one',
        'file_two',
        'file_three',
        'file_four',
        'status'

];
}
