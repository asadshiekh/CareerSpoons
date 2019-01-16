<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AboutUsContent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('About_us_content', function (Blueprint $table) {
            $table->increments('about_id');
            $table->string('about_qoute'); 
            $table->string('about_address');
            $table->string('about_email');
            $table->string('about_no');
            $table->string('about_video');
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
        Schema::dropIfExists('About_us_content');
    }
}
