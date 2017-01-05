<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		//tabela muitos para muitos 
            Schema::create('course_discipline', function (Blueprint $table) {
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('Courses')->onDelete('cascade');
            $table->integer('discp_id')->unsigned();
            $table->foreign('discp_id')->references('id')->on('Disciplines')->onDelete('cascade');

            $table->integer('inst_id')->unsigned();
            $table->foreign('inst_id')->references('inst_id')->on('Courses')->onDelete('cascade');

            $table->timestamps();
        }); 


            Schema::create('Disciplines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('discp_name')->unique();
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
         Schema::dropIfExists('course_discipline');
		 Schema::dropIfExists('Disciplines');
    }
}
