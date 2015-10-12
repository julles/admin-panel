<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaLibraryConfiguration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_library_configuration', function (Blueprint $table) {
        
            $table->increments('id');
            
            $table->integer("image_thumbnail_width");

            $table->integer("image_thumbnail_height");

            $table->string("allowed_image_extension");

            $table->string("allowed_video_extension");

            $table->string("allowed_document_extension");

            $table->timestamps();
        
            //\DB::table('media_library_configuration')->truncate();

            //\DB::table('media_library_configuration')->insert(['id' => 1]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media_library_configuration');
    }
}
