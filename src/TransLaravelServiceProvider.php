<?php
/**
 * The ServiceProvider
 * @package deArgonauten/TransLaravel
 * @author Jason de Ridder <mail@deargonauten.com>
 * @copyright Jason de Ridder
 * @license MIT
 */
namespace deArgonauten\TransLaravel;

use Illuminate\Support\ServiceProvider;

/**
 * Class TransLaravelServiceProvider
 * @package deArgonauten\TransLaravel
 */
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

		require_once __DIR__ . '/helpers.php';

        $this->app->singleton('translator', function ($app) {
			$trans = new TransLaravel();
			$trans->setLocale(config('app.fallback_locale'));

            return $trans;
        });
    }

	/**
	 * The Boot method
	 */
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