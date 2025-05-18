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
        Schema::create('estimate_costs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('grants_received_from_abroad')->nullable();
            $table->string('donations_made_by_foreign_donors')->nullable();
            $table->string('local_grants')->nullable();
            $table->string('grant_total')->nullable();
            $table->string('prokolpo_year_grant')->nullable();
            $table->string('prokolpo_year_grant_start_date')->nullable();
            $table->string('prokolpo_year_grant_end_date')->nullable();
            $table->string('year_status')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('estimate_costs');
    }
};
