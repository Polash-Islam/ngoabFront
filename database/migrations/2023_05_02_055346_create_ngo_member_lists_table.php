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
        Schema::create('ngo_member_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('member_name')->nullable();
            $table->string('member_name_slug')->nullable();
            $table->string('member_designation')->nullable();
            $table->string('member_dob')->nullable();
            $table->string('member_nid_no')->nullable();
            $table->string('member_mobile')->nullable();
            $table->string('member_father_name')->nullable();
            $table->text('member_present_address')->nullable();
            $table->text('member_permanent_address')->nullable();
            $table->string('member_name_supouse')->nullable();
            $table->string('time_for_api')->nullable();
            $table->string('verified_file')->nullable();
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
        Schema::dropIfExists('ngo_member_lists');
    }
};
