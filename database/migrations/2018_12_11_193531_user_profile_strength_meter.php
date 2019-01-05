<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserProfileStrengthMeter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile_strength', function (Blueprint $table) {
            $table->increments('id');
            $table->string('candidate_id');
            $table->string('education_category')->default('0');
            $table->string('education_value')->default('0');
            $table->string('experience_category')->default('0');
            $table->string('experience_value')->default('0');
            $table->string('project_category')->default('0');
            $table->string('project_value')->default('0');
            $table->string('skill_category')->default('0');
            $table->string('skill_value')->default('0');
            $table->string('hobbies_category')->default('0');
            $table->string('hobbies_value')->default('0');
            $table->string('Total_Value')->default('0');
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
        Schema::dropIfExists('user_profile_strength');
    }
}
