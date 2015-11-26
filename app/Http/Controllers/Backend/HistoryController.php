<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\History;
use Datatables;
use Helper;
class HistoryController extends Controller
{
    public function __construct()
    {
    	$this->model = new History;
    }

    public function getIndex()
    {
    	return view('backend.history.index');
    }

    public function getData()
    {
    	return Datatables::of($this->model->orderBy('created_at' , 'desc')->select('id' , 'values','created_at'))
        
        ->addColumn('created_at' , function($model){

        	return date('d F Y H:i:s' , strtotime($model->created_at));
        })

    	->make(true);
    }
}
