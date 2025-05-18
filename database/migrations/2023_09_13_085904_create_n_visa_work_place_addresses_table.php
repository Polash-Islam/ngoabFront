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
        Schema::create('n_visa_work_place_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('n_visa_id')->unsigned();
            $table->foreign('n_visa_id')->references('id')->on('n_visas')->onDelete('cascade');
            $table->string('work_house_no')->nullable();
            $table->string('work_flat_no')->nullable();
            $table->string('work_road_no')->nullable();
            $table->string('work_org_type')->nullable();
            $table->string('contact_person_mobile_number')->nullable();
            $table->string('work_district')->nullable();
            $table->string('work_thana')->nullable();
            $table->string('work_email')->nullable();
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
        Schema::dropIfExists('n_visa_work_place_addresses');
    }
};
