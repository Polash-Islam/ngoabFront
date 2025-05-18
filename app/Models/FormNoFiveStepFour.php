<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormNoFiveStepFour extends Model
{
    use HasFactory;

    protected $table = "form_no_five_step_fours";

    protected $fillable = [
      'form_no_fives_id',
      'description_of_property',
      'sub_property',
      'quantity',
      'collect_date',
      'real_buying_price',
      'fund_source',
      'what_is_it_used_for',
      'place',
      'assets_sold_transferred_number_or_quantity',
      'quantity_during_start_of_organization',
      'total_during_start_of_organization',
      'current_status',
    ];


}
