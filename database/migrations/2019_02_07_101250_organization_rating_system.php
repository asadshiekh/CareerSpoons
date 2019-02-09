<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrganizationRatingSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_reviews',function (Blueprint $table) {
            $table->increments('id');
            $table->string('organization_id');
            $table->string('rating_points')->default('0');
            $table->longText('review_description')->nullable($value = true);
            $table->boolean('review_status')->default('1');
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
        Schema::dropIfExists('organization_reviews');
    }
}
