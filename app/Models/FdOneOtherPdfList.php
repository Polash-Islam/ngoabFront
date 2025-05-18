<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdOneOtherPdfList extends Model
{
    use HasFactory;
    protected $table = "fd_one_other_pdf_lists";



    protected $fillable = [
        'information_title',
        'fd_one_form_id',
        'information_pdf',
        'time_for_api',
    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
