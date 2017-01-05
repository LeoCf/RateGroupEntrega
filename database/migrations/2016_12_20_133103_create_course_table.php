<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('Courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Course_name')->unique();
            $table->integer('inst_id')->unsigned();
            $table->foreign('inst_id')->references('id')->on('Institutions');
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
        Schema::dropIfExists('Courses');
    }
}
