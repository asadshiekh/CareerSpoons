<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResumeTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume_templates', function (Blueprint $table) {
            $table->increments('temp_id');
            $table->string('temp_title');
            $table->string('temp_info');
            $table->string('index_page')->default('index.php');
            $table->string('css_page')->default('style.css');
            $table->string('cover_img')->default('image.png');
            $table->string('template_folder');
            $table->timestamps();
        });


        $current_date = date("Y.m.d h:i:s");
        DB::table('resume_templates')->insert(
        array(
            'temp_title' => 'Ionic',
            'temp_info' => 'This is Ionic',
            'index_page' => 'resume.blade.php',
            'css_page' => 'style.css',
            'cover_img' => 'image.PNG',
            'template_folder' => '902524166',
            'created_at' => $current_date,
        )
        );





    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resume_templates');
    }
}
