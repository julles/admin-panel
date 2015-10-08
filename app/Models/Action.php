<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions';

    public $guarded = [];

    public function rules($id = "")
    {
    	if(!empty($id))
    	{
    		$action = 'required|unique:actions,action,'.$id;
    	}else{
    		$action = 'required|unique:actions';
    	}

    	return [
    		'action' => $action , 
    		'title' => 'required'
    	];
    }
}
