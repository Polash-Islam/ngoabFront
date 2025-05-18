<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdOneAdviserList extends Model
{
    use HasFactory;

    protected $table = "fd_one_adviser_lists";

    protected $fillable = [
        'fd_one_form_id',
        'name',
        'information',
        'time_for_api',

];


    public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }
}
