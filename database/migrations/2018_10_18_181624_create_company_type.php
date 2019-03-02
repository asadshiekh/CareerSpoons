<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Company_types', function (Blueprint $table) {
            $table->increments('company_type_id');
            $table->string('company_type_name');
            $table->timestamps();
        });

         $current_date = date("Y.m.d h:i:s");
          DB::table('Company_types')->insert(
        array(
            'company_type_name' => 'Private',
            'created_at' => $current_date,
        )
        );

           DB::table('Company_types')->insert(
        array(
            'company_type_name' => 'Public',
            'created_at' => $current_date,
        )
        );

        DB::table('Company_types')->insert(
        array(
            'company_type_name' => 'NGO',
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
        Schema::dropIfExists('Company_types');
    }
}
