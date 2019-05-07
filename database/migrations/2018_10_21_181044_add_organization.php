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
            $table->string('company_branch')->nullable($value = true); 
            $table->string('company_phone'); 
            $table->string('company_website')->default('www.example.com'); 
            $table->string('company_employees')->default('0');
            $table->string('company_industry')->nullable($value = true);
            $table->string('company_since')->nullable($value = true);
            $table->string('company_location')->nullable($value = true);
            $table->string('company_email');
            $table->string('company_password');
            $table->string('org_activation');
            $table->string('verify_by_email')->default('0');
            $table->string('registeration_process')->default('C');
            $table->string('company_cnic');
            $table->longText('company_info')->nullable($value = "No info Yet");
            $table->string('company_document')->default('Not Yet Have Any Document');
            $table->string('company_verify_status')->default('0');
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
