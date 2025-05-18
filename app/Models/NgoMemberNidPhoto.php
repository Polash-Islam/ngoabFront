<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NgoMemberNidPhoto extends Model
{
    use HasFactory;

    protected $table = "ngo_member_nid_photos";

    protected $fillable = [
        'member_name',
        'member_image',
        'member_nid_copy',
        'member_nid_copy_size',
        'time_for_api',
        'fd_one_form_id',

    ];

    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
