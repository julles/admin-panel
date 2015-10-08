<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\User;
use App\Models\Role;
use Datatables;

class UserController extends Controller
{
    public $model;
    public $roles;

	public function __construct()
	{
		$this->model = new User;

		$this->roles =  ['' => ''] + Role::lists('role' , 'id')->toArray(); 
	}

    public function getIndex()
    {
    	return view('backend.user.index');
    }

    public function getData()
    {

    	$model = $this->model->join('roles' , 'users.role_id' , '=' , 'roles.id')
    	->select('users.id' , 'name' , 'email' ,  'firstname' , 'lastname' , 'roles.role');

    	return Datatables::of($model)
    	->addColumn('fullname' , function($model){
    		return $model->firstname." ".$model->lastname;
    	})
    	->addColumn('action' , function($model){
    		return Helper::buttons($model->id , $model->id , $model->id , ['true' , $model->id]);
    	})
    	->make(true);
    }

    public function getCreate()
    {
    	return view('backend.user.form' , [
    		'model' => $this->model,
    		'roles' => $this->roles,
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

		$this->model->create([

			'role_id' => $request->role_id,
			'email' => $request->email,
			'name' => $request->name,
			'password' => \Hash::make($request->password),
			'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'gender' => $request->gender,
			'address' => $request->address,
			'phone' => $request->phone,

		]);

		return redirect(Helper::urlAction('index'))->withMessage('Data has been saved!');
    }


    public function getUpdate($id)
    {
    	return view('backend.user.form' , [
    		'model' => $this->model->find($id),
    		'roles' => $this->roles,
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

		$this->model->find($id)->update([

			'role_id' => $request->role_id,
			'email' => $request->email,
			'name' => $request->name,
			'password' => \Hash::make($request->password),
			'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'gender' => $request->gender,
			'address' => $request->address,
			'phone' => $request->phone,

		]);

		return redirect(Helper::urlAction('index'))->withMessage('Data has been updated!');
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
}
