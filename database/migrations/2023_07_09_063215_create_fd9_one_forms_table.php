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
        Schema::create('fd9_one_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('foreigner_name_for_subject')->nullable();
            $table->string('sarok_number')->nullable();
            $table->string('application_date')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('prokolpo_name')->nullable();
            $table->string('designation_name')->nullable();
            $table->string('foreigner_name_for_body')->nullable();
            $table->string('expire_from_date')->nullable();
            $table->string('expire_to_date')->nullable();
            $table->string('attestation_of_appointment_letter')->nullable();
            $table->string('copy_of_form_nine')->nullable();
            $table->string('foreigner_image')->nullable();
            $table->string('arrival_date_in_nvisa')->nullable();
            $table->string('copy_of_nvisa')->nullable();
            $table->string('proposed_from_date')->nullable();
            $table->string('proposed_to_date')->nullable();
            $table->string('verified_fd_nine_one_form')->nullable();
            $table->string('status',11)->nullable();
            $table->string('chief_name')->nullable();
            $table->string('chief_desi')->nullable();
            $table->string('digital_signature')->nullable();
            $table->string('digital_seal')->nullable();
            $table->text('comment')->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();
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
        Schema::dropIfExists('fd9_one_forms');
    }
};
