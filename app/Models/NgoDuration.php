<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoDuration extends Model
{
    use HasFactory;

    protected $table = "ngo_durations";

    protected $fillable = [
        'fd_one_form_id',
        'ngo_duration_start_date',
        'ngo_duration_end_date',
        'ngo_status',
        'time_for_api',

    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }


}
