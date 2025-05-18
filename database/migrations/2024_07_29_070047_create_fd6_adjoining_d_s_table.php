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
        Schema::create('fd6_adjoining_d_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('prokolpo_name')->nullable();
            $table->string('prokolpo_duration')->nullable();
            $table->string('total_allocation')->nullable();
            $table->string('total_allocation_prokolpo_area')->nullable();
            $table->text('total_benificiare')->nullable();
            $table->text('total_benificiare_prokolpo_area')->nullable();
            $table->text('donor_name')->nullable();
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
        Schema::dropIfExists('fd6_adjoining_d_s');
    }
};
