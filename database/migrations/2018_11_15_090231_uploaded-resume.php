<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UploadedResume extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_upload_resumes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('user_email')->unique();
            $table->string('destination'); 
            $table->string('uploaded_resume');     
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
        Schema::dropIfExists('user_upload_resumes');
    }
}
