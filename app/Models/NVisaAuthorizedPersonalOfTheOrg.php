<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NVisaAuthorizedPersonalOfTheOrg extends Model
{
    use HasFactory;

    protected $table = "n_visa_authorized_personal_of_the_orgs";

    protected $fillable = [
        'n_visa_id',
        'auth_person_org_name',
        'auth_person_org_house_no',
        'auth_person_org_flat_no',
        'auth_person_org_road_no',
        'auth_person_org_post_office',
        'auth_person_org_mobile',
        'auth_person_org_district',
        'auth_person_org_thana',
        'submission_date',
        'expatriate_name',
        'expatriate_email',

];

public function nVisa()
    {
        return $this->belongsTo(NVisa::class,'n_visa_id');
    }


}
