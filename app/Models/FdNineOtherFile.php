<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdNineOtherFile extends Model
{
    use HasFactory;

    protected $table = "fd_nine_other_files";

    protected $fillable = [
        'fd9_form_id',
        'file_name',
        'main_file'

];
}
