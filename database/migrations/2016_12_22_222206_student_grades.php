<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentGrades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('students_grades', function (Blueprint $table) 
         {
            $table->increments('id');           
            $table->integer('work_done');
            $table->integer('work_comprehension');
            $table->integer('quality_work');
            $table->integer('cooperation');
            $table->integer('commitment');
            $table->integer('efficiency');
            $table->integer('utilizadores_idUser')->unsigned(); 
			$table->foreign('utilizadores_idUser')->references('id')->on('users');			
            $table->timestamps();
         });

/** Foreign keys separeted for better understanding*/
/* 
    Schema::table('student_grades', function($table) {
       $table->foreign('utilizadores_idUser')->references('id')->on('users');
   }); */

    }
        


    /**
     * Reverse the migrations.
     *
     * @return void
     */
        public function down()
        {
        //
         Schema::dropIfExists('students_grades');
        }
}
