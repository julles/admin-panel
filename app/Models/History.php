<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';

    public $guarded = [];

    public function menu()
    {
    	return $this->belongsTo('App\Models\Menu','menu_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User','user_id');
    }
}
