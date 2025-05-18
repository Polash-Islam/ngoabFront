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
        Schema::create('fd_one_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('registration_number')->nullable();
            $table->string('registration_number_given_by_admin')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('organization_name_ban')->nullable();
            $table->string('organization_address')->nullable();
            $table->string('address_of_head_office')->nullable();
            $table->string('address_of_head_office_eng')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('name_of_head_in_bd')->nullable();
            $table->string('job_type')->nullable();
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('phone')->nullable();
            $table->string('tele_phone_number')->nullable();


            $table->string('place')->nullable();


            $table->string('copy_of_chalan')->nullable();
            $table->string('due_vat_pdf')->nullable();
            $table->string('change_ac_number')->nullable();
            $table->string('verified_fd_eight_form_old')->nullable();

            $table->string('org_phone')->nullable();
            $table->string('org_mobile')->nullable();
            $table->string('org_email')->nullable();
            $table->string('web_site_name')->nullable();
            $table->string('nationality')->nullable();

            $table->string('annual_budget_file')->nullable();

            $table->string('digital_signature')->nullable();
            $table->string('digital_seal')->nullable();

            $table->string('foregin_pdf')->nullable();

            $table->string('email')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('profession')->nullable();
            $table->text('plan_of_operation')->nullable();
            $table->string('local_address')->nullable();
            $table->string('annual_budget')->nullable();
            $table->text('treasury_number')->nullable();
            $table->text('attach_the__supporting_paper')->nullable();
            $table->text('vat_invoice_number')->nullable();
            $table->text('board_of_revenue_on_fees')->nullable();
            $table->string('time_for_api')->nullable();
            $table->text('complete_status')->nullable();
            $table->text('verified_fd_one_form')->nullable();
            $table->string('chief_name')->nullable();
            $table->string('chief_desi')->nullable();
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
        Schema::dropIfExists('fd_one_forms');
    }
};
