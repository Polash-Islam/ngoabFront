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
        Schema::create('fd2_all_form_last_year_details', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('main_id')->nullable();
            $table->string('prokolpoName')->nullable();
            $table->string('target_year')->nullable();
            $table->string('last_year_target_real')->nullable();
            $table->string('last_year_target_financial')->nullable();
            $table->string('last_year_achievment_real')->nullable();
            $table->string('last_year_achievment_financial')->nullable();
            $table->string('total_benificiari')->nullable();
            $table->string('upload_type')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('fd2_all_form_last_year_details');
    }
};
