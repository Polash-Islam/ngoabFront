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
        Schema::create('fd9_foreigner_employee_family_member_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd9_form_id')->unsigned();
            $table->foreign('fd9_form_id')->references('id')->on('fd9_forms')->onDelete('cascade');
            $table->string('family_member_name')->nullable();
            $table->string('family_member_age')->nullable();
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
        Schema::dropIfExists('fd9_foreigner_employee_family_member_lists');
    }
};
