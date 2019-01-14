<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Add_organizations', function (Blueprint $table) {
            $table->increments('company_id');
            $table->string('company_name'); 
            $table->string('company_type'); 
            $table->string('company_city'); 
            $table->string('company_branch'); 
            $table->bigInteger('company_phone'); 
            $table->string('company_website'); 
            $table->string('company_employees');
            $table->string('company_industry');
            $table->string('company_since');
            $table->string('company_location');
            $table->string('company_email');
            $table->string('company_password');
            $table->string('org_activation');
            $table->bigInteger('company_cnic');
            $table->longText('company_info');
            $table->string('company_document');

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
        Schema::dropIfExists('Add_organizations');
    }
}
