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
        Schema::create('fd_three_emplyee_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd3_form_id')->unsigned();
            $table->foreign('fd3_form_id')->references('id')->on('fd3_forms')->onDelete('cascade');
            $table->string('employee_name')->nullable();
            $table->string('employee_designation')->nullable();
            $table->string('employee_telephone')->nullable();
            $table->string('employee_mobile')->nullable();
            $table->string('employee_email')->nullable();
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
        Schema::dropIfExists('fd_three_emplyee_details');
    }
};
