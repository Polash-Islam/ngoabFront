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
        Schema::create('fd_four_one_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('prokolpo_name')->nullable();
            $table->string('prokolpo_permission_sarok_no')->nullable();
            $table->string('prokolpo_permission_sarok_date')->nullable();
            $table->string('prokolpo_year')->nullable();
            $table->string('prokolpo_amount_sarkrito_bangla_amount')->nullable();
            $table->string('prokolpo_amount_sarkrito_date')->nullable();
            $table->string('prokolpo_amount_grihito')->nullable();
            $table->string('prokolpo_amount_grihito_date')->nullable();
            $table->string('prokolpo_detail_file')->nullable();
            $table->string('ca_farm_seal')->nullable();
            $table->string('ca_farm_sign')->nullable();
            $table->string('ca_form_date')->nullable();
            $table->string('ca_form_name')->nullable();
            $table->string('ca_form_address')->nullable();
            $table->string('file_last_check_date')->nullable();
            $table->string('check_status')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('fd_four_one_forms');
    }
};
