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
            $table->id();
            $table->integer('user_id')->unsigned();  
            $table->integer('powerup_id')->unsigned();
            $table->boolean('is_active')->default(false);
            $table->timestamp('activation_date')->nullable();
            $table->timestamp('deactivation_date')->nullable();
            $table->timestamps();

        });
        Schema::table('user_powerups', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('powerup_id')->references('id')->on('powerups')->onDelete('cascade');
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
