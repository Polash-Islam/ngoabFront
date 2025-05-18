<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fund_id')->index()->nullable();
            $table->foreignId('user_id')->index()->nullable();
            $table->string('token')->nullable();
            $table->string('trx_id')->nullable();
            $table->dateTime('trx_date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->dateTime('invoice_date')->nullable();
            $table->string('branch')->nullable();
            $table->decimal('request_amount', 11,2)->nullable();
            $table->decimal('paid_amount', 11,2)->nullable();
            $table->decimal('extra_charge', 11,2)->nullable();
            $table->string('settlement_done')->nullable();
            $table->date('settlement_date')->nullable();
            $table->string('pay_mode')->nullable();
            $table->string('scroll_no')->nullable();
            $table->text('Sonali_voucher_link')->nullable();
            $table->text('challan_link')->nullable();
            $table->string('party_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
