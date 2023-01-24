<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientsservices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bid')->unsigned()->nullable();
            $table->integer('serviceId')->nullable()->unsigned();
            $table->integer('industryId')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('clientsservices', function (Blueprint $table) {
            $table->foreign('industryId')->references('id')->on('industries')->onDelete('cascade');
            $table->foreign('bid')->references('id')->on('businesses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientsservices');
    }
}
