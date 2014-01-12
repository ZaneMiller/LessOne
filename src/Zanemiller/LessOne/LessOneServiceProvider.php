<?php namespace Zanemiller\LessOne;

use Illuminate\Support\ServiceProvider;

class LessOneServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('zanemiller/less-one');
		$this->app['LessOne'] = $this->app->share(function($app)
			{
				return new LessOne($app['config'], $app['html']);
			});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('LessOne');
	}

}