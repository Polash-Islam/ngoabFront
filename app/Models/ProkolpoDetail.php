<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProkolpoDetail extends Model
{
    use HasFactory;

    protected $table = "prokolpo_details";

    protected $fillable = [
        'type',
        'formId',
        'status',

];


}
