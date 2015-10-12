<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('404', function () {
    echo '<h2>Error Not Found 404</h2>';
});



// start route backend
	

	Route::get('backend-500', function () {
    	echo '<h2>you are not authorized to view this page</h2>';
	});

	Route::controller('login' , 'Backend\LoginController');
	Route::get('logout' , function(){

		\Auth::logout();
		return redirect('login');

	});

	Route::group(['prefix' => \Helper::backendName() , 'middleware' => ['auth' , 'right'] ] , function(){ 		// grouping route backend

		Route::get('/' , 'Backend\DefaultController@getIndex'); 	// creating Default Page in backend
 		
		Route::get('getElfinder' , function(){

			return view('backend.getElfinder.index');

		});

		$menu = \Helper::injectModel('Menu'); 	// instantiate Menu Model

		foreach($menu->where('controller' , '!=' , '#')->get() as $row)		 // fetching data from menu
		{
			Route::controller($row->permalink , $row->controller);
		}

	});

//end route backend
