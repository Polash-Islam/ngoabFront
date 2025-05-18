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
        Schema::create('fd_four_one_expenditure_sectors', function (Blueprint $table) {
            $table->id();
            $table->integer('fd_four_one_id')->nullable();
            $table->string('expenditure_sectors')->nullable();
            $table->string('approved_budget_money')->nullable();
            $table->string('actual_cost')->nullable();
            $table->string('difference')->nullable();
            $table->string('percentage')->nullable();
            $table->string('reason_for_the_difference')->nullable();
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
        Schema::dropIfExists('fd_four_one_expenditure_sectors');
    }
};
