<?php
/**
 * Helper functions
 *
 * @package deArgonauten/TransLaravel
 * @author Jason de Ridder <mail@deargonauten.com>
 * @copyright Jason de Ridder
 * @license MIT
 */
use deArgonauten\TransLaravel\Models\Languages;
use deArgonauten\TransLaravel\TransLaravel;

if( ! function_exists( 'translateURL' ) )
{

	/**
	 * Return a translated url
	 *
	 * @param string $url
	 * @param string|null $locale
	 * @return string
	 */
	function translateURL($url, $locale = null)
	{
		$t = app('translator') ?: new TransLaravel();
		$locale = $locale ?: $t->getActiveLanguage() ?: \App::getLocale();

		// Parse url
		$arrURL = parse_url($url);
		$segments = explode('/', $arrURL['path']);

		if($t->isLocale($segments[0]))
			array_shift($segments);
		if(array_last($segments) == '')
			array_pop($segments);

		$path = implode('/', $segments);

		$returnURL = '';
		$returnURL .= isset($arrURL['scheme']) ? $arrURL['scheme'] . '://' : '';
		$returnURL .= isset($arrURL['host']) ? $arrURL['host'] : '';
		$returnURL .= isset($arrURL['port']) && $arrURL['port'] != 80 ? ':' . $arrURL['port'] : '';
		$returnURL .= '/' . $locale . '/' . $t->route($path, $locale);
		$returnURL .= isset($arrURL['query']) ? '?' . $arrURL['query'] : '';
		$returnURL .= isset($arrURL['fragment']) ? '#' . $arrURL['fragment'] : '';

		return str_replace('//', '/', $returnURL);
	}
}

if ( ! function_exists('untranslateURL'))
{
	/**
	 * Return an url in the default locale
	 *
	 * @param $url
	 * @return string
	 */
	function untranslateURL($url)
	{
		$t = app('translator') ?: new TransLaravel();

		// Parse url
		$arrURL = parse_url($url);
		$segments = explode('/', $arrURL['path']);

		if($t->isLocale($segments[0]))
			array_shift($segments);
		if(array_last($segments) == '')
			array_pop($segments);

		$path = implode('/', $segments);
		$newPath = Languages::whereValue($path);
		if($newPath->count() == 0)
			$newPath = $path; // Return given path
		else
			$newPath = $newPath->first()->route;

		$returnURL = '';
		$returnURL .= isset($arrURL['scheme']) ? $arrURL['scheme'] . '://' : '';
		$returnURL .= isset($arrURL['host']) ? $arrURL['host'] : '';
		$returnURL .= isset($arrURL['port']) && $arrURL['port'] != 80 ? ':' . $arrURL['port'] : '';
		$returnURL .= '/' . config('app.fallback_language') . '/' . $newPath;
		$returnURL .= isset($arrURL['query']) ? '?' . $arrURL['query'] : '';
		$returnURL .= isset($arrURL['fragment']) ? '#' . $arrURL['fragment'] : '';

		return str_replace('//', '/', $returnURL);
	}
}

if (! function_exists('translateLink') )
{
	function translateLink($url, $name, $parameters = [], $locale = null)
	{
		$extra_list = '';
		foreach ($parameters as $k => $v)
		{
			$extra_list .= " $k=" . '"'. (is_array($v) ? implode(' ', $v) : $v) . '"';
		}

		return '<a href="'.translateURL($url, $locale) .'"'. $extra_list .'>' . Lang::get($name) . '</a>';

	}
}