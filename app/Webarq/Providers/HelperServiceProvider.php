<?php namespace App\Webarq\Providers;

	use Illuminate\Support\ServiceProvider;
	use App\Webarq\Src\Helper;

	class HelperServiceProvider extends ServiceProvider
	{
		public function register()
		{
			return $this->app->bind('helper-service-provider' , function(){
				return new Helper;
			});
		}
	}