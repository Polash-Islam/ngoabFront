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
        Schema::create('document_for_executive_committee_approvals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fdId')->unsigned();
            $table->foreign('fdId')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('file_one')->nullable();
            $table->string('file_two')->nullable();
            $table->string('file_three')->nullable();
            $table->string('file_four')->nullable();
            $table->string('file_five')->nullable();
            $table->string('status',100)->nullable();
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
        Schema::dropIfExists('document_for_executive_committee_approvals');
    }
};
