<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameChangeDoc extends Model
{
    use HasFactory;

    protected $table = "name_change_docs";

    protected $fillable = [
        'pdf_file_list',
        'time_for_api',
        'ngo_name_change_id',
        'file_size',

    ];
}
