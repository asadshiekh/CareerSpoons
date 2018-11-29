<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserResumeExperience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Add_User_Experiences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('candidate_id');
            $table->string('job_title');
            $table->string('company_name');
            $table->string('ref_email');
            $table->string('ref_phone');
            $table->string('your_position');
            $table->string('exp_start');
            $table->string('exp_end');
            $table->string('exp_description');
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
        Schema::dropIfExists('Add_User_Experiences');
    }
}
