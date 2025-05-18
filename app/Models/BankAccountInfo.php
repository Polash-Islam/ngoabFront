<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccountInfo extends Model
{
    use HasFactory;

    protected $table = 'bank_account_infos';
    protected $guarded = ['id'];
}
