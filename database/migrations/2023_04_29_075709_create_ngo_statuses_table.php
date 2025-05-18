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
        Schema::create('ngo_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('email')->nullable();
            $table->string('reg_type')->nullable();
            $table->string('reg_id')->nullable();
            $table->string('print_date')->nullable();
            $table->string('status')->nullable();
            $table->string('comment')->nullable();
            $table->string('time_for_api')->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();
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
        Schema::dropIfExists('ngo_statuses');
    }
};
