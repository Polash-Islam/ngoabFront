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
        Schema::create('form_no_five_others', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_no_fives_id')->unsigned();
            $table->foreign('form_no_fives_id')->references('id')->on('form_no_fives')->onDelete('cascade');
            $table->string('name_of_the_officer_depend_on_salary')->nullable();
            $table->string('nationality_of_the_officer_depend_on_salary')->nullable();
            $table->string('designation_of_the_officer_depend_on_salary')->nullable();
            $table->string('responsbility_of_the_officer_depend_on_salary')->nullable();
            $table->string('education_of_the_officer_depend_on_salary')->nullable();
            $table->string('experience_of_the_officer_depend_on_salary')->nullable();
            $table->string('age_of_the_officer_depend_on_salary')->nullable();
            $table->string('salary_of_the_officer_depend_on_salary')->nullable();
            $table->string('other_allowances_or_benefits_of_the_officer_depend_on_salary')->nullable();
            $table->string('job_duration_of_the_officer_depend_on_salary')->nullable();
            $table->string('financial_benefit_received_from_any_other_scheme')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('form_no_five_others');
    }
};
