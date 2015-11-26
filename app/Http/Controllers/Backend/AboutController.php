<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\About;
use Helper;
class AboutController extends Controller
{
	public $model;

	public function __construct()
	{
		$this->model = new About;
	}    

	public function getIndex()
	{
		$model = $this->model->find(1);
		return view('backend.about.form' , compact('model'));
	}

	public function postIndex(Request $request)
	{
		$inputs = $request->all();

		$validation = \Validator::make($inputs , $this->model->rules);

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput();
		}

		$this->model->find(1)->update($inputs);
		Helper::history('Update' , '' , $inputs);
		return redirect()->back()->withMessage('Data has been updated');
	}
}
