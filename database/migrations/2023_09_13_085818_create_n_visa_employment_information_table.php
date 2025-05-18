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
        Schema::create('n_visa_employment_information', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('n_visa_id')->unsigned();
            $table->foreign('n_visa_id')->references('id')->on('n_visas')->onDelete('cascade');
            $table->string('employed_designation')->nullable();
            $table->string('date_of_arrival_in_bangladesh')->nullable();
            $table->string('visa_type')->nullable();
            $table->string('first_appoinment_date')->nullable();
            $table->string('desired_effective_date')->nullable();
            $table->string('travel_visa_cate')->nullable();
            $table->string('visa_validity')->nullable();
            $table->string('brief_job_description')->nullable();
            $table->string('employee_justification')->nullable();
            $table->string('desired_end_date')->nullable();
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
        Schema::dropIfExists('n_visa_employment_information');
    }
};
