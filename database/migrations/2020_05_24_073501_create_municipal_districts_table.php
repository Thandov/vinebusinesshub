<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipal_districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('municipal_district');
            $table->integer('provinceId')->nullable()->unsigned();
            $table->timestamps();
        });
        Schema::table('municipal_districts', function (Blueprint $table) {
            $table->foreign('provinceId')->references('id')->on('provinces')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipal_districts');
    }
}
