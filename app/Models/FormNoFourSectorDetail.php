<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNoFourSectorDetail extends Model
{
    use HasFactory;

    protected $table = "form_no_four_sector_details";

    protected $fillable = [
        'form_no_four_id',
        'work_area',
        'sector_detail',
        'target_real',
        'target_financial',
        'achievement_real',
        'achievement_financial',
        'comulative_achievement',
       'comment'
    ];


}
