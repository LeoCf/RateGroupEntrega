<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->integer('group_id')->unsigned()->index();
            $table->foreign('group_id')->references('idgroup')->on('groups')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('gu_discp_id')->unsigned();
            $table->foreign('gu_discp_id')->references('discp_id')->on('groups')->onDelete('cascade');
            $table->integer('gu_inst_id')->unsigned();
            $table->foreign('gu_inst_id')->references('inst_id')->on('users')->onDelete('cascade');
            $table->primary(['group_id', 'user_id','gu_discp_id','gu_inst_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('group_user');
    }
}
