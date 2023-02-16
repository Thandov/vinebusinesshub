<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_approvals', function (Blueprint $table) {
            $table->id();
            $table->string('items');
            $table->string('linkKey');
            $table->integer('company_rep')->nullable()->unsigned();            
            $table->timestamps();
        });
        Schema::table('businesses', function (Blueprint $table) {
            $table->foreign('company_rep')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pending_approvals');
    }

    
}
