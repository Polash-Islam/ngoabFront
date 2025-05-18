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
        Schema::create('n_visas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');


            $table->bigInteger('fd9_one_form_id')->unsigned();
            $table->foreign('fd9_one_form_id')->references('id')->on('fd9_one_forms')->onDelete('cascade');



            $table->string('period_validity')->nullable();
            $table->string('permit_efct_date')->nullable();
            $table->string('visa_ref_no')->nullable();
            $table->string('visa_recomendation_letter_received_way')->nullable();
            $table->string('visa_recomendation_letter_ref_no')->nullable();
            $table->string('department_in')->nullable();
            $table->string('visa_category')->nullable();
            $table->string('applicant_photo')->nullable();
            $table->string('forwarding_letter')->nullable();
            $table->string('salary_remarks')->nullable();
            $table->string('other_benefit')->nullable();
            $table->string('status',11)->nullable();
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
        Schema::dropIfExists('n_visas');
    }
};
