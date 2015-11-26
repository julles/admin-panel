<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
    	$this->id = Auth::user()->id; 
    	$this->model = User::find($this->id);
    }

    public function getIndex()
    {
    	$model = $this->model;
    	$roles = Helper::injectModel('Role')->lists('role' , 'id');
    	return view('backend.profile.form', compact('model' , 'roles'));
    }

    public function postIndex(Request $request)
    {
    	$titleAction = 'Update Profile';

    	$inputs = $request->all();
    	
    	$id = $this->id;
		
    	$userValidation = new \App\Models\User;

		$validation = \Validator::make($inputs , $userValidation->rules($id));

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInfo('something error')->withInput();
		}

		$values = [

			'role_id' => $request->role_id,
			'email' => $request->email,
			'name' => $request->name,
			'password' => \Hash::make($request->password),
			'firstname' => $request->firstname,
			'lastname' => $request->lastname,
			'gender' => $request->gender,
			'address' => $request->address,
			'phone' => $request->phone,

		];

		$this->model->find($id)->update($values);

		Helper::history('Update His Profile' , '' , $values);

		return redirect(Helper::urlAction('index'))->withMessage('Data has been updated!');
    }
}
