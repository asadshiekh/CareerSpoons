<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserGeneralInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Add_User_Generals_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('candidate_id');
            $table->string('candidate_name');
            $table->string('candidate_profession');
            $table->string('candidate_number');
            $table->string('candidate_city');
            $table->string('candidate_location');
            $table->string('candidate_dob');
            $table->string('candidate_website')->nullable($value = true);
            $table->string('candidate_gender');
            $table->string('candidate_career_level');
            $table->string('candidate_degree_level');
             $table->string('candidate_resume_details');
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
        Schema::dropIfExists('Add_User_Generals_info');
    }
}
