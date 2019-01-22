<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizationSocialMediaLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Add_Organization_Social_link', function (Blueprint $table) {
     $table->increments('id');
    $table->string('organization_id');
    $table->string('organization_fackbook')->default('http://facebook.com');
    $table->string('organization_google')->default('https://plus.google.com/');
    $table->string('organization_twitter')->default('https://twitter.com/');
    $table->string('organization_linkedin')->default('https://www.linkedin.com/');
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
        Schema::dropIfExists('Add_Organization_Social_link');
    }
}
