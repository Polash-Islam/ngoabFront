<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->nullable();
            $table->integer('transaction_id')->nullable();
            $table->date('transaction_date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->date('invoice_date')->nullable();
            $table->decimal('request_amount', 20, 2)->nullable();
            $table->decimal('paid_amount', 20, 2)->nullable();
            $table->decimal('extra_charges', 20, 2)->nullable();
            $table->string('branch_code')->nullable();
            $table->string('party_name')->nullable();
            $table->string('settlement_done')->nullable();
            $table->date('settlement_date')->nullable();
            $table->string('pay_mode')->nullable();
            $table->string('scroll_no')->nullable();
            $table->string('voucher_link')->nullable();
            $table->string('challan_link')->nullable();
            $table->string('response_url')->nullable();
            $table->text('response_data')->nullable();
            $table->string('token')->unique();
            $table->string('redirect_to_gateway')->nullable();
            $table->string('mode')->nullable();
            $table->string('status', 50)->default('processing')->comment('processing, pending, success, failed');
            $table->string('status_message')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
