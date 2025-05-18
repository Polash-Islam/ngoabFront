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
        Schema::create('fd2_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('fd_six_form_id')->nullable();
            $table->string('ngo_name')->nullable();
            $table->string('ngo_address')->nullable();
            $table->string('ngo_prokolpo_name')->nullable();
            $table->string('ngo_prokolpo_duration')->nullable();
            $table->string('ngo_prokolpo_start_date')->nullable();
            $table->string('ngo_prokolpo_end_date')->nullable();
            $table->string('proposed_rebate_amount_bangladeshi_taka')->nullable();
            $table->string('proposed_rebate_amount_in_foreign_currency')->nullable();
            $table->string('fd_2_form_pdf')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('fd2_forms');
    }
};
