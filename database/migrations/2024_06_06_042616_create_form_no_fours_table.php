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
        Schema::create('form_no_fours', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('ngo_name')->nullable();
            $table->string('prokolpo_name')->nullable();
            $table->string('prokolpo_duration')->nullable();
            $table->string('prokolpo_permission_no')->nullable();
            $table->string('prokolpo_date')->nullable();
            $table->string('prokolpo_report_time')->nullable();
            $table->string('prokolpo_total_cost')->nullable();
            $table->string('allocation_amount')->nullable();
            $table->string('district_upazila_wise_total_expenditure')->nullable();
            $table->string('district_upazila_wise_annual_allocation')->nullable();
            $table->string('sign_board_avaiable_or_not')->nullable();
            $table->text('prokolpo_sector_detail')->nullable();
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
        Schema::dropIfExists('form_no_fours');
    }
};
