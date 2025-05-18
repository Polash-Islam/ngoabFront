<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd2FormOtherInfo extends Model
{
    use HasFactory;

    protected $table = "fd2_form_other_infos";

    protected $fillable = [
        'fd2_form_id',
        'file_name',
        'file',

    ];
}
