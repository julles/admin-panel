<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\MediaLibraryConfiguration;

class MediaLibraryConfigurationController extends Controller
{
    public $model;

    public function __construct()
    {
    	$this->model = new MediaLibraryConfiguration;
    }

    public function getIndex()
    {
    	$model = $this->model->find(1);

    	return view('backend.media_library_configuration.form' , compact('model'));
    }

    public function postIndex(Request $request)
    {
    	$validation = \Validator::make($request->all() , $this->model->rules);

    	if($validation->fails())
    	{
    		return redirect()->back()->withErrors($validation)->withInput();
    	}

    	$this->model->find(1)->update($request->all());

    	return redirect()->back()->withMessage('Data has been updated');
    }
}
