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
        Schema::create('form_no_sevens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('district_address')->nullable();
            $table->string('upazila_address')->nullable();
            $table->string('submit_date')->nullable();
            $table->string('ngo_name')->nullable();
            $table->string('ngo_address')->nullable();
            $table->longText('ngo_name_address_comment')->nullable();
            $table->string('ngo_head_name')->nullable();
            $table->string('ngo_head_organization')->nullable();
            $table->string('ngo_head_office_mobile')->nullable();
            $table->string('ngo_head_office_email')->nullable();
            $table->longText('ngo_head_comment')->nullable();
            $table->string('ngo_registration')->nullable();
            $table->string('ngo_registration_date')->nullable();
            $table->string('ngo_last_renewal_date')->nullable();
            $table->string('ngo_duration')->nullable();
            $table->longText('ngo_reg_comment')->nullable();
            $table->string('ngo_local_officer_name')->nullable();
            $table->string('ngo_local_officer_designation')->nullable();
            $table->string('ngo_local_officer_mobile')->nullable();
            $table->string('ngo_local_officer_email')->nullable();
            $table->longText('ngo_local_officer_comment')->nullable();
            $table->string('prokolpo_name')->nullable();
            $table->string('prokolpo_subject')->nullable();
            $table->string('prokolpo_duration')->nullable();
            $table->string('prokolpo_fund')->nullable();
            $table->longText('prokolpo_comment')->nullable();
            $table->string('prokolpo_approval_date')->nullable();
            $table->string('prokolpo_sarok_number')->nullable();
            $table->string('prokolpo_certificate_year_and_time')->nullable();
            $table->longText('prokolpo_approval_comment')->nullable();
            $table->string('prokolpo_objecttive')->nullable();
            $table->longText('prokolpo_objecttive_comment')->nullable();
            $table->string('allocation_for_projects_in_district_or_upazila')->nullable();
            $table->string('this_year_under_discussion_multi_year_projects')->nullable();
            $table->string('actual_expenditure_multi_year_projects')->nullable();
            $table->string('direct_beneficiaries_quantity')->nullable();
            $table->string('indirect_beneficiaries_quantity')->nullable();
            $table->longText('jurisdiction_comment')->nullable();
            $table->string('project_inspected_time')->nullable();
            $table->string('inspector_name')->nullable();
            $table->string('inspector_designation')->nullable();
            $table->string('inspector_mobile')->nullable();
            $table->string('inspector_email')->nullable();
            $table->longText('inspector_comment')->nullable();
            $table->string('beneficiaries_involved_with_local_administration')->nullable();
            $table->longText('beneficiaries_involved_comment')->nullable();
            $table->string('regular_participation_in_meeting')->nullable();
            $table->longText('regular_participation_comment')->nullable();
            $table->string('conditions_properly_met')->nullable();
            $table->longText('conditions_properly_comment')->nullable();
            $table->string('main_ngo_name')->nullable();
            $table->string('main_ngo_address')->nullable();
            $table->longText('main_ngo_comment')->nullable();
            $table->string('sign_in_closing_report')->nullable();
            $table->longText('sign_in_closing_report_comment')->nullable();
            $table->longText('feedback_on_projects_implementedt')->nullable();
            $table->longText('recommendation_on_projects_implementedt')->nullable();
            $table->longText('onulipi')->nullable();
            $table->string('signature_certifying_officer')->nullable();
            $table->string('seal_certifying_officer')->nullable();
            $table->string('name_certifying_officer')->nullable();
            $table->string('designation_certifying_officer')->nullable();
            $table->string('date_certifying_officer')->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();
            $table->longText('comment')->nullable();
            $table->string('sarok_number')->nullable();
            $table->string('mian_ngo_detail')->nullable();
            $table->longText('main_ngo_detail_comment')->nullable();
            $table->longText('last_comment')->nullable();
            $table->string('project_copy_approved_by_burea')->nullable();
            $table->longText('project_copy_approved_by_burea_comment')->nullable();
            $table->string('status')->nullable();
            $table->string('sent_status')->nullable();
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
        Schema::dropIfExists('form_no_sevens');
    }
};
