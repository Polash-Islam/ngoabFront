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
        Schema::create('fd_five_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fdId')->unsigned();
            $table->foreign('fdId')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('file_one')->nullable();
            $table->string('status',100)->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();
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
        Schema::dropIfExists('fd_five_forms');
    }
};
