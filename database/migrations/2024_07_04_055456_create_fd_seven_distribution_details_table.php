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
        Schema::create('fd_seven_distribution_details', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('district_name')->nullable();
            $table->string('upozila_name')->nullable();
            $table->string('product_des')->nullable();
            $table->string('product_quantity')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('unit_name')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('total_beneficiaries')->nullable();
            $table->longText('comment')->nullable();
            $table->string('user_id')->nullable();
            $table->string('upload_type')->nullable();
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
        Schema::dropIfExists('fd_seven_distribution_details');
    }
};
