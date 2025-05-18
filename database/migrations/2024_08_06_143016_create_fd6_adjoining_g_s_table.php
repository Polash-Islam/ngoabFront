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
        Schema::create('fd6_adjoining_g_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('subject')->nullable();
            $table->string('seminer_date')->nullable();
            $table->string('seminer_time')->nullable();
            $table->string('seminer_place')->nullable();
            $table->string('seminer_number')->nullable();
            $table->string('seminer_budget')->nullable();
            $table->string('seminer_perticipantion')->nullable();
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
        Schema::dropIfExists('fd6_adjoining_g_s');
    }
};
