<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobQualification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_req_qualifications', function (Blueprint $table) {
            $table->increments('job_qual_id');
            $table->string('req_qualification');
            $table->string('req_degree_level');
            $table->bigInteger('post_id');
            $table->bigInteger('company_id'); 
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
        Schema::dropIfExists('job_req_qualifications');
    }
}
