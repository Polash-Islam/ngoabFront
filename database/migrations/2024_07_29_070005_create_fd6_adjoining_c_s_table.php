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
        Schema::create('fd6_adjoining_c_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('proof_of_land_ownership')->nullable();
            $table->string('land_development_tax')->nullable();
            $table->string('engineer_name')->nullable();
            $table->string('engineer_desi')->nullable();
            $table->text('engineer_seal')->nullable();
            $table->text('engineer_sign')->nullable();
            $table->text('construction_layout')->nullable();
            $table->string('estimated_expenses')->nullable();
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
        Schema::dropIfExists('fd6_adjoining_c_s');
    }
};
