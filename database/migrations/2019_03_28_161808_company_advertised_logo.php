<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyAdvertisedLogo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Company_Advertised_Logo', function (Blueprint $table) {
            $table->increments('company_advertise_id');
            $table->string('company_id');
            $table->string('company_logo')->nullable($value = true);
            $table->boolean('company_logo_status')->default('0');
            $table->boolean('company_logo_submitted')->default('0');
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
        Schema::dropIfExists('Company_Advertised_Logo');
    }
}
