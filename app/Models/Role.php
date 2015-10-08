<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public $guarded = [];

    public function rules($id = "")
    {
    	if(!empty($id))
    	{

    		$rules = [
    			'role' => 'required|unique:roles,role,'.$id,
    		];

    	}else{

    		$rules = [
    			'role' => 'required|unique:roles',
    		];
    	}

    	return $rules;
    }
}
