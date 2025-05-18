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
        Schema::create('ngo_renew_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('registration_number')->nullable();
            $table->string('organization_name')->nullable();
            $table->string('organization_address')->nullable();
            $table->string('address_of_head_office')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('name_of_head_in_bd')->nullable();
            $table->string('job_type')->nullable();
            $table->string('nationality')->nullable();
            $table->string('verified_form')->nullable();
            $table->string('chief_name')->nullable();
            $table->string('chief_desi')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_new')->nullable();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('email')->nullable();
            $table->string('email_new')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('telephone_number_new')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('profession')->nullable();
            $table->text('plan_of_operation')->nullable();
            $table->string('district')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('fee_paid_status')->nullable();
            $table->text('supporting_paper')->nullable();
            $table->string('foregin_pdf')->nullable();
            $table->string('yearly_budget')->nullable();
            $table->string('copy_of_chalan')->nullable();
            $table->string('due_vat_pdf')->nullable();
            $table->string('change_ac_number')->nullable();
            $table->string('main_account_number')->nullable();
            $table->string('main_account_type')->nullable();
            $table->string('main_account_name_of_branch')->nullable();
            $table->string('name_of_bank')->nullable();
            $table->string('bank_address_main')->nullable();
            $table->string('web_site_name')->nullable();
            $table->string('mobile_new')->nullable();
            $table->string('mobile')->nullable();

            $table->string('digital_signature')->nullable();
            $table->string('digital_seal')->nullable();
            $table->string('yearly_budget_file')->nullable();

            
            $table->string('time_for_api')->nullable();
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
        Schema::dropIfExists('ngo_renew_infos');
    }
};
