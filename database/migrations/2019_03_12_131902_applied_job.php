<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppliedJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apllied_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_id');
            $table->string('user_id');
            $table->string('post_id');
            $table->string('resume_id');
            $table->string('view_status');
            $table->string('shortlisted');
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
        Schema::dropIfExists('apllied_jobs');
    }
}
