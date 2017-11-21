<?php

namespace Nhh\Logger\Providers;

use Illuminate\Support\ServiceProvider;
use Nhh\Logger\Facades\Logger;
use Nhh\Logger\Manager;

class LumenServiceProvider extends ServiceProvider
{
	public function boot()
	{	
		$this->app->configure('logger');
        $path = realpath(__DIR__.'/../../config/config.php');
        $this->mergeConfigFrom($path, 'logger');
	}



	public function register()
	{
		$this->registerAliases();
		$this->registerManager();
	}




	protected function registerAliases()
	{
		$this->app->alias('nhh.logger', Manager::class);
	}


	protected function registerManager()
	{
		$this->app->singleton('nhh.logger', function ($app) {
            return new Manager;
	}
}