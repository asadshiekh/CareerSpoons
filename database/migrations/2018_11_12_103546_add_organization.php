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
            $table->increments('id');
            $table->string('company_name'); 
            $table->string('company_type'); 
            $table->string('company_city'); 
            $table->string('company_branch'); 
            $table->string('company_phone'); 
            $table->string('company_website')->default('www.example.com'); 
            $table->string('company_employees')->default('0');
            $table->string('company_industry');
            $table->string('company_since');
            $table->string('company_location');
            $table->string('company_email');
            $table->string('company_password');
            $table->string('company_cnic');
            $table->string('verify_by_email')->default('0');
            $table->string('company_info')->default('About Your Company');
            $table->string('company_document')->default('Not Yet Have Any Document');
            $table->string('isChecked');
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
