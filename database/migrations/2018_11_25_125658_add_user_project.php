<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Add_User_Projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('candidate_id');
            $table->string('project_title');
            $table->string('project_company_name');
            $table->string('project_ref_email');
            $table->string('project_ref_phone');
            $table->string('your_porject_position');
            $table->string('pro_start');
            $table->string('pro_end');
            $table->string('project_description');
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
        Schema::dropIfExists('Add_User_Projects');
    }
}
