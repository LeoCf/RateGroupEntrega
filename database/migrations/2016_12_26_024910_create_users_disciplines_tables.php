<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersDisciplinesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplines_users', function (Blueprint $table) 
        {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade');
            $table->integer('user_inst')->unsigned();
            $table->foreign('user_inst')->references('inst_id')->on('Users')->onDelete('cascade');

            $table->integer('udiscp_id')->unsigned();
            $table->foreign('udiscp_id')->references('discp_id')->on('Disciplines')->onDelete('cascade');

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
          Schema::dropIfExists('disciplines_users');
    }
}
