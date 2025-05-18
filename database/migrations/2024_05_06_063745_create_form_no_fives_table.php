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
        Schema::create('form_no_fives', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('prokolpo_name')->nullable();
            $table->string('prokolpo_subject')->nullable();
            $table->string('prokolpo_duration')->nullable();
            $table->string('ngo_registration_number')->nullable();
            $table->string('ngo_registration_date')->nullable();
            $table->string('approved_estimated_expenditure_year_wise')->nullable();
            $table->string('received_money_during_report')->nullable();
            $table->string('report_year')->nullable();
            $table->string('percentage_of_achievement_during_project')->nullable();
            $table->string('prokolpo_araea')->nullable();
            $table->string('prokolpo_subject_one')->nullable();
            $table->string('prokolpo_name_one')->nullable();
            $table->string('reporting_period')->nullable();
            $table->longText('approval_file_of_Bureau')->nullable();
            $table->longText('land_and_transport_detail')->nullable();
            $table->longText('foreign_tour_detail')->nullable();
            $table->text('foreign_tour_file')->nullable();
            $table->string('report_preparar_seal')->nullable();
            $table->string('report_preparar_sign')->nullable();
            $table->string('report_preparar_date')->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();
            $table->string('status')->nullable();
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('form_no_fives');
    }
};
