<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NVisaManpowerOfTheOffice extends Model
{
    use HasFactory;

    protected $table = "n_visa_manpower_of_the_offices";

    protected $fillable = [
        'n_visa_id',
        'local_executive',
        'local_supporting_staff',
        'local_total',
        'foreign_executive',
        'foreign_supporting_staff',
        'foreign_total',
        'gand_total',
        'local_ratio',
        'foreign_ratio',

];

public function nVisa()
    {
        return $this->belongsTo(NVisa::class,'n_visa_id');
    }

}
