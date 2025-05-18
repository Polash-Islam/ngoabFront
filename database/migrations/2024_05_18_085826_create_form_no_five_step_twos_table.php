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
        Schema::create('form_no_five_step_twos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_no_fives_id')->unsigned();
            $table->foreign('form_no_fives_id')->references('id')->on('form_no_fives')->onDelete('cascade');
            $table->string('sector_of_annexure_C')->nullable();
            $table->string('sector_wise_budget')->nullable();
            $table->string('activities_and_objectives')->nullable();
            $table->string('activity_wise_segmented_budget')->nullable();
            $table->string('activity_based_achievement_targets')->nullable();
            $table->string('activity_based_actual_costing')->nullable();
            $table->string('accounts_payable_total_actual_expenditure')->nullable();
            $table->string('cumulative_progress_during_reporting_in_real')->nullable();
            $table->string('cumulative_progress_during_reporting_in_financial')->nullable();
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('form_no_five_step_twos');
    }
};
