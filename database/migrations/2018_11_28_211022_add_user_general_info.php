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
            $table->string('candidate_name')->nullable($value = true);
            $table->string('candidate_profession')->nullable($value = true);
            $table->string('candidate_number')->nullable($value = true);
            $table->string('candidate_city')->nullable($value = true);
            $table->string('candidate_location')->nullable($value = true);
            $table->string('candidate_dob')->nullable($value = true);
            $table->string('candidate_age')->nullable($value = true);
            $table->string('candidate_website')->nullable($value = true);
            $table->string('candidate_gender')->nullable($value = true);
            $table->string('candidate_career_level')->nullable($value = true);
            $table->string('candidate_degree_level')->nullable($value = true);
             $table->longText('candidate_resume_details')->nullable($value = true);
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
