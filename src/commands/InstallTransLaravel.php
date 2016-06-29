<?php
namespace deArgonauten\TransLaravel\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InstallTransLaravel extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'translaravel:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Install the TransLaravel package';


	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		// Add the TransLaravel service provider
		$this->info('Publishing assets...');
		$this->info(\Artisan::call('vendor:publish'));//, ['--provider' => 'deArgonauten/TransLaravel\TransLaravelServiceProvider', '--force' => true]);
		$this->info('Done!');
		
		// Do the migrations
		$this->info('Migrating translations...');
		$this->info(\Artisan::call('migrate', ['--path' => 'vendor/deArgonauten/TransLaravel/src/migrations', '--force' => true]));
		$this->info('Done!');


		$fallback_locale = config('app.fallback_locale');
		$locale = config('app.locale');

		if(!$this->confirm('Is ' . $fallback_locale . ' the correct fallback locale? [y|N]'))
		{
			$this->info('Please correct the config in config/app.php.');
			if(!$this->confirm('Did you correct te locale? [y|N]'))
			{
				$this->info('Quite stubborn, eh? We will proceed.');
			}
		}

			// Install middleware.
			$this->addServiceProvider();

		if($this->confirm('Do you want to have your routes translated? [y|N]'))
		{
			// Install middleware.
			$this->addMiddleware();
		}

		$this->info('All done!');
	}

	private function addMiddleware()
	{
		$kernel = file_get_contents(getcwd() . '/app/Http/Kernel.php');

		if(strstr($kernel, "'language' => \\deArgonauten\\TransLaravel\\Http\\Middleware\\LanguageURL::class,")) {
			$this->warn("Middleware is already installed.");
			return;
		}

		$regex = '/protected \$routeMiddleware[\S|\s]*\[([\S|\s]*)^[\s]*\]\;$/m';
		$return = preg_replace($regex, "protected \$routeMiddleWare = [\n\t$1\t\t'language' => \\deArgonauten\\TransLaravel\\Http\\Middleware\\LanguageURL::class,\n\t];", $kernel);
		
		file_put_contents(getcwd() . '/app/Http/Kernel.php', $return);
	}

	private function addServiceProvider()
	{
		$kernel = file_get_contents(getcwd() . '/config/app.php');

		if(strstr($kernel, "//Illuminate\\Translation\\TranslationServiceProvider::class,")) {
			$this->warn("ServiceProvider is already installed. Maybe another package is taking over the functionality?");
			return;
		}

		$search = 'Illuminate\\Translation\\TranslationServiceProvider::class,';
		$replace = '//' . $search;
		$return = str_replace($search, $replace, $kernel);

		file_put_contents(getcwd() . '/config/app.php', $return);
	}
}