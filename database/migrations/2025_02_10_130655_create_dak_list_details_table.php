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
        Schema::create('dak_list_details', function (Blueprint $table) {
            $table->id();
            $table->string('sender_admin_id')->nullable();
            $table->string('receiver_admin_id')->nullable();
            $table->string('main_dak_id')->nullable();
            $table->string('dak_type')->nullable();
            $table->string('receive_from_ngo')->nullable();
            $table->string('receive_status')->nullable();
            $table->string('nothi_jat_id',100)->nullable();
            $table->string('nothi_jat_status',100)->nullable();
            $table->string('sent_status',100)->nullable();
            $table->string('present_status',100)->nullable();
            $table->string('amPmValue',200)->nullable();
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
        Schema::dropIfExists('dak_list_details');
    }
};
