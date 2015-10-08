<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    protected $table = 'rights';

    public $guarded = [];

   	public function action()
   	{
   		return $this->belongsTo('App\Models\Action' , 'action_id');
   	}

   	public function menu()
   	{
   		return $this->belongsTo('App\Models\Menu' , 'menu_id');
   	}
}
