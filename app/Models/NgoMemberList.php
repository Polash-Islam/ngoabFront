<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoMemberList extends Model
{
    use HasFactory;

    protected $table = "ngo_member_lists";

    protected $fillable = [
        'member_name',
        'member_name_slug',
        'member_designation',
        'member_dob',
        'member_nid_no',
        'member_mobile',
        'member_father_name',
        'member_present_address',
        'member_permanent_address',
        'member_name_supouse',
        'time_for_api',
        'fd_one_form_id',
        'verified_file',

         ];

         public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
