<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoOtherDoc extends Model
{
    use HasFactory;

    protected $table = "ngo_other_docs";

    protected $fillable = [
        'pdf_file_list',
        'time_for_api',
        'fd_one_form_id',
        'file_size',

    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
