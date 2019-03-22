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
            $table->bigInteger('company_id'); 
            $table->string('job_title');
            $table->string('job_skills');  
            $table->string('functional_area'); 
            $table->string('req_major');
            $table->string('req_industry'); 
            $table->string('req_career_level'); 
            $table->string('job_experience'); 
            $table->bigInteger('total_positions'); 
            $table->bigInteger('working_hours');
            $table->bigInteger('min_salary'); 
            $table->bigInteger('max_salary'); 
            $table->string('last_apply_date');  
            $table->string('post_visibility_date');
            $table->string('selected_gender');
            $table->string('prefered_age');
            $table->longText('job_post_info'); 
            $table->string('post_status'); 
           
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
