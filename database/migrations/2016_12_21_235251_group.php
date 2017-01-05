<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Group extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('groups', function (Blueprint $table) 
        {
            $table->increments('id');           
            $table->string('nome');
            $table->datetime('data_fim');  
            $table->integer('m_limit');
            $table->integer('discp_id')->unsigned();               
            $table->timestamps();
        });

/** Foreign keys separeted for better understanding*/

    Schema::table('groups', function($table) {
       $table->foreign('discp_id')->references('id')->on('Disciplines');
   });

    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::dropIfExists('groups');
    }
}
