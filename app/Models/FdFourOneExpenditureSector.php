<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FdFourOneExpenditureSector extends Model
{
    use HasFactory;

    protected $table = "fd_four_one_expenditure_sectors";

    protected $fillable = [
        'fd_four_one_id',
        'expenditure_sectors',
        'approved_budget_money',
        'actual_cost',
        'difference',
        'percentage',
        'reason_for_the_difference',

];


}
