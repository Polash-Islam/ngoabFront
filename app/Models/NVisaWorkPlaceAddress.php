<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NVisaWorkPlaceAddress extends Model
{
    use HasFactory;

    protected $table = "n_visa_work_place_addresses";

    protected $fillable = [
        'n_visa_id',
        'work_house_no',
        'work_flat_no',
        'work_road_no',
        'work_org_type',
        'contact_person_mobile_number',
        'work_district',
        'work_thana',
        'work_email',

];

public function nVisa()
{
    return $this->belongsTo(NVisa::class,'n_visa_id');
}


}
