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
        Schema::create('district_wise_activities', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('main_id')->nullable();
            $table->string('division_name')->nullable();
            $table->string('district_name')->nullable();
            $table->string('city_corparation_name')->nullable();
            $table->string('upozila_name')->nullable();
            $table->string('thana_name')->nullable();
            $table->string('municipality_name')->nullable();
            $table->string('ward_name')->nullable();
            $table->string('target_year')->nullable();
            $table->string('last_year_target_real')->nullable();
            $table->string('last_year_target_financial')->nullable();
            $table->string('activities')->nullable();
            $table->string('prokolpo_time')->nullable();
            $table->string('total_budget')->nullable();
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('district_wise_activities');
    }
};
