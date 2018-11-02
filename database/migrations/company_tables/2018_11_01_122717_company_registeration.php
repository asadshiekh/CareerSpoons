<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyRegisteration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('company_email')->unique();
            $table->string('company_password');
            $table->string('company_type');
            $table->string('company_city');
            $table->string('company_branch');
            $table->string('company_industry');
            $table->string('company_operating_since');
            $table->string('company_phone_number');
            $table->string('company_cnic');
            $table->string('company_address');
            $table->rememberToken();
            $table->string('isChecked');
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
        Schema::dropIfExists('register_companies');
    }
}
