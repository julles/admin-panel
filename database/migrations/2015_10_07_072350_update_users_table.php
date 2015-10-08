<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users' , function($table){

            $table->integer('role_id')->unsigned();
            $table->string('firstname' , 50);
            $table->string('lastname' , 50);
            $table->string('gender' , 1);
            $table->string('address' , 500);
            $table->string('phone' , 15);
            

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('restrict')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users' , function($table){

        });
    }
}
