<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrganizationPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Organization_posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('company_id'); 
            $table->bigInteger('org_contact_phone');
            $table->string('org_contact_email'); 
            $table->string('posted_job_title'); 
            $table->string('career_level'); 
            $table->string('job_experience'); 
            $table->string('job_salary'); 
            $table->string('job_skills'); 
            $table->string('job_tags'); 
            $table->string('gender_preferences'); 
            $table->longText('job_info'); 
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
        Schema::dropIfExists('Organization_posts');
    }
}
