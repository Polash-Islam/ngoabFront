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
        Schema::create('form_no_four_sector_details', function (Blueprint $table) {
            $table->id();
            $table->integer('form_no_four_id')->nullable();
            $table->string('work_area')->nullable();
            $table->longText('sector_detail')->nullable();
            $table->string('target_real')->nullable();
            $table->string('target_financial')->nullable();
            $table->string('achievement_real')->nullable();
            $table->string('achievement_financial')->nullable();
            $table->string('comulative_achievement')->nullable();
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('form_no_four_sector_details');
    }
};
