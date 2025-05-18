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
        Schema::create('fd6_project_management', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('implementation_of_activities')->nullable();
            $table->string('associate_NGO_detail')->nullable();
            $table->string('details_of_project_Officers_and_employees')->nullable();
            $table->string('construction_details')->nullable();
            $table->string('financial_sector_sub_sector_wise_allocation')->nullable();
            $table->string('project_sustained_and_managed')->nullable();
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
        Schema::dropIfExists('fd6_project_management');
    }
};
