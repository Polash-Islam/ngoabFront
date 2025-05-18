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
        Schema::create('fd6_governance_and_transparencies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('private_individuals_advice')->nullable();
            $table->string('govt_ongoing_activities')->nullable();
            $table->string('similar_project_run_previously')->nullable();
            $table->string('project_in_form_no_eight')->nullable();
            $table->string('audit_report')->nullable();
            $table->string('annual_report')->nullable();
            $table->string('action_plan_with_budget')->nullable();
            $table->string('beneficiary_database')->nullable();
            $table->string('detailed_results_of_the_project')->nullable();
            $table->string('complaints_detail')->nullable();
            $table->longText('focal_point_name_mobile_email')->nullable();
            $table->string('online_training')->nullable();
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
        Schema::dropIfExists('fd6_governance_and_transparencies');
    }
};
