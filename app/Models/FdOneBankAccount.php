<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdOneBankAccount extends Model
{
    use HasFactory;

    protected $table = "fd_one_bank_accounts";

    protected $fillable = [
        'fd_one_form_id',
        'account_number',
        'account_type',
        'name_of_bank',
        'branch_name_of_bank',
        'bank_address',
        'time_for_api',
    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
