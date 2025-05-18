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
        Schema::create('fd6_adjoining_e_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('prokolpo_name')->nullable();
            $table->string('prokolpo_duration')->nullable();
            $table->string('ngo_permission_date')->nullable();
            $table->string('prokolpo_price')->nullable();
            $table->string('prokolpo_audit_report')->nullable();
            $table->string('prokolpo_final_report')->nullable();
            $table->string('prokolpo_local_audit_report')->nullable();
            $table->string('development_detail')->nullable();
            $table->string('after_end_prokolpo')->nullable();
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
        Schema::dropIfExists('fd6_adjoining_e_s');
    }
};
