<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\Menu;
use App\Models\Action;
use App\Models\MenuAction;
class MenuController extends Controller
{
	public $model;
	public $parents;
    public $modelAction;
    public $modelMenuAction;

	public function __construct()
	{
		$this->model = new Menu;
		$this->parents = ['0' => 'This Parent']  + $this->model->whereParentId(0)->lists('title' , 'id')->toArray();
        $this->modelAction = new Action;
        $this->modelMenuAction = new MenuAction;
	}

    public function getIndex()
    {

    	return view('backend.menu.index' , [
    		'model' => $this->model,
    	]);
    }

    public function getCreate()
    {
    	return view('backend.menu.form' , [
    		'model' => $this->model,
    		'parents' => $this->parents,
    	]); 
    }

    public function postCreate(Request $request)
    {
    	$inputs = $request->all();

    	$validation = \Validator::make($inputs , $this->model->rules("",$request->controller , $request->permalink));

    	if($validation->fails()) // validation if fails
    	{
    		return redirect()->back()->withErrors($validation)->withInput();
    	}

    	// creating controller
    		
    		if($request->controller != '#')
    		{
    			$path = str_replace('\\', '/', $request->controller);
	    		
	    		\Artisan::call('make:controller' , [
	    		
	    			'--plain' => true , 
	    			'name' => $path,
	    		
	    		]);
    		}
	    		

    	//
    	
    	// inserting data to database
    		
    		$this->model->create($inputs);
    		
    	// 
    	
    	return redirect(Helper::urlAction('index' , 'no'))->withMessage('Data has been saved');

    }

    public function getUpdate($id)
    {
    	return view('backend.menu.form' , [
    		'model' => $this->model->find($id),
    		'parents' => $this->parents,
    	]); 
    }

    public function postUpdate(Request $request , $id)
    {
    	$model = $this->model->find($id);

    	$inputs = $request->all();

    	$validation = \Validator::make($inputs , $this->model->rules($id,$request->controller , $request->permalink));

    	if($validation->fails()) // validation if fails
    	{
    		return redirect()->back()->withErrors($validation)->withInput();
    	}

    	if($request->controller != $model->controller) // jika request controller dan isi record controller beda
    	{
	    	// creating and deleting controller controller
	    		
	    		if($request->controller != '#')
	    		{

	    			// delete
	    				$path = str_replace('\\', '/', $model->controller).".php";	 		// getting path of controller
	    				@unlink(app_path().'/Http/Controllers/'.$path);		 // delete controller file
	    			// 

	    			// create
	    			$path = str_replace('\\', '/', $request->controller);
		    		
		    		\Artisan::call('make:controller' , [
		    		
		    			'--plain' => true , 
		    			'name' => $path,
		    		
		    		]);
		    		//
	    		}
		    		

	    	//
	    }
    	
    	// inserting data to database
    		
    		$model->update($inputs);
    		
    	// 
    	
    	return redirect(Helper::urlAction('index' , 'no'))->withMessage('Data has been updated');

    }

    public function getDelete($id)
    {
    	try
    	{
    		$model = $this->model->find($id); // selecting menus where id = $id
    		
    		if($model->parent_id == 0) // if parent_id equals 0
    		{
    			$modelChild = $this->model->whereParentId($model->id);

    			foreach($modelChild->get() as $row)
    			{
					$path = str_replace('\\', '/', $row->controller).".php";	 		// getting path of controller
    				@unlink(app_path().'/Http/Controllers/'.$path);		 // delete controller file

    			}

    			$modelChild->delete();

    			$path = str_replace('\\', '/', $model->controller).".php";	 		// getting path of controller
    			@unlink(app_path().'/Http/Controllers/'.$path);		 // delete controller file

    			$model->delete();

    		}else{ 

    			$path = str_replace('\\', '/', $model->controller).".php";	 		// getting path of controller
    			
    			@unlink(app_path().'/Http/Controllers/'.$path);		 // delete controller file

    			$model->delete();
    		}

    		return redirect()->back()->withMessage('Data has been Deleted');

    	}catch(\Exception $e){
    		return redirect('404');
    	}
    }

    public function getView($id)
    {
        return view('backend.menu.view' , [
            'modelAction' => $this->modelAction,
            'model' => $this->model->find($id),
            'modelMenuAction' => $this->modelMenuAction,
        ]);
    }

    public function getInsertmenuaction()
    {
        $menuId = \Input::get('menu_id');
        $actionId = \Input::get('action_id');
        $check = \Input::get('check');
        $model = $this->modelMenuAction;

        if($check == 'insert')
        {
            $model->menu_id = $menuId;
            $model->action_id = $actionId;
            $model->save();
        }else{
            $model->whereActionId($actionId)->whereMenuId($menuId)->delete();
        }
            
    }
}
