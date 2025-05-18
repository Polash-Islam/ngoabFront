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
        Schema::create('fd6_step_threes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('previous_project_detail')->nullable();
            $table->string('receipt_of_audit_report')->nullable();
            $table->string('new_phase_project')->nullable();
            $table->string('detailed_budget_statement')->nullable();
            $table->string('annual_allocation_to_beneficiaries')->nullable();
            $table->string('project_implementation_cost')->nullable();
            $table->string('ratio_of_expenditure')->nullable();
            $table->string('project_benifit')->nullable();
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
        Schema::dropIfExists('fd6_step_threes');
    }
};
