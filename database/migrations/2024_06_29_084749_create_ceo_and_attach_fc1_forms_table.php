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
        Schema::create('ceo_and_attach_fc1_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fc1_form_id')->unsigned();
            $table->foreign('fc1_form_id')->references('id')->on('fc1_forms')->onDelete('cascade');
            $table->string('ceo_name')->nullable();
            $table->string('ceo_desi')->nullable();
            $table->string('ceo_seal')->nullable();
            $table->string('ceo_sing')->nullable();
            $table->string('ceo_date')->nullable();
            $table->string('audit_report')->nullable();
            $table->string('donor_file')->nullable();
            $table->string('donor_agency_file')->nullable();
            $table->string('proof_of_audit_report')->nullable();
            $table->string('final_report')->nullable();
            $table->string('admin_file')->nullable();
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
        Schema::dropIfExists('ceo_and_attach_fc1_forms');
    }
};
