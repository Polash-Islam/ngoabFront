<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdOneSourceOfFund extends Model
{
    use HasFactory;

    protected $table = "fd_one_source_of_funds";



    protected $fillable = [
        'fd_one_form_id',
        'address',
        'name',
        'letter_file',
        'time_for_api',
    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
