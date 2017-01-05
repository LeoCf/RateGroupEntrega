<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrimaryKeysHasManyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('discipline_user', function ($table) {
        $table->primary(['user_id', 'user_inst','udiscp_id']);
        });

        Schema::table('course_discipline', function ($table) {
        $table->primary(['course_id', 'discp_id','inst_id']);
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
    }
}
