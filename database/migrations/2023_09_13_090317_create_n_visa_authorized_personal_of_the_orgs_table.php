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
        Schema::create('n_visa_authorized_personal_of_the_orgs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('n_visa_id')->unsigned();
            $table->foreign('n_visa_id')->references('id')->on('n_visas')->onDelete('cascade');
            $table->string('auth_person_org_name')->nullable();
            $table->string('auth_person_org_house_no')->nullable();
            $table->string('auth_person_org_flat_no')->nullable();
            $table->string('auth_person_org_road_no')->nullable();
            $table->string('auth_person_org_post_office')->nullable();
            $table->string('auth_person_org_mobile')->nullable();
            $table->string('auth_person_org_district')->nullable();
            $table->string('auth_person_org_thana')->nullable();
            $table->string('submission_date')->nullable();
            $table->string('expatriate_name')->nullable();
            $table->string('expatriate_email')->nullable();
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
        Schema::dropIfExists('n_visa_authorized_personal_of_the_orgs');
    }
};
