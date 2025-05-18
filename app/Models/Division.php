<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = 'divisions';
    protected $guarded = ['id'];

    public function getDistrict()
    {
        return $this->hasMany(District::class, 'division_id');
    }

}
