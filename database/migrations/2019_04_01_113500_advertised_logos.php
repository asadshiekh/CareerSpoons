<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdvertisedLogos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertised_logos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_id');
            $table->string('company_name');
            $table->string('company_logo');
            $table->string('display_start_date');
            $table->string('display_end_date');
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
        Schema::dropIfExists('advertised_logos');
    }
}
