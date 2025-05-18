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
        Schema::create('fd2_fc1_other_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd2_form_for_fc1_form_id')->unsigned();
            $table->foreign('fd2_form_for_fc1_form_id')->references('id')->on('fd2_form_for_fc1_forms')->onDelete('cascade');
            $table->string('file_name')->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('fd2_fc1_other_infos');
    }
};
