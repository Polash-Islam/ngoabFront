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
        Schema::create('fd6_vechile_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd6_form_id')->unsigned();
            $table->foreign('fd6_form_id')->references('id')->on('fd6_forms')->onDelete('cascade');
            $table->string('item_name')->nullable();
            $table->string('item_quantity')->nullable();
            $table->string('item_net_price')->nullable();
            $table->string('item_total_price')->nullable();
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
        Schema::dropIfExists('fd6_vechile_details');
    }
};
