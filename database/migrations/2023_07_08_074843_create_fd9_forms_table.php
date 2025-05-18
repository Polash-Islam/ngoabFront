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
        Schema::create('fd9_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            // $table->bigInteger('n_visa_id')->unsigned();
            // $table->foreign('n_visa_id')->references('id')->on('n_visas')->onDelete('cascade');
            $table->string('fd9_foreigner_name')->nullable();
            $table->string('fd9_father_name')->nullable();
            $table->string('fd9_husband_or_wife_name')->nullable();
            $table->string('fd9_mother_name')->nullable();
            $table->string('fd9_birth_place')->nullable();
            $table->string('fd9_dob')->nullable();
            $table->string('fd9_passport_number')->nullable();
            $table->string('fd9_passport_issue_date')->nullable();
            $table->string('fd9_passport_expiration_date')->nullable();
            $table->string('fd9_identification_mark_given_in_passport')->nullable();
            $table->string('fd9_male_or_female')->nullable();
            $table->string('fd9_marital_status')->nullable();
            $table->string('fd9_nationality_or_citizenship')->nullable();
            $table->string('fd9_details_if_multiple_citizenships')->nullable();
            $table->string('fd9_previous_citizenship_is_grounds_for_non_retention')->nullable();
            $table->string('fd9_current_address')->nullable();
            $table->string('fd9_number_of_family_members')->nullable();
            $table->string('fd9_academic_qualification')->nullable();
            $table->string('fd9_technical_and_other_qualifications_if_any')->nullable();
            $table->string('fd9_past_experience')->nullable();
            $table->string('fd9_countries_that_have_traveled')->nullable();
            $table->string('fd9_offered_post')->nullable();
            $table->string('fd9_name_of_proposed_project')->nullable();
            $table->string('fd9_date_of_appointment')->nullable();
            $table->string('fd9_extension_date')->nullable();
            $table->string('fd9_post_available_for_foreigner_and_working')->nullable();
            $table->string('fd9_previous_work_experience_in_bangladesh')->nullable();
            $table->string('fd9_total_foreigner_working')->nullable();
            $table->string('fd9_other_information')->nullable();
            $table->string('fd9_foreigner_passport_size_photo')->nullable();
            $table->string('fd9_copy_of_passport')->nullable();
            $table->string('verified_fd_nine_form')->nullable();
            $table->string('chief_name')->nullable();
            $table->string('chief_desi')->nullable();
            $table->string('digital_signature')->nullable();
            $table->string('digital_seal')->nullable();
            $table->string('status',11)->nullable();
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
        Schema::dropIfExists('fd9_forms');
    }
};
