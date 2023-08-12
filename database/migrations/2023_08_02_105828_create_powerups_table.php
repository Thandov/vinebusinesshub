<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePowerupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powerups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('powerid', 20)->index(); /* power4 */
            $table->unsignedInteger('user_id');
            $table->longText('icon');
            $table->string('name', 255)->unique()->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
        Schema::table('powerups', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('powerups');
    }
}
