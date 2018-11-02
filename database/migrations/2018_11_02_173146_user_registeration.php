<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRegisteration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('candidate_name');
            $table->string('user_email')->unique();
            $table->string('password');
            $table->string('username');
            $table->string('phone_number');
            $table->string('current_cv_status');
            $table->string('checkbox');
            $table->string('verify_by_email')->default('0');;
            $table->rememberToken();
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
        Schema::dropIfExists('register_users');
    }
}
