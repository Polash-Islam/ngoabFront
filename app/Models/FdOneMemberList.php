<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdOneMemberList extends Model
{
    use HasFactory;

    protected $table = "fd_one_member_lists";

    protected $fillable = [
        'name',
        'position',
        'address',
        'date_of_join',
        'citizenship',
        'mobile',
        'email',
        'salary_statement',
        'other_occupation',
        'now_working_at',
        'fd_one_form_id',
        'time_for_api',

    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
