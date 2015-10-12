<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DocumentLibraryControlelr extends Controller
{
    public function getIndex()
    {
    	return view('backend.document_library.index');
    }
}
