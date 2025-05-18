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
        Schema::create('fd3_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('ngo_name')->nullable();
            $table->string('ngo_address')->nullable();
            $table->string('ngo_telephone')->nullable();
            $table->string('ngo_email')->nullable();
            $table->string('ngo_website')->nullable();
            $table->string('ngo_registration_number')->nullable();
            $table->string('ngo_registration_date')->nullable();
            $table->string('ngo_prokolpo_name')->nullable();
            $table->string('verified_fd_three_form')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('ngo_prokolpo_duration')->nullable();
            $table->string('project_approval_exemption_letter_memo_number')->nullable();
            $table->string('project_approval_exemption_letter_date')->nullable();
            $table->string('project_approval_letter_memo_number')->nullable();
            $table->string('project_approval_letter_date')->nullable();
            $table->string('exemption_amount_in_previous_year')->nullable();
            $table->string('money_received_in_the_previous_year')->nullable();
            $table->string('date_of_payment')->nullable();
            $table->string('type_of_foreign_grant')->nullable();
            $table->string('foreign_grant_amount')->nullable();
            $table->string('local_grant_amount')->nullable();
            $table->string('relation_with_donor')->nullable();
            $table->string('description_and_price_of_goods')->nullable();
            $table->string('foreigner_donor_full_name')->nullable();
            $table->string('foreigner_donor_occupation')->nullable();
            $table->string('foreigner_donor_address')->nullable();
            $table->string('foreigner_donor_telephone_number')->nullable();
            $table->string('foreigner_donor_fax')->nullable();
            $table->string('foreigner_donor_email')->nullable();
            $table->string('foreigner_donor_nationality')->nullable();
            $table->string('foreigner_donor_is_verified')->nullable();
            $table->string('foreigner_donor_is_affiliatedrict')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('organization_address')->nullable();
            $table->string('organization_telephone_number')->nullable();
            $table->string('organization_fax')->nullable();
            $table->string('organization_email')->nullable();
            $table->string('organization_website')->nullable();
            $table->string('organization_is_verified')->nullable();
            $table->string('donor_is_associated')->nullable();
            $table->string('organization_ceo_name')->nullable();
            $table->string('organization_ceo_designation')->nullable();
            $table->string('organization_senior_officer_name_one')->nullable();
            $table->string('organization_senior_officer_designation_one')->nullable();
            $table->string('organization_senior_officer_name_two')->nullable();
            $table->string('organization_senior_officer_designation_two')->nullable();
            $table->string('organization_name_of_executive_responsible_for_bd')->nullable();
            $table->string('organization_name_of_executive_responsible_for_bd_designation')->nullable();
            $table->string('objectives_of_the_organization')->nullable();
            $table->string('communication_between_NGO_and_donor')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('status')->nullable();
            $table->longText('project_account_details')->nullable();
            $table->string('project_account_file')->nullable();
            $table->longText('purpose_details')->nullable();
            $table->string('purpose_details_file')->nullable();
            $table->longText('money_received_details')->nullable();
            $table->string('money_received_details_file')->nullable();
            $table->longText('method_details')->nullable();
            $table->string('method_details_file')->nullable();
            $table->string('administration_involved')->nullable();
            $table->longText('equipment_details')->nullable();
            $table->string('equipment_details_file')->nullable();
            $table->string('chief_name')->nullable();
            $table->string('chief_desi')->nullable();
            $table->string('digital_signature')->nullable();
            $table->string('digital_seal')->nullable();
            $table->longText('comment')->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('time_for_api')->nullable();
            
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
        Schema::dropIfExists('fd3_forms');
    }
};
