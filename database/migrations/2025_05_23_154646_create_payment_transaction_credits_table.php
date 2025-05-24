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
        Schema::create('payment_transaction_credits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_transaction_id')->constrained()->onDelete('cascade');
            $table->integer('serial_no')->nullable();
            $table->string('cr_account_or_challan_no')->nullable();
            $table->decimal('cr_amount', 20, 2)->nullable();
            $table->string('tran_mode', 4)->nullable(); // TRN / CHL / ACHL
            $table->string('onbehalf')->nullable();
            $table->string('purpose')->nullable()->comment('main, vat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transaction_credits');
    }
};
