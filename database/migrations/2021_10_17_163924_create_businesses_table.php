<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_rep')->nullable()->unsigned();
            $table->string('business_name')->nullable();
            $table->string('business_number')->nullable();
            $table->string('business_bio')->nullable();
            $table->string('email', 150)->unique()->nullable();
            $table->integer('provinceId')->nullable()->unsigned();
            $table->integer('districtId')->nullable()->unsigned();
            $table->integer('municipalityId')->nullable()->unsigned();
            $table->string('town')->nullable();
            $table->string('address')->nullable();
            $table->string('company_reg')->nullable();
            $table->string('website')->nullable();
            $table->integer('industryId')->nullable()->unsigned();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('logo')->nullable();
            $table->string('marketingpic')->nullable();
             $table->string('activation_status')->nullable();
            $table->timestamps();
        });
        Schema::table('businesses', function (Blueprint $table) {
            $table->foreign('provinceId')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('districtId')->references('id')->on('municipal_districts')->onDelete('cascade');
            $table->foreign('company_rep')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('industryId')->references('id')->on('industries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}