<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserSoicalMediaLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Add_user_social_Media_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('candidate_id');
            $table->string('candidate_fackbook')->nullable($value = true)->default('http://facebook.com');
            $table->string('candidate_google')->nullable($value = true)->default('https://plus.google.com/');
            $table->string('candidate_twitter')->nullable($value = true)->default('https://twitter.com/');
            $table->string('candidate_linkedin')->nullable($value = true)->default('https://www.linkedin.com/');
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
        Schema::dropIfExists('Add_user_social_Media_links');
    }
}
