<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDegreeLevel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_degreelevel', function (Blueprint $table) {
             $table->increments('degree_id');
            $table->string('degree_title');
            $table->timestamps();
        });


         $current_date = date("Y.m.d h:i:s");
        DB::table('add_degreelevel')->insert(
        array(
            'degree_title' => 'FA',
            'created_at' => $current_date,
        )
        );

        DB::table('add_degreelevel')->insert(
        array(
            'degree_title' => 'BA',
            'created_at' => $current_date,
        )
        );


        DB::table('add_degreelevel')->insert(
        array(
            'degree_title' => 'FSC',
            'created_at' => $current_date,
        )
        );  


        DB::table('add_degreelevel')->insert(
        array(
            'degree_title' => 'ICOM',
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
        Schema::dropIfExists('Add_degreelevel');
    }
}
