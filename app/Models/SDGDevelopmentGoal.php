<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDGDevelopmentGoal extends Model
{
    use HasFactory;

    protected $table = "s_d_g_development_goals";

    protected $fillable = [

        'fc1_form_id',
        'goal',
        'target',
        'indicator',
        'budget_allocation',
        'rationality',
        'comment',

];


}
