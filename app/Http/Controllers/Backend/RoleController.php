<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Helper;
use Input;
use App\Models\Role;
use App\Models\Right;

use Datatables;

class RoleController extends Controller
{
	public $model;
    public $right;
	public function __construct()
	{
		$this->model = new Role;
        $this->right = new Right;
	}

    public function getIndex()
    {
    	return view('backend.role.index');
    }

    public function getData()
    {
    	return Datatables::of($this->model->select('id' , 'role'))
    	->addColumn('action' , function($model){
    		return Helper::buttons($model->id , $model->id , $model->id , ['true' , $model->id]);
    	})
    	->make(true);
    }

    public function getCreate()
    {
    	return view('backend.role.form' , [
    		'model' => $this->model,
    	]);
    }

    public function postCreate(Request $request)
    {
    	$inputs = $request->all();

		$validation = \Validator::make($inputs , $this->model->rules());

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput();
		}

		$this->model->create($inputs);

		return redirect(Helper::urlAction('index'))->withMessage('Data has been saved!');
    }

    public function getUpdate($id)
	{
		return view('backend.role.form' , [
				'model' => $this->model->find($id),
		]);
	}


	public function postUpdate(Request $request , $id)
    {
    	$inputs = $request->all();

		$validation = \Validator::make($inputs , $this->model->rules($id));

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput();
		}

		Role::find($id)->update($inputs);

		return redirect(Helper::urlAction('index'))->withMessage('Data has been Updated');
    }

    public function getDelete($id)
    {
    	try
    	{
    		$model = $this->model->find($id);
    		$model->delete();
    		return redirect()->back()->withMessage('Data has been deleted');
    	}catch(\Exception $e){
    		return redirect()->back()->withInfo('Data can not be deleted');
    	}
    }

    public function getView($id)
    {
        $model = $this->model->find($id);

        return view('backend.role.view' , [
            'model' => $model , 
            'right' => $this->right,
            'countUser' => \Helper::injectModel('User')->whereRoleId($model->id)->count(),
            'menu' => Helper::injectModel('menu'),
            'menuAction' => Helper::injectModel('MenuAction'),
        ]);
    }

    public function getInsertrights()
    {
        $cek = Input::get('check');
        $roleId = Input::get('role_id');
        $menuId = Input::get('menu_id');
        $actionId = Input::get('action_id');

        if($cek == 'insert')
        {
            $this->right->role_id = $roleId;
            $this->right->menu_id = $menuId;
            $this->right->action_id = $actionId;
            $this->right->save();
        
        }elseif($cek == 'delete'){

            $this->right->whereRoleId($roleId)->whereMenuId($menuId)->whereActionId($actionId)->delete();
        }else{
            echo 'false';
        } 
    }

    public function getInsertrighteach()
    {
        $cek = Input::get('check');
        $parentId = Input::get('parent_id');
        $roleId = Input::get('role_id');
        
        $model = Helper::injectModel('Menu');
        $menuAction = Helper::injectModel('MenuAction'); 

        if($cek == 'insert')
        {
            
            foreach($model->whereParentId($parentId)->get() as $row)
            {
                $this->right->whereRoleId($roleId)->whereMenuId($row->id)->delete();

                foreach($menuAction->whereMenuId($row->id)->get() as $rowMenuAction)
                {
                    $actionId =  $rowMenuAction->action_id;

                    $this->right->create([
                        'role_id' => $roleId,
                        'menu_id' => $row->id,
                        'action_id' => $actionId,
                    ]);
                }
            }
        }elseif($cek ==  'delete'){
            
            foreach($model->whereParentId($parentId)->get() as $row)
            {
                $this->right->whereRoleId($roleId)->whereMenuId($row->id)->delete();
            }


        }else{
            echo 'error!';
        }

    }
}
