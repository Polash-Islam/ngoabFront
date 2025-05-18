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
        Schema::create('fd6_adjoining_b_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('nationality')->nullable();
            $table->string('duration')->nullable();
            $table->longText('educational_qualification')->nullable();
            $table->longText('experience')->nullable();
            $table->longText('responsibility')->nullable();
            $table->string('salary_from_this_project')->nullable();
            $table->string('salary_from_other_project')->nullable();
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
        Schema::dropIfExists('fd6_adjoining_b_s');
    }
};
