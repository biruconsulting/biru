<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_ads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_first_name');
            $table->string('user_last_name');
            $table->string('user_email');
            $table->string('user_phone_number');
            $table->string('user_district');
            $table->boolean('ad_available')->default(true);
            $table->string('ad_type');
            $table->string('ad_title');
            $table->string('ad_category');
            $table->string('ad_thumbnail_image');
            $table->text('ad_images')->nullable()->comment('For General Ad, Property Ad');
            $table->string('ad_condition')->nullable()->comment('For General Ad, Property Ad');
            $table->string('ad_property_address')->nullable()->comment('For Property Ad');
            $table->string('ad_brand')->nullable()->comment('For General Ad');
            $table->string('ad_model')->nullable()->comment('For General Ad');
            $table->integer('ad_price')->nullable()->comment('For General Ad, Property Ad');
            $table->string('ad_job_type')->nullable()->comment('For Job Ad');
            $table->string('ad_work_address')->nullable()->comment('For Job Ad');
            $table->integer('ad_salary')->nullable()->comment('For Job Ad');
            $table->string('ad_education_level')->nullable()->comment('For Job Ad');
            $table->string('ad_short_description');
            $table->text('ad_description');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('seller_ads');
    }
}
