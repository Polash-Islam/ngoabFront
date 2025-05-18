<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd2Fd3OtherInfo extends Model
{
    use HasFactory;

    protected $table = "fd2_fd3_other_infos";

    protected $fillable = [
        'fd2_form_for_fd3_form_id',
        'file_name',
        'file',

    ];
}
