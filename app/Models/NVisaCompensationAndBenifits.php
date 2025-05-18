<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NVisaCompensationAndBenifits extends Model
{
    use HasFactory;

    protected $table = "n_visa_compensation_and_benifits";

    protected $fillable = [
        'n_visa_id',
        'salary_category',
        'payment_type',
        'amount',
        'currency',

];

public function nVisa()
    {
        return $this->belongsTo(NVisa::class,'n_visa_id');
    }
}
