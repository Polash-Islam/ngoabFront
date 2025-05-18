<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NVisaNecessaryDocumentForWorkPermit extends Model
{
    use HasFactory;

    protected $table = "n_visa_necessary_document_for_work_permits";

    protected $fillable = [
        'n_visa_id',
        'nomination_letter_of_buyer',
        'registration_letter_of_board_of_investment',
        'employee_contract_copy',
        'board_of_the_directors_sign_letter',
        'share_holder_copy',
        'passport_photocopy',

];

public function nVisa()
    {
        return $this->belongsTo(NVisa::class,'n_visa_id');
    }


}
