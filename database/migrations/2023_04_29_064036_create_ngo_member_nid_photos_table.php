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
        Schema::create('ngo_member_nid_photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('member_name')->nullable();
            $table->string('member_image')->nullable();
            $table->string('member_nid_copy')->nullable();
            $table->string('member_nid_copy_size')->nullable();
            $table->string('time_for_api')->nullable();
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
        Schema::dropIfExists('ngo_member_nid_photos');
    }
};
