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
        Schema::create('fd_five_received_goods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd5_form_id')->unsigned();
            $table->foreign('fd5_form_id')->references('id')->on('fd_five_forms')->onDelete('cascade');
            $table->string('source_received_date')->nullable();
            $table->longText('source_of_goods_name')->nullable();
            $table->string('source_of_goods_address')->nullable();
            $table->string('actual_of_receipt_source')->nullable();
            $table->longText('purpose_of_receipt_goods')->nullable();
            $table->string('amount_of_material_received')->nullable();
            $table->string('estimated_value_of_goods')->nullable();
            $table->string('date_of_project_approval')->nullable();
            $table->string('date_of_Commitment')->nullable();
            $table->string('user_id')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('fd_five_received_goods');
    }
};
