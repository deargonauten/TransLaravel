<?php

namespace deArgonauten\TransLaravel;

use Illuminate\Support\ServiceProvider;

class TransLaravelServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

		$this->mergeConfigFrom(__DIR__.'/config/config.php', 'translaravel');

		$this->commands(['deArgonauten\TransLaravel\Commands\InstallTransLaravel']);

        $this->app->singleton('translator', function ($app) {
			$trans = new TransLaravel();
			$trans->setLocale(config('app.fallback_locale'));

            return $trans;
        });
    }

	public function boot()
	{
		// Views
		$this->loadViewsFrom(__DIR__.'/resources/views/', 'translaravel');

		// Publish config and views
		$this->publishes([
			__DIR__.'/resources/views' => base_path('resources/views/vendor/TransLaravel')
		]);
		$this->publishes([
			__DIR__.'/config/config.php' => config_path() . '/translaravel.php',
		]);

		// Routes
		if (! $this->app->routesAreCached()) {
			require __DIR__.'/Http/routes.php';
		}
	}

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['translator'];
    }
}