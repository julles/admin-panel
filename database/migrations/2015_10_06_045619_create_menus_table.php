<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned();
            $table->string('title' , 50);
            $table->string('controller' , 50);
            $table->string('permalink' , 50);
            $table->integer('order');
            $table->string('icon' , 50);
            $table->timestamps();
            $table->index(['parent_id' , 'title' ,'controller' , 'permalink' , 'order']);
        });

        \DB::table('menus')->truncate();

        $developer = \DB::table('menus')->insert([ // this parent developer menu
            'id' => 1,
            'parent_id' => '0',
            'title' => 'Developer',
            'controller' => '#',
            'permalink' => '#',
            'order' => '666',
            'icon' => 'developer',

        ]);

            $menu = \DB::table('menus')->insert([ // this child developer menu

                'parent_id' => 1,
                'title' => 'Menu',
                'controller' => 'Backend\MenuController',
                'permalink' => 'menu',
                'order' => '1',
                'icon' => '',

            ]);



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menus');
    }
}
