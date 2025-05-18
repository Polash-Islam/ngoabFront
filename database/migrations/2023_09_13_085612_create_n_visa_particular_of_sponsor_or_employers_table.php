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
        Schema::create('n_visa_particular_of_sponsor_or_employers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('n_visa_id')->unsigned();
            $table->foreign('n_visa_id')->references('id')->on('n_visas')->onDelete('cascade');
            $table->string('org_name')->nullable();
            $table->string('org_house_no')->nullable();
            $table->string('org_flat_no')->nullable();
            $table->string('org_road_no')->nullable();
            $table->string('org_post_code')->nullable();
            $table->string('org_post_office')->nullable();
            $table->string('org_phone')->nullable();
            $table->string('org_district')->nullable();
            $table->string('org_thana')->nullable();
            $table->string('org_fax_no')->nullable();
            $table->string('org_email')->nullable();
            $table->string('org_type')->nullable();
            $table->string('nature_of_business')->nullable();
            $table->string('authorized_capital')->nullable();
            $table->string('paid_up_capital')->nullable();
            $table->string('remittance_received')->nullable();
            $table->string('industry_type')->nullable();
            $table->string('recommendation_of_company_board')->nullable();
            $table->string('company_share')->nullable();
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
        Schema::dropIfExists('n_visa_particular_of_sponsor_or_employers');
    }
};
