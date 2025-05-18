<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $guarded = ['id'];

    public function getDivision(){
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function getUpazila(){
        return $this->hasMany(Upazila::class, 'district_id');
    }
}
