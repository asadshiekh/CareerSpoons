<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AvailedPackageRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Availed_package_records',function (Blueprint $table){

            $table->increments('Record_id');
            $table->string('company_id');
            $table->string('package_id');
            $table->string('subscription_email');
            $table->string('company_package_number');
            $table->string('package_start_date');
            $table->string('package_end_date');
            $table->string('company_logo');
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
        Schema::dropIfExists('Availed_package_records');
    }
}
