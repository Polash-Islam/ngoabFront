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
        Schema::create('fd6_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('ngo_name')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('ngo_registration_date')->nullable();
            $table->string('ngo_last_renew_date')->nullable();
            $table->string('ngo_expiration_date')->nullable();
            $table->string('ngo_address')->nullable();
            $table->string('ngo_telephone_number')->nullable();
            $table->string('ngo_mobile_number')->nullable();
            $table->string('ngo_email_address')->nullable();
            $table->string('ngo_website')->nullable();
            $table->string('ngo_prokolpo_name')->nullable();
            $table->string('ngo_prokolpo_duration')->nullable();
            $table->string('ngo_prokolpo_start_date')->nullable();
            $table->string('ngo_prokolpo_end_date')->nullable();

            $table->string('grants_received_from_abroad_first_year')->nullable();
            $table->string('grants_received_from_abroad_second_year')->nullable();
            $table->string('grants_received_from_abroad_third_year')->nullable();
            $table->string('grants_received_from_abroad_fourth_year')->nullable();
            $table->string('grants_received_from_abroad_fifth_year')->nullable();
            $table->string('grants_received_from_abroad_total')->nullable();
            $table->string('grants_received_from_abroad_comment')->nullable();


            $table->string('donations_made_by_foreign_donors_first_year')->nullable();
            $table->string('donations_made_by_foreign_donors_second_year')->nullable();
            $table->string('donations_made_by_foreign_donors_third_year')->nullable();
            $table->string('donations_made_by_foreign_donors_fourth_year')->nullable();
            $table->string('donations_made_by_foreign_donors_fifth_year')->nullable();
            $table->string('donations_made_by_foreign_donors_total')->nullable();
            $table->string('donations_made_by_foreign_donors_comment')->nullable();


            $table->string('local_grants_first_year')->nullable();
            $table->string('local_grants_second_year')->nullable();
            $table->string('local_grants_third_year')->nullable();
            $table->string('local_grants_fourth_year')->nullable();
            $table->string('local_grants_fifth_year')->nullable();
            $table->string('local_grants_donors_total')->nullable();
            $table->string('local_grants_donors_comment')->nullable();


            $table->string('total_first_year')->nullable();
            $table->string('total_second_year')->nullable();
            $table->string('total_third_year')->nullable();
            $table->string('total_fourth_year')->nullable();
            $table->string('total_fifth_year')->nullable();
            $table->string('total_donors_total')->nullable();
            $table->string('total_donors_comment')->nullable();


            $table->string('donor_organization_name')->nullable();
            $table->string('donor_organization_address')->nullable();
            $table->string('donor_organization_phone_mobile_email')->nullable();
            $table->string('donor_organization_website')->nullable();
            $table->string('money_laundering_and_terrorist_financing')->nullable();
            $table->string('project_cost')->nullable();
            $table->string('project_cost_ratio')->nullable();
            $table->string('administrative_cost')->nullable();
            $table->string('administrative_ratio')->nullable();
            $table->string('project_and_administrative_cost')->nullable();
            $table->string('project_and_administrative_cost_ratio')->nullable();

            $table->string('project_name')->nullable();
            $table->string('duration_of_project')->nullable();
            $table->string('total_allocation_of_project')->nullable();
            $table->string('total_allocation_in_project_area')->nullable();
            $table->string('total_beneficiaries')->nullable();
            $table->string('total_population_in_project_area')->nullable();
            $table->string('donor_organization_name_two')->nullable();
            $table->string('project_proposal_form')->nullable();
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();

            $table->string('district_wise_activity_file')->nullable();
            $table->string('expected_result_file')->nullable();
            $table->string('target_from_perspective_file')->nullable();
            $table->string('sdg_file')->nullable();
            $table->string('sdg_objective_file')->nullable();
            $table->string('introduction_and_background')->nullable();
            $table->string('rationality_and_plan')->nullable();
            $table->string('rationale_project_araea')->nullable();
            $table->string('security_council_check')->nullable();
            $table->string('estimated_expenses')->nullable();
            $table->string('estimated_expenses_file')->nullable();
            $table->string('donor_organization_mobile')->nullable();
            $table->string('donor_organization_email')->nullable();
            $table->string('partner_ngo_status')->nullable();


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
        Schema::dropIfExists('fd6_forms');
    }
};
