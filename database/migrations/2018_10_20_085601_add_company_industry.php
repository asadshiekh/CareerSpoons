<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIndustry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Company_industries', function (Blueprint $table) {
            $table->increments('company_industry_id');
            $table->string('company_industry_name');            
            $table->timestamps();
        });


        $current_date = date("Y.m.d h:i:s");
        DB::table('Company_industries')->insert(
        array(
            'company_industry_name' => 'Accounting_&_Finance',
            'created_at' => $current_date,
        )
        );

         DB::table('Company_industries')->insert(
        array(
            'company_industry_name' => 'Automotive',
            'created_at' => $current_date,
        )
        );

          DB::table('Company_industries')->insert(
        array(
            'company_industry_name' => 'Business',
            'created_at' => $current_date,
        )
        );

           DB::table('Company_industries')->insert(
        array(
            'company_industry_name' => 'Education_Training',
            'created_at' => $current_date,
        )
        );

        DB::table('Company_industries')->insert(
        array(
            'company_industry_name' => 'Healthcare',
            'created_at' => $current_date,
        )
        );

          DB::table('Company_industries')->insert(
        array(
            'company_industry_name' => 'Restaurant_&_Food',
            'created_at' => $current_date,
        )
        );

           DB::table('Company_industries')->insert(
        array(
            'company_industry_name' => 'Transportation',
            'created_at' => $current_date,
        )
        );

        DB::table('Company_industries')->insert(
        array(
            'company_industry_name' => 'Telecommunications',
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
        Schema::dropIfExists('Company_industries');
    }
}
