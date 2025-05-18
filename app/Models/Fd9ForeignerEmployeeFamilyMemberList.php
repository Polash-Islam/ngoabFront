<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fd9ForeignerEmployeeFamilyMemberList extends Model
{
    use HasFactory;

    protected $table = "fd9_foreigner_employee_family_member_lists";

    protected $fillable = [
        'fd9_form_id',
        'family_member_name',
        'family_member_age',

];

public function fd9Form()
{
    return $this->belongsTo(Fd9Form::class,'fd9_form_id');
}
}
