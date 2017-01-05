<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GroupUserTableGuDiscpId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_user', function ($table) {
        $table->integer('gu_discp_id')->unsigned();
        $table->foreign('gu_discp_id')->references('discp_id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_user', function ($table) {
        $table->dropColumn('gu_discp_id');
        });
}
}
