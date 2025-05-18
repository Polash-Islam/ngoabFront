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
        Schema::create('sector_wise_expenditures', function (Blueprint $table) {
            $table->id();
            $table->integer('fc1_form_id')->nullable();
            $table->string('type')->nullable();
            $table->string('activities')->nullable();
            $table->string('estimated_expenses')->nullable();
            $table->string('work_area_district')->nullable();
            $table->string('work_area_sub_district')->nullable();
            $table->string('time_limit')->nullable();
            $table->string('number_of_beneficiaries')->nullable();
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
        Schema::dropIfExists('sector_wise_expenditures');
    }
};
