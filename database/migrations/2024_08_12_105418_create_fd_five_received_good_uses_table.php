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
        Schema::create('fd_five_received_good_uses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd5_form_id')->unsigned();
            $table->foreign('fd5_form_id')->references('id')->on('fd_five_forms')->onDelete('cascade');
            $table->string('organization_usage_volume')->nullable();
            $table->longText('person_detail')->nullable();
            $table->longText('details_of_any_goods_sold')->nullable();
            $table->longText('goods_transferred_detail')->nullable();
            $table->longText('bureau_approval_file_goods_sold')->nullable();
            $table->longText('bureau_approval_file_transferred_detail')->nullable();
            $table->longText('detail_of_goods_medium')->nullable();
            $table->longText('bureau_approval_file_goods_medium')->nullable();
            $table->longText('details_of_remaining_goods')->nullable();
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
        Schema::dropIfExists('fd_five_received_good_uses');
    }
};
