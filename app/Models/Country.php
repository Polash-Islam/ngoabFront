<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = "countries";

    protected $fillable = [
        'country_iso_code',
        'country_name_english',
        'country_name_bangla',
        'country_people_english',
        'country_people_bangla',

];
}
