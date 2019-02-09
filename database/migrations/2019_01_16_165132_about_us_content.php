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

        $current_date = date("Y.m.d h:i:s");
        DB::table('About_us_content')->insert(
        array(
            'about_qoute' => 'If opportunity doesn’t knock, build a door',
            'about_address' => 'Office New DHA, Phase VIII Park View',
            'about_email' => 'careerspoons@gmail.com',
            'about_no' => '0334-9974743',
            'about_video' => '1.mp4',
            'created_at' => $current_date,
        )
        );

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
