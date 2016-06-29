<?php
namespace deArgonauten\TransLaravel\Http\Middleware;

use deArgonauten\TransLaravel\TransLaravel;

class URLTranslator
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
		$t = app('translator');
		$params = explode('/', $request->path());
		$urlLocale = array_shift($params);
		$pathWithoutLocale = implode('/', $params);

		$t->route();
	}

}