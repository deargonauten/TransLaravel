<?php
namespace deArgonauten\TransLaravel;

use deArgonauten\TransLaravel\Exceptions\LanguageException;
use deArgonauten\TransLaravel\Models\Languages;
use deArgonauten\TransLaravel\Translators\RouteTranslator;
use deArgonauten\TransLaravel\Translators\StringTranslator;
use deArgonauten\TransLaravel\Translators\ModelTranslator;
use Debugbar;

class TransLaravel
{

	private $locale;

    /**
     * Create a new TransLaravel Instance
     */
    public function __construct()
    {
        // constructor body
		return $this;

    }


	/**
	 * String translator to inherit the Laravels trans() method.
	 * Lacks the use of $domain.
	 *
	 * @param $key
	 * @param array $parameters
	 * @param string $domain
	 * @param null|str $locale
	 * @return string
	 */
	public function trans($key, array $parameters = [], $domain = 'messages', $locale = null) : string
	{

		if(count($parameters) > 0)
		{
			// Replace parameters
			foreach($parameters as $keyParam => $param)
			{
				if(is_string($keyParam))
					$key = str_replace(':' . $keyParam, $param, $key);
			}
		}

		if(app('translator')->getLocale() == config('app.fallback_locale'))
			return $key;


		return $this->string()->get($key, $locale);
	}

	public function get($key, array $parameters = [], $domain = 'messages', $locale = null)
	{
		return $this->trans($key, $parameters, $domain, $locale);
	}

	/**
	 * Get the active language in app.
	 *
	 * @return string
	 */
    public function getActiveLanguage() : string
    {
		return $this->getLocale();
        //return app()->getLocale();
    }

	/**
	 * Determine if string is a ISO639-1 locale
	 *
	 * @param string $string
	 * @return bool
	 */
	public function isLocale(string $string) : bool
	{
		return (in_array($string, array_keys(config('translaravel.iso639-1'))));
	}

	/**
	 * Try to figure the users language based on earlier visits
	 * http_accept_language and geo-ip check.
	 *
	 * @param bool $ipCheck
	 * @return string
	 */
	public static function sniffLanguage($ipCheck = false) : string
	{
		if(!is_null(session()->get('locale', null)))
			return app('translator')->parseLocale(session()->get('locale'));

		// Check for HTTP_ACCEPT heaer
		if(!is_null(\Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE'])))
			return app('translator')->parseLocale(\Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']));

		// Do IP check ?
		if($ipCheck) {
			$url = 'http://freegeoip.net/json/' . $_SERVER['REMOTE_ADDR'];
			$fs = fsockopen($url, 80, $errno, $errstr, config('translaravel.timeout_ip_check'));
			if ($fs) {
				stream_set_timeout($fs, config('translaravel.timeout_ip_check'));
				$info = stream_get_meta_data($fs);
				$data = '';
				while ((!feof($fs)) && (!$info['timed_out']))
				{
					$data .= fgets($fs);
                	$info = stream_get_meta_data($fs);
					flush();
				}

				if(!$info['timed_out'])
				{
					$ipInfo = collect($data)->toArray();
					if(isset($ipInfo['country_code']))
						return app('translator')->parseLocale($ipInfo['country_code']);

				}

			}
		} // End ip check

		// Nothing available do default
		return app('translator')->parseLocale(config('app.fallback_locale'));
	}

	/**
	 * Set the active language in app.
	 *
	 * @param string $locale
	 * @return TransLaravel
	 */
	public function setActiveLanguage(string $locale) : self
	{
		$t = $this->parseLocale($locale);
		app()->setLocale($t);

		// Set in session as well
		request()->session()->set('locale', $this->parseLocale($locale));

		return $this;
	}

	/**
	 * Set the current locale
	 *
	 * @param $locale
	 */
	public function setLocale($locale)
	{
		// Set in session as well
		//request()->session()->set('locale', $this->parseLocale($locale));

		$this->locale = $locale;
	}

	/**
	 * Get the current locale.
	 *
	 * @param $locale
	 * @return string
	 */
	public function getLocale()
	{
		return $this->locale;
	}

	/**
	 * Returns a list of available locales.
	 * Default only the active ones.
	 *
	 * @param bool $getInactive
	 * @return array
	 */
	public function getLocales(bool $getInactive = false) : array
	{
		$languageModel = Languages::class;
		if($getInactive)
			$models = $languageModel->all();
		else
			$models = $languageModel->whereActive(1)->get();

		// Add app locale
		$locales = Collection::make($models->toArray())->pluck('abbreviation');
		$locales->push(config('app.fallback_locale'));
		// Make sure it is unique
		$locales->unique();

		return $locales->toArray();
	}

	/**
	 * Returns a clean useable two-letter locale.
	 * Default do a ISO 639-1 check, throws an exception while error.
	 *
	 * @throws LanguageException
	 * @param string $locale
	 * @param bool $iso6391Check
	 * @return string
	 */
	private function parseLocale(string $locale, bool $iso6391Check = true) : string
	{
		$l = strtolower(\Locale::getPrimaryLanguage($locale));
		if(!config('translaravel.iso639-1.' . $l, false))
			throw new LanguageException("Locale $locale ($l) is not ISO 639-1 valid.");

		return $l;
	}

	/**
	 * Checks if a given locale exists in database.
	 *
	 * @param string $locale
	 * @param bool $getInactive
	 * @return bool
	 */
	public function localeExists(string $locale, bool $getInactive = false) : bool
	{
		$locales = $this->getLocales($getInactive);

		return (in_array($this->parseLocale($locale), $locales));

	}

	/**
	 * Returns the corresponding ID from database or null if locale doesn't exists.
	 *
	 * @param string $locale
	 * @return integer|null
	 */
	public function localeToId(string $locale)
	{
		if($locale == config('app.fallback_locale'))
			return 0;

		return Languages::whereAbbreviation($this->parseLocale($locale))->first()->id;
	}

	/**
	 * Returns a translated route.
	 *
	 * @param String $route
	 * @return String
	 */
	public static function route(string $route, $locale = null)
	{
		if(!\Lang::isLocale(request()->segment(1)))
			return $route;
		$locale = request()->segment(1);
		if($locale == config('app.fallback_locale')) {
			return $route;
		}

		$routeTranslation = new RouteTranslator($locale);
		return $routeTranslation->get($route, $locale);

	}

	public static function url(string $url, $locale = null)
	{
		
	}

	/**
	 * Returns a new RouteTranslator instance
	 *
	 * @return RouteTranslator
	 */
	public static function routeTranslator($locale)
	{
		return RouteTranslator($locale);
	}



	/**
	 * Returns a StringTranslator object.
	 *
	 * @return StringTranslator
	 */
	public static function string()
	{
		return new StringTranslator(app('translator')->getLocale());
	}

	/**
	 * Adds a language to the database.
	 *
	 * @param string $locale
	 * @param array $parameters
	 * @param bool $doISO6391Check
	 * @return bool
	 */
	public function addLanguage(string $locale, array $parameters = [], bool $doISO6391Check = true)
	{
		$locale = $this->parseLocale($locale, $doISO6391Check);
		$languageInfo = [
			'abbreviation' => $locale,
			'native' => '',
			'english'	=> '',
			'active' => 1
		];

		if($doISO6391Check)
		{
			$info = $this->getISO6391Information($locale);
			$languageInfo['native'] = $info['native'];
			$languageInfo['english'] = $info['english'];
		}
		else {
			if(!isset($parameters['native']) || !isset($parameters['local']))
				throw new LanguageException('You need to add the local and/or native parameter when manually adding a language.');

			$languageInfo['native'] = $parameters['native'];
			$languageInfo['english'] = $parameters['english'];
		}

		return Languages::create($languageInfo)->save();


	}

	/**
	 * Load ISO 639-1 language information from a locale.
	 *
	 * @param string $locale
	 * @return array
	 */
	public function getISO6391Information(string $locale)
	{
		return config('translaravel.iso639-1.' . $this->parseLocale($locale));
	}

	/**
	 * Returns a ModelTranslator object.
	 * 
	 * @param object $model
	 * @return ModelTranslator
	 */
	public static function model( $model)
	{
		return new ModelTranslator(app('translator')->getActiveLanguage(), $model);
	}

}
