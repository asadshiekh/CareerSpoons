<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Admin_account', function (Blueprint $table) {
            $table->increments('account_id');
            $table->string('admin_fullname');
            $table->bigInteger('admin_phone');
            $table->string('admin_address');
            $table->string('admin_username');
            $table->string('admin_email');
            $table->string('admin_pass');
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
        Schema::dropIfExists('Admin_account');
    }
}
