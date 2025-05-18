<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdFiveForm extends Model
{
    use HasFactory;

    protected $table = "fd_five_forms";

    protected $fillable = [
        'fdId',
        'file_one',
        'status',
        'file_last_check_date',
        'check_status',
        'sent_status'

];
}
