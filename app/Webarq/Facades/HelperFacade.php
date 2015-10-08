<?php namespace App\Webarq\Facades;


	use Illuminate\Support\Facades\Facade;


	class HelperFacade extends Facade
	{
		protected static function getFacadeAccessor()
		{
			return 'helper-service-provider';
		}
	}