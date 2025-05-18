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
        Schema::create('fc1_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('ngo_name')->nullable();
            $table->string('subject_id')->nullable();
            $table->string('ngo_address')->nullable();
            $table->string('ngo_telephone_number')->nullable();
            $table->string('ngo_mobile_number')->nullable();
            $table->string('ngo_email')->nullable();
            $table->string('ngo_website')->nullable();
            $table->string('ngo_prokolpo_start_date')->nullable();
            $table->string('ngo_prokolpo_end_date')->nullable();

            $table->string('ngo_district')->nullable();
            $table->string('ngo_sub_district')->nullable();
            $table->string('total_number_of_beneficiaries')->nullable();

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
            $table->string('organization_email')->nullable();
            $table->string('organization_website')->nullable();
            $table->string('organization_is_verified')->nullable();
            $table->string('organization_ceo_name')->nullable();
            $table->string('organization_ceo_designation')->nullable();
            $table->string('organization_name_of_executive_responsible_for_bd')->nullable();
            $table->string('organization_name_of_executive_responsible_for_bd_designation')->nullable();
            $table->string('objectives_of_the_organization')->nullable();
            $table->string('relation_with_donor')->nullable();
            $table->string('organization_fax')->nullable();
            $table->string('organization_letter_of_commitment')->nullable();
            $table->string('organization_name_of_the_job_amount_of_money_and_duration_pdf')->nullable();
            $table->string('organization_amount_of_foreign_currency')->nullable();
            $table->string('equivalent_amount_of_bd_taka')->nullable();
            $table->string('commodities_value_in_bangladeshi_currency')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('verified_fc_one_form')->nullable();
            $table->string('status')->nullable();
            $table->text('comment')->nullable();
            $table->string('purpose_of_donation')->nullable();
            $table->string('purpose_of_donation_pdf')->nullable();
            $table->string('bond_paper_available_or_not')->nullable();
            $table->string('bond_paper_work_name')->nullable();
            $table->string('bond_paper_amount')->nullable();
            $table->string('bond_paper_duration')->nullable();
            $table->string('bond_paper_pdf')->nullable();
            $table->string('sent_status')->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();
            $table->string('step_status')->nullable();
            $table->string('administrative_certificate')->nullable();
            $table->string('last_final_report')->nullable();
            $table->string('previous_audit_report')->nullable();
            $table->string('donor_commitment_letter')->nullable();
            $table->string('donor_agency_commitment_letter')->nullable();
            $table->string('chief_name')->nullable();
            $table->string('chief_desi')->nullable();
            $table->string('digital_signature')->nullable();
            $table->string('digital_seal')->nullable();
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
        Schema::dropIfExists('fc1_forms');
    }
};
