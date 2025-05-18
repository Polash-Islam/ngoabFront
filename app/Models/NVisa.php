<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NVisa extends Model
{
    use HasFactory;
    protected $table = "n_visas";

    protected $fillable = [
        'fd_one_form_id',
        'fd9_one_form_id',
        'period_validity',
        'permit_efct_date',
        'visa_ref_no',
        'visa_recomendation_letter_received_way',
        'visa_recomendation_letter_ref_no',
        'department_in',
        'visa_category',
        'applicant_photo',
        'forwarding_letter',
        'salary_remarks',
        'other_benefit',
        'status',

];

  public function fdOneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd_one_form_id');
    }


    public function fd9OneForm()
    {
        return $this->belongsTo(FdOneForm::class,'fd9_one_form_id');
    }

    public function nVisaParticularOfSponsorOrEmployer()
    {
        return $this->hasOne(NVisaParticularOfSponsorOrEmployer::class,'n_visa_id');
    }

    public function nVisaParticularsOfForeignIncumbnet()
    {
        return $this->hasOne(NVisaParticularsOfForeignIncumbnet::class,'n_visa_id');
    }

    public function nVisaEmploymentInformation()
    {
        return $this->hasOne(NVisaEmploymentInformation::class,'n_visa_id');
    }

    public function nVisaWorkPlaceAddress()
    {
        return $this->hasOne(NVisaWorkPlaceAddress::class,'n_visa_id');
    }

    public function nVisaCompensationAndBenifits()
    {
        return $this->hasMany(NVisaCompensationAndBenifits::class,'n_visa_id');
    }

    public function nVisaManpowerOfTheOffice()
    {
        return $this->hasOne(NVisaManpowerOfTheOffice::class,'n_visa_id');
    }

    public function nVisaNecessaryDocumentForWorkPermit()
    {
        return $this->hasOne(NVisaNecessaryDocumentForWorkPermit::class,'n_visa_id');
    }

    public function nVisaAuthorizedPersonalOfTheOrg()
    {
        return $this->hasOne(NVisaAuthorizedPersonalOfTheOrg::class,'n_visa_id');
    }


    public function fd9Form()
    {
        return $this->hasOne(Fd9Form::class,'n_visa_id');
    }
}
