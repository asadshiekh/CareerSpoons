<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminCustomInquiryMails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Admin_custom_inquiry_mails', function (Blueprint $table) {
            $table->increments('mail_id');
            $table->string('to_email');
            $table->longText('mail_text');
            $table->string('sender_email');
             $table->string('sender_role');
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
        Schema::dropIfExists('Admin_custom_inquiry_mails');
    }
}
