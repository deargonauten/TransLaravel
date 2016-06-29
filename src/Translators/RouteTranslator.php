<?php
namespace deArgonauten\TransLaravel\Translators;

use deArgonauten\TransLaravel\Models\RouteTranslations;
use deArgonauten\TransLaravel\TransLaravel;

class RouteTranslator
{
	private $locale;
	private $language_id;

	public function __construct(string $locale = null)
	{
		$this->locale 		= !is_null($locale) ? $locale : app('translator')->getActiveLanguage();
		$this->language_id  = app('translator')->localeToId($this->locale);
	}

	/**
	 * Get a route translation
	 *
	 * @param string $route
	 * @param string|null $locale
	 * @return bool
	 */
	public function get(string $route, string $locale = null)
	{
		$locale 		= $locale || $this->locale;
		$language_id 	= ($locale == $this->locale
							? $this->language_id
							: TransLaravel::class()->localeToId($locale));

		if(!$this->has($route, $locale))
			$this->set($route, $route, $locale);

		$q = RouteTranslations::whereRoute($route)->whereLanguageId($language_id)->first()->value;
		return (is_null($q) ? $route : $q);

	}

	/**
	 * Set a route translation value
	 *
	 * @param string $route
	 * @param string $value
	 * @param string|null $locale
	 * @return mixed
	 */
	public function set(string $route, string $value, string $locale = null)
	{
		$locale = $locale || $this->locale;
		$language_id 	= ($locale == $this->locale ? $this->language_id : TransLaravel::class()->localeToId($locale));

		$q = RouteTranslations::firstOrCreate([
			'route' => $route,
			'language_id' => $language_id
		]);
		$q->value 	= $value;
		return $q->save();


	}

	/**
	 * Remove a route translation
	 *
	 * @param string $route
	 * @param string|null $locale
	 */
	private function remove(string $route, string $locale = null)
	{
		$locale = $locale || $this->locale;
		$language_id 	= ($locale == $this->locale ? $this->language_id : TransLaravel::class()->localeToId($locale));

		RouteTranslations::whereRoute($route)->whereLanguageId($language_id)->first()->delete();



	}

	/**
	 * Check if there is a route translation
	 *
	 * @param string $route
	 * @param string|null $locale
	 * @return bool
	 */
	public function has(string $route, string $locale = null)
	{
		$locale = $locale || $this->locale;
		$language_id 	= ($locale == $this->locale ? $this->language_id : app('translator')->localeToId($locale));

		return (RouteTranslations::whereRoute($route)->whereLanguageId($language_id)->count() > 0);

	}

	/**
	 * Get available languages for a certain route
	 *
	 * @param string $route
	 * @return array
	 */
	public function availableTranslations(string $route)
	{
		return collect(
			Languages::whereIn('id',
				collect(RouteTranslations::whereRoute($route))
					->pluck('language_id')
					->toArray())
		)->pluck('abbreviation')->toArray();
	}
}