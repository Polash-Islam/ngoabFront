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
        Schema::create('prokolpo_areas', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('user_id')->nullable();
            $table->string('upload_type')->nullable();
            $table->string('formId')->nullable();
            $table->string('division_name')->nullable();
            $table->string('district_name')->nullable();
            $table->string('city_corparation_name')->nullable();
            $table->string('upozila_name')->nullable();
            $table->string('thana_name')->nullable();
            $table->string('municipality_name')->nullable();
            $table->string('ward_name')->nullable();
            $table->string('prokolpo_type')->nullable();
            $table->string('allocated_budget')->nullable();
            $table->string('number_of_beneficiaries')->nullable();
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
        Schema::dropIfExists('prokolpo_areas');
    }
};
