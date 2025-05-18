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
        Schema::create('form_complete_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('fd_one_form_step_one_status');
            $table->tinyInteger('fd_one_form_step_two_status');
            $table->tinyInteger('fd_one_form_step_three_status');
            $table->tinyInteger('fd_one_form_step_four_status');
            $table->tinyInteger('form_eight_status');
            $table->tinyInteger('ngo_member_status');
            $table->tinyInteger('ngo_member_nid_photo_status');
            $table->tinyInteger('ngo_other_document_status');
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
        Schema::dropIfExists('form_complete_statuses');
    }
};
