<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    protected $table = 'payment_transactions';
    protected $guarded = ['id'];

    protected $casts = [
        'response_data' => 'array'
    ];

    public function credits()
    {
        return $this->hasMany(PaymentTransactionCredit::class);
    }
}
