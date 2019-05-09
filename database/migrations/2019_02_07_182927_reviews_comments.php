<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReviewsComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews_comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->string('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_comments');
            $table->string('company_id');
            $table->string('comment_status')->default('1');
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
        Schema::dropIfExists('reviews_comments');
    }
}
