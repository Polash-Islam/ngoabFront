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
        Schema::create('fd_nine_other_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd9_form_id')->unsigned();
            $table->foreign('fd9_form_id')->references('id')->on('fd9_forms')->onDelete('cascade');
            $table->string('file_name')->nullable();
            $table->string('main_file')->nullable();
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
        Schema::dropIfExists('fd_nine_other_files');
    }
};
