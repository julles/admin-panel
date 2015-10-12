<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoLibraryController extends Controller
{
    public function getIndex()
    {
    	return view('backend.video_library.index');
    }
}
