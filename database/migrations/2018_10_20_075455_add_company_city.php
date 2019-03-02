<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Add_cities', function (Blueprint $table) {
            $table->increments('company_city_id');
            $table->string('company_city_name');
            $table->timestamps();
        });


        $current_date = date("Y.m.d h:i:s");
        DB::table('Add_cities')->insert(
        array(
            'company_city_name' => 'Lahore',
            'created_at' => $current_date,
        )
        );

        DB::table('Add_cities')->insert(
        array(
            'company_city_name' => 'Karachi',
            'created_at' => $current_date,
        )
        );

        DB::table('Add_cities')->insert(
        array(
            'company_city_name' => 'Islamabad',
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
        Schema::dropIfExists('Add_cities');
    }
}
