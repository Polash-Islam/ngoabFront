<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NVisaParticularsOfForeignIncumbnet extends Model
{
    use HasFactory;

    protected $table = "n_visa_particulars_of_foreign_incumbnets";

    protected $fillable = [
        'n_visa_id',
        'name_of_the_foreign_national',
        'nationality',
        'passport_no',
        'passport_issue_date',
        'passport_issue_place',
        'passport_expiry_date',
        'home_country',
        'org_district',
        'house_no',
        'flat_no',
        'road_no',
        'post_code',
        'state',
        'phone',
        'city',
        'fax_no',
        'email',
        'date_of_birth',
        'martial_status'

];

  public function nVisa()
    {
        return $this->belongsTo(NVisa::class,'n_visa_id');
    }

}
