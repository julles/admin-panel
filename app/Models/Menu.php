<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   protected $table = 'menus';

   public $guarded = [];

   public function rules($id="" , $varController = "" , $varPermalink = "")
   {	
   		if(!empty($id))
   		{
   		
         	$controller = 'required|unique:menus,controller,'.$id;
   			$permalink = 'required|unique:menus,permalink,'.$id;
   		
         }else{
   		    
            $varController == '#' ? $controller = 'required' : $controller = 'required|unique:menus';
            $varPermalink == '#' ? $permalink = 'required' : $permalink = 'required|unique:menus';   
         	
         }
   		

   		return [
   			'title' => 'required',
   			'controller' => $controller , 
   			'permalink' => $permalink,
   			'order' => 'required|numeric',
   		];
   }

   public function messages()
   {

   }
}
