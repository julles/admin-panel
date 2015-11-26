<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\History;
class DefaultController extends Controller
{
	public function __construct()
	{
		$this->model = new History;
	}

    public function getIndex()
    {
    	$model = $this->model->orderBy('created_at' , 'desc')->limit(5)->get();

    	return view('backend.default' , compact('model'));
    }
}
