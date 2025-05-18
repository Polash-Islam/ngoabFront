<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainMonitor extends Model
{
    use HasFactory;

    protected $table = "complain_monitors";

    protected $fillable = [
        'user_id',
        'status',
        'subject',
        'description',

    ];
}
