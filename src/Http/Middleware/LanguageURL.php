<?php
/**
 * LanguageURL middleware. Used to make sure there is a locale prefix of the url
 * 
 * @package deArgonauten/TransLaravel
 * @subpackage Http/Middleware
 * @author Jason de Ridder <mail@deargonauten.com>
 * @copyright Jason de Ridder
 * @license MIT
 */
namespace deArgonauten\TransLaravel\Http\Middleware;

use deArgonauten\TransLaravel\TransLaravel;

/**
 * Class LanguageURL
 * @package deArgonauten\TransLaravel\Http\Middleware
 */
class LanguageURL
{

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, \Closure $next)
	{
		// Only do GET requests and pass thru if locale is set already in url
		if(!$request->isMethod('get') || config('app.locale') == $request->segment(1))
		{
			$request->session()->put('locale', $request->segment(1));
			$request->session()->save();
			return $next($request);
			exit;
		}

		$segments = $request->segments();
		if(count($segments) > 0
			&& app('translator')->isLocale($request->segment(1))
			&& app('translator')->localeToId($request->segment(1)) > 0)
		{
			// Other language
			\App::setLocale($request->segment(1));
			$request->session()->put('locale', $request->segment(1));
			$request->session()->save();

			return $next($request);
			exit;
		}


		$locale = app('translator')->sniffLanguage();
		$request->session()->put('locale', $locale);
		$request->session()->save();
		return redirect('/' . $locale, 303, ['Vary' => 'Accept-Language']);
		exit;
	}

}