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
        Schema::create('fd2_form_for_fd3_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->bigInteger('fd3_form_id')->unsigned();
            $table->foreign('fd3_form_id')->references('id')->on('fd3_forms')->onDelete('cascade');
            $table->string('ngo_name')->nullable();
            $table->string('ngo_address')->nullable();
            $table->string('ngo_prokolpo_name')->nullable();
            $table->string('ngo_prokolpo_duration')->nullable();
            $table->string('ngo_prokolpo_start_date')->nullable();
            $table->string('ngo_prokolpo_end_date')->nullable();
            $table->string('proposed_rebate_amount_bangladeshi_taka')->nullable();
            $table->string('proposed_rebate_amount_in_foreign_currency')->nullable();
            $table->string('amount_withdrawn_year')->nullable();
            $table->string('amount_withdrawn')->nullable();
            $table->string('last_year_achivment_pdf')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_adddress')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('fd_2_form_pdf')->nullable();
            $table->string('status')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('fd2_form_for_fd3_forms');
    }
};
