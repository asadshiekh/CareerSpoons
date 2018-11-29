<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserResumeEduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Add_User_Eductions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('candidate_id');
            $table->string('degree_title');
            $table->string('degree_level');
            $table->string('Institute_name');
            $table->string('institute_location');
            $table->string('edu_start');
            $table->string('edu_end');
            $table->string('majors');
            $table->string('selected_result');
            $table->string('cgpa')->default('0');
            $table->string('percentage')->default('0');
            $table->string('edu_description');
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
        Schema::dropIfExists('Add_User_Eductions');
    }
}
