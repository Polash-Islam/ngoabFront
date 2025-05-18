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
        Schema::create('fd7_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('ngo_name')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('distribution_pdf')->nullable();
            $table->longText('relief_program_detail')->nullable();
            $table->string('relief_program_pdf')->nullable();
            $table->longText('relevant_information')->nullable();
            $table->string('relevant_information_pdf')->nullable();
            $table->longText('bank_detail')->nullable();
            $table->longText('digital_signature')->nullable();
            $table->longText('digital_seal')->nullable();
            $table->string('chief_name')->nullable();
            $table->string('bank_detail_pdf')->nullable();
            $table->string('chief_desi')->nullable();
            $table->string('ngo_address')->nullable();
            $table->string('ngo_registration_number')->nullable();
            $table->string('ngo_registration_date')->nullable();
            $table->string('ngo_prokolpo_name')->nullable();
            $table->text('donor_organization_description')->nullable();
            $table->string('donor_organization_chief_type')->nullable();
            $table->string('donor_organization_chief_name')->nullable();
            $table->string('donor_organization_name')->nullable();
            $table->string('donor_organization_address')->nullable();
            $table->string('donor_organization_phone')->nullable();
            $table->string('donor_organization_email')->nullable();
            $table->string('donor_organization_website')->nullable();
            $table->string('ongoing_prokolpo_name')->nullable();
            $table->string('total_prokolpo_cost')->nullable();
            $table->string('date_of_bureau_approval')->nullable();
            $table->string('bureau_approval_pdf')->nullable();
            $table->string('percentage_of_the_original_project')->nullable();
            $table->string('adverse_impact_on_the_ongoing_project')->nullable();
            $table->string('letter_from_donor_agency_pdf')->nullable();
            $table->string('ngo_prokolpo_start_date')->nullable();
            $table->string('ngo_prokolpo_end_date')->nullable();
            $table->string('relief_assistance_project_proposal_pdf')->nullable();
            $table->string('status')->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('fd7_forms');
    }
};
