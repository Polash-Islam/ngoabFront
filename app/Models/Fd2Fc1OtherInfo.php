<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd2Fc1OtherInfo extends Model
{
    use HasFactory;

    protected $table = "fd2_fc1_other_infos";

    protected $fillable = [
        'fd2_form_for_fc1_form_id',
        'file_name',
        'file',

    ];
}
