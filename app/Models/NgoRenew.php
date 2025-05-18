<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoRenew extends Model
{
    use HasFactory;

    protected $table = "ngo_renews";

    protected $fillable = [

        'fd_one_form_id',
        'status',
        'comment',
        'time_for_api',
        'file_last_check_date',
        'check_status',

    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }


}
