<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyForgetPassword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_forget_password', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_id');
            $table->string('company_email');
            $table->string('start_time');
            $table->string('expire_time');
            $table->string('current_date_year');
            $table->string('verfication_link')->default('0');
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
        Schema::dropIfExists('company_forget_password');
    }
}
