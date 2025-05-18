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
        Schema::create('fd_four_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->integer('fd_four_one_form_id')->nullable();
            $table->string('farm_name')->nullable();
            $table->string('farm_detail')->nullable();
            $table->string('prokolpo_duration')->nullable();
            $table->string('ngo_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('ngo_telephone')->nullable();
            $table->string('ngo_website')->nullable();
            $table->string('ngo_email')->nullable();
            $table->string('prokolpo_name')->nullable();
            $table->string('prokolpo_duration_one')->nullable();
            $table->string('exam_time')->nullable();
            $table->string('start_balance')->nullable();
            $table->string('foreign_grant_taken_exam_year')->nullable();
            $table->string('foreign_grant_cost_exam_year')->nullable();
            $table->string('foreign_grant_remaining_exam_year')->nullable();
            $table->string('ca_farm_seal')->nullable();
            $table->string('ca_farm_sign')->nullable();
            $table->string('ca_form_date')->nullable();
            $table->string('ca_form_name')->nullable();
            $table->string('ca_form_address')->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('fd_four_forms');
    }
};
