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
        Schema::create('form_no_five_step_fives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_no_fives_id')->unsigned();
            $table->foreign('form_no_fives_id')->references('id')->on('form_no_fives')->onDelete('cascade');
            $table->longText('name_of_the_officer')->nullable();
            $table->string('designation_of_the_officer')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('travel_country')->nullable();
            $table->string('organizing_organization_name')->nullable();
            $table->string('organizing_organization_address')->nullable();
            $table->string('name_of_training_course')->nullable();
            $table->string('course_duration')->nullable();
            $table->string('total_expense')->nullable();
            $table->string('name_of_donor_organization')->nullable();
            $table->string('country_name_of_donor_organization')->nullable();
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
        Schema::dropIfExists('form_no_five_step_fives');
    }
};
