<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc1FormOtherFile extends Model
{
    use HasFactory;

    protected $table = "fc1_form_other_files";

    protected $fillable = [
        'fc1_form_id',
        'file_title',
        'file',

    ];

   
}
