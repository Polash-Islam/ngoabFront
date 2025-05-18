<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd2Fd7OtherInfo extends Model
{
    use HasFactory;

    protected $table = "fd2_fd7_other_infos";

    protected $fillable = [
        'fd2_form_for_fd7_form_id',
        'file_name',
        'file',

    ];
}
