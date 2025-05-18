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
        Schema::create('fd_one_member_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('address')->nullable();
            $table->string('date_of_join')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('citizenship')->nullable();
            $table->text('salary_statement')->nullable();
            $table->text('other_occupation')->nullable();
            $table->string('now_working_at')->nullable();
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
        Schema::dropIfExists('fd_one_member_lists');
    }
};
