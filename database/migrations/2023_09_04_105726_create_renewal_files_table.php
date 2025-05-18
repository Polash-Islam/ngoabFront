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
        Schema::create('renewal_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('fd_eight_form_data')->nullable();
            $table->string('final_fd_eight_form')->nullable();
			$table->string('form_eight_executive_committee_member')->nullable();
			$table->string('last_ten_year_annual_report')->nullable();
            $table->string('constitution_of_the_organization_has_changed')->nullable();
            $table->string('list_of_board_of_directors_or_board_of_trustees')->nullable();
            $table->string('organization_by_laws_or_constitution')->nullable();
            $table->string('work_procedure_of_organization')->nullable();
            $table->string('nid_and_image_of_executive_committee_members')->nullable();
            $table->string('approval_of_executive_committee')->nullable();
            $table->string('committee_members_list')->nullable();
            $table->string('registration_renewal_fee')->nullable();
            $table->string('last_ten_years_audit_report_and_annual_report_of_the_company')->nullable();
            $table->string('registration_certificate')->nullable();
            $table->string('attested_copy_of_latest_registration_or_renewal_certificate')->nullable();
            $table->string('right_to_information_act')->nullable();
            $table->string('the_constitution_of_the_company_along_with_fee_if_changed')->nullable();
            $table->string('constitution_approved_by_primary_registering_authority')->nullable();
            $table->string('clean_copy_of_the_constitution')->nullable();
            $table->string('payment_of_change_fee')->nullable();
            $table->string('section_sub_section_of_the_constitution')->nullable();
            $table->string('previous_constitution_and_current_constitution_compare')->nullable();
            $table->string('constitution_of_the_organization_if_unchanged')->nullable();
            $table->string('time_for_api')->nullable();
            $table->string('renewInfoId')->nullable();
            $table->string('constitution_extra')->nullable();

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
        Schema::dropIfExists('renewal_files');
    }
};
