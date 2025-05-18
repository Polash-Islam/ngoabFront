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
        Schema::create('fd6_adjoining_a_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('grant_amount_in_cash')->nullable();
            $table->longText('strategic_coperation')->nullable();
            $table->string('help_with_product')->nullable();
            $table->longText('other')->nullable();
            $table->string('project_implementation_area')->nullable();
            $table->longText('other_information_note')->nullable();
            $table->string('copy_of_contract')->nullable();
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
        Schema::dropIfExists('fd6_adjoining_a_s');
    }
};
