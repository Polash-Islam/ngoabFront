<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd2Fc2OtherInfo extends Model
{
    use HasFactory;

    protected $table = "fd2_fc2_other_infos";

    protected $fillable = [
        'fd2_form_for_fc2_form_id',
        'file_name',
        'file',

    ];
}
