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
        Schema::create('form_no_five_step_fours', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('form_no_fives_id')->unsigned();
            $table->foreign('form_no_fives_id')->references('id')->on('form_no_fives')->onDelete('cascade');
            $table->longText('description_of_property')->nullable();
            $table->string('sub_property')->nullable();
            $table->string('quantity')->nullable();
            $table->string('collect_date')->nullable();
            $table->string('real_buying_price')->nullable();
            $table->string('fund_source')->nullable();
            $table->longText('what_is_it_used_for')->nullable();
            $table->longText('place')->nullable();
            $table->longText('assets_sold_transferred_number_or_quantity')->nullable();
            $table->longText('quantity_during_start_of_organization')->nullable();
            $table->longText('total_during_start_of_organization')->nullable();
            $table->longText('current_status')->nullable();
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
        Schema::dropIfExists('form_no_five_step_fours');
    }
};
