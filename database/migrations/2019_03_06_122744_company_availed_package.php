<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyAvailedPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_availed_packages', function (Blueprint $table) {
            $table->increments('company_availed_id');
            $table->string('company_id');
            $table->string('package_id');
            $table->string('subscription_email')->nullable($value = true);
            $table->string('company_package_number')->nullable($value = true);
            $table->string('package_start_date')->nullable($value = true);
            $table->string('package_end_date')->nullable($value = true);
            $table->boolean('company_package_status')->default('0');
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
        Schema::dropIfExists('company_availed_packages');
    }
}
