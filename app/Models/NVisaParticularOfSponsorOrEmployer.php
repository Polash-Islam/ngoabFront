<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NVisaParticularOfSponsorOrEmployer extends Model
{
    use HasFactory;

    protected $table = "n_visa_particular_of_sponsor_or_employers";

    protected $fillable = [
        'n_visa_id',
        'org_name',
        'org_house_no',
        'org_flat_no',
        'org_road_no',
        'org_post_code',
        'org_post_office',
        'org_phone',
        'org_district',
        'org_thana',
        'org_fax_no',
        'org_email',
        'org_type',
        'nature_of_business',
        'authorized_capital',
        'paid_up_capital',
        'remittance_received',
        'industry_type',
        'recommendation_of_company_board',
        'company_share'

];

public function nVisa()
    {
        return $this->belongsTo(NVisa::class,'n_visa_id');
    }

}
