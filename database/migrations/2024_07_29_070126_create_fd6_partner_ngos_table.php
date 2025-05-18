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
        Schema::create('fd6_partner_ngos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('partner_ngo_name')->nullable();
            $table->string('partner_ngo_address')->nullable();
            $table->string('partner_ngo_telephone')->nullable();
            $table->string('partner_ngo_mobile')->nullable();
            $table->string('partner_ngo_email')->nullable();
            $table->string('partner_ngo_reg_name')->nullable();
            $table->string('partner_ngo_duration')->nullable();
            $table->longText('partner_ngo_work_detail')->nullable();
            $table->string('division_name')->nullable();
            $table->string('district_name')->nullable();
            $table->string('city_corparation_name')->nullable();
            $table->string('upozila_name')->nullable();
            $table->string('thana_name')->nullable();
            $table->string('municipality_name')->nullable();
            $table->string('ward_name')->nullable();
            $table->string('budget_detail')->nullable();
            $table->string('execution_deadline')->nullable();
            $table->string('beneficiary')->nullable();
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
        Schema::dropIfExists('fd6_partner_ngos');
    }
};
