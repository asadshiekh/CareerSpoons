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
            $table->string('admin_phone');
            $table->string('admin_address');
            $table->string('admin_username');
            $table->string('admin_email');
            $table->string('admin_pass');
            $table->string('account_right');
            $table->string('account_activation');
            $table->timestamps();
        });

        $current_date = date("Y.m.d h:i:s");
        DB::table('Admin_account')->insert(
        array(
            'admin_fullname' => 'Syeda Nayab Zahra',
            'admin_phone' => '03349974743',
            'admin_address' => 'nayabzahira161@gmail.com',
            'admin_username' => 'nayab',
            'admin_email' => 'nayabzahira161@gmail.com',
            'admin_pass' => 'asad',
            'account_right' => 'superadmin',
            'account_activation' => 'Active',
            'created_at' => $current_date,
        )
        );


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
