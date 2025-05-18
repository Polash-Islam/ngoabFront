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
        Schema::create('name_change_docs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ngo_name_change_id')->unsigned();
            $table->foreign('ngo_name_change_id')->references('id')->on('ngo_name_changes')->onDelete('cascade');
            $table->string('pdf_file_list')->nullable();
            $table->string('time_for_api')->nullable();
            $table->string('file_size')->nullable();
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
        Schema::dropIfExists('name_change_docs');
    }
};
