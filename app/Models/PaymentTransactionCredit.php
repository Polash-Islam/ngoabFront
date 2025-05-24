<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentTransactionCredit extends Model
{
    protected $table = 'payment_transaction_credits';
    protected $guarded = ['id'];

    public function transaction()
    {
        return $this->belongsTo(PaymentTransaction::class);
    }
}
