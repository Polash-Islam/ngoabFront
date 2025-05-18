<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormCompleteStatus extends Model
{
    use HasFactory;

    protected $table = "form_complete_statuses";



    protected $fillable = [
        'user_id',
        'fd_one_form_step_one_status',
        'fd_one_form_step_two_status',
        'fd_one_form_step_three_status',
        'fd_one_form_step_four_status',
        'form_eight_status',
        'ngo_member_status',
        'ngo_member_nid_photo_status',
        'ngo_other_document_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
