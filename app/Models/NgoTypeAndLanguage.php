<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoTypeAndLanguage extends Model
{
    use HasFactory;

    protected $table = "ngo_type_and_languages";

    protected $fillable = [

        'ngo_type_new_old',
        'registration',
        'last_renew_date',
        'ngo_type',
        'ngo_language',
        'first_form_check_status',
        'time_for_api',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
