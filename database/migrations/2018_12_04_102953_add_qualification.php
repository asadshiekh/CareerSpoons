<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQualification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Add_qualification', function (Blueprint $table) {
            $table->increments('qual_id');
            $table->string('qualification_title');
            $table->timestamps();
        });

        $current_date = date("Y.m.d h:i:s");
        DB::table('Add_qualification')->insert(
        array(
            'qualification_title' => 'Matric',
            'created_at' => $current_date,
        )
        );

        DB::table('Add_qualification')->insert(
        array(
            'qualification_title' => 'Intermediate',
            'created_at' => $current_date,
        )
        );

        DB::table('Add_qualification')->insert(
        array(
            'qualification_title' => 'Bachelor',
            'created_at' => $current_date,
        )
        );

        DB::table('Add_qualification')->insert(
        array(
            'qualification_title' => 'Masters',
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
        Schema::dropIfExists('Add_qualification');
    }
}
