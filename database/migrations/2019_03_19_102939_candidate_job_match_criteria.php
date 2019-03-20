<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CandidateJobMatchCriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_job_match_criteria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('candidate_id');
            $table->string('desired_designation')->nullable($value = true); 
            $table->string('functional_criteria')->nullable($value = true);
            $table->string('major_criteria')->nullable($value = true);
            $table->string('preferred_city')->nullable($value = true);
            $table->string('total_experience')->nullable($value = true);
            $table->string('expected_salary')->nullable($value = true);
            $table->string('job_type_criteria')->nullable($value = true);
            $table->string('candidate_primary_skill')->nullable($value = true);
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
        Schema::dropIfExists('candidate_job_match_criteria');
    }
}
