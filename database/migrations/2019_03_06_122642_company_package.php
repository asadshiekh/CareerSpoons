<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyPackage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_packages', function (Blueprint $table) {
            $table->increments('package_id');
            $table->string('package_name');
            $table->string('package_amount');
            $table->string('package_description');
            $table->timestamps();
        });

         $current_date = date("Y.m.d h:i:s");
        DB::table('company_packages')->insert(
        array(
            'package_name' => 'Free',
            'package_amount' => '0',
            'package_description' => 'This Package is Free',
            'created_at' => $current_date,
        )
        );

        DB::table('company_packages')->insert(
        array(
            'package_name' => 'Basic',
            'package_amount' => '1000',
            'package_description' => 'This Package is Free',
            'created_at' => $current_date,
        )
        );

        DB::table('company_packages')->insert(
        array(
            'package_name' => 'Premium',
            'package_amount' => '2000',
            'package_description' => 'This Package is Free',
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
        Schema::dropIfExists('company_packages');
    }
}
