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
        Schema::create('n_visa_particulars_of_foreign_incumbnets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('n_visa_id')->unsigned();
            $table->foreign('n_visa_id')->references('id')->on('n_visas')->onDelete('cascade');
            $table->string('name_of_the_foreign_national')->nullable();
            $table->string('nationality')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('passport_issue_date')->nullable();
            $table->string('passport_issue_place')->nullable();
            $table->string('passport_expiry_date')->nullable();
            $table->string('home_country')->nullable();
            $table->string('house_no')->nullable();
            $table->string('flat_no')->nullable();
            $table->string('road_no')->nullable();
            $table->string('post_code')->nullable();
            $table->string('state')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('email')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('martial_status')->nullable();
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
        Schema::dropIfExists('n_visa_particulars_of_foreign_incumbnets');
    }
};
