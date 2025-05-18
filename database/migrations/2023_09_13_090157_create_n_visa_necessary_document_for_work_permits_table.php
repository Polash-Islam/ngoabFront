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
        Schema::create('n_visa_necessary_document_for_work_permits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('n_visa_id')->unsigned();
            $table->foreign('n_visa_id')->references('id')->on('n_visas')->onDelete('cascade');
            $table->string('nomination_letter_of_buyer')->nullable();
            $table->string('registration_letter_of_board_of_investment')->nullable();
            $table->string('employee_contract_copy')->nullable();
            $table->string('board_of_the_directors_sign_letter')->nullable();
            $table->string('share_holder_copy')->nullable();
            $table->string('passport_photocopy')->nullable();
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
        Schema::dropIfExists('n_visa_necessary_document_for_work_permits');
    }
};
