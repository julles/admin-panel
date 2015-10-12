<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaLibraryConfiguration extends Model
{
    protected $table = 'media_library_configuration';

    public $guarded = [];

    public $rules = [
    	'image_thumbnail_width' => 'numeric',
    	'image_thumbnail_height' => 'numeric',
    ];
}
