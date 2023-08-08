<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPowerupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_powerups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('powerup_id', 20)->index(); /* power4 */
            $table->boolean('is_active')->default(false); /* true */
            $table->timestamp('activation_date')->unique()->nullable();
            $table->timestamp('deactivation_date')->unique()->nullable();
            $table->timestamps();
        });
        Schema::table('user_powerups', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('powerup_id')->references('powerid')->on('powerups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_powerups');
    }
}
