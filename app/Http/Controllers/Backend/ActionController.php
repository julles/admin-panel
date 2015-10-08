<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Action;
use Datatables;
use Helper;

class ActionController extends Controller
{
	public $model;

	public function __construct()
	{
		$this->model = new Action;
	}

	public function getIndex()
	{
		return view('backend.action.index');
	}

	public function getData()
	{
		$helper = new Helper;

		return Datatables::of($this->model->select('id' , 'action' , 'title'))
		->addColumn('option' , function($model){

			return Helper::buttonUpdate($model->id).Helper::buttonDelete($model->id);

		})
		->setRowData([
                'id' => 'test',
            ])
		->make(true);
	}

	public function getCreate()
	{
		return view('backend.action.form' , [
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
		return view('backend.action.form' , [
			'model' => $this->model->find($id),
		]);
	}

	public function postUpdate(Request $request , $id)
	{
		$model = $this->model->find($id);

		$inputs = $request->all();

		$validation = \Validator::make($inputs , $this->model->rules($id));

		if($validation->fails())
		{
			return redirect()->back()->withErrors($validation)->withInput();
		}

		$model->update($inputs);

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

			return redirect()->back()->withMessage('Data Cannot Be Deleted');

		}
	}    
}
