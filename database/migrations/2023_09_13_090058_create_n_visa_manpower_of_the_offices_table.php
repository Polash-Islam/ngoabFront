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
        Schema::create('n_visa_manpower_of_the_offices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('n_visa_id')->unsigned();
            $table->foreign('n_visa_id')->references('id')->on('n_visas')->onDelete('cascade');
            $table->string('local_executive')->nullable();
            $table->string('local_supporting_staff')->nullable();
            $table->string('local_total')->nullable();
            $table->string('foreign_executive')->nullable();
            $table->string('foreign_supporting_staff')->nullable();
            $table->string('foreign_total')->nullable();
            $table->string('gand_total')->nullable();
            $table->string('local_ratio')->nullable();
            $table->string('foreign_ratio')->nullable();
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
        Schema::dropIfExists('n_visa_manpower_of_the_offices');
    }
};
