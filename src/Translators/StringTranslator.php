<?php
/**
 * The StringTranslator object.
 * @package deArgonauten/TransLaravel
 * @subpackage Translators
 * @author Jason de Ridder <mail@deargonauten.com>
 * @copyright Jason de Ridder
 * @license MIT
 */
namespace deArgonauten\TransLaravel\Translators;
use deArgonauten\TransLaravel\Models\StringTranslations;
use deArgonauten\TransLaravel\TransLaravel;

/**
 * Class StringTranslator
 * @package deArgonauten\TransLaravel\Translators
 */
class StringTranslator
{

	/**
	 * @var string
	 */
	private $locale;
	/**
	 * @var int
	 */
	private $language_id;

	public function __construct(string $locale = null)
	{
		$this->locale 		= app('translator')->getLocale();
		$this->language_id  = app('translator')->localeToId($this->locale);
	}

	/**
	 * Get a translation
	 *
	 * @param string $key
	 * @param string|null $locale
	 * @return bool
	 */
	public function get(string $key, string $locale = null)
	{
		$locale 		= $locale || $this->locale;
		$language_id 	= ($locale == $this->locale ? $this->language_id : TransLaravel::class()->localeToId($locale));

		// Create a record if not exists
		if(!$this->has($key, $locale) && $language_id > 0)
			$this->set($key, $key, $locale);

		$q = StringTranslations::whereSearchKey(md5($key))->whereLanguageId($language_id)->first();
		return (is_null($q) ? $key : $q->value);

	}

	/**
	 * Set a translation
	 *
	 * @param string $key
	 * @param string $value
	 * @param string|null $locale
	 * @return mixed
	 */
	public function set(string $key, string $value, string $locale = null)
	{
		$locale = $locale || $this->locale;
		$language_id 	= ($locale == $this->locale ? $this->language_id : TransLaravel::class()->localeToId($locale));

		$q = StringTranslations::firstOrCreate([
			'search_key' => md5($key),
			'language_id' => $language_id
		]);
		$q->key 	= $key;
		$q->value 	= $value;
		return $q->save();


	}

	/**
	 * Removes a translation
	 *
	 * @param string $key
	 * @param string|null $locale
	 */
	private function remove(string $key, string $locale = null)
	{
		$locale = $locale || $this->locale;
		$language_id 	= ($locale == $this->locale ? $this->language_id : TransLaravel::class()->localeToId($locale));

		StringTranslations::whereSearchKey(md5($key))->whereLanguageId($language_id)->first()->delete();



	}

	/**
	 * Does translation exists?
	 *
	 * @param string $key
	 * @param string|null $locale
	 * @return bool
	 */
	public function has(string $key, string $locale = null)
	{
		$locale = $locale || $this->locale;
		$language_id 	= ($locale == $this->locale ? $this->language_id : TransLaravel::class()->localeToId($locale));

		return (StringTranslations::whereSearchKey(md5($key))->whereLanguageId($language_id)->count() > 0);

	}

	/**
	 * Get available languages for a translation
	 *
	 * @param string $key
	 * @return array
	 */
	public function availableTranslations(string $key)
	{
		return collect(
			Languages::whereIn('id',
				collect(StringTranslations::whereSearchKey(md5($key)))
					->pluck('language_id')
					->toArray())
		)->pluck('abbreviation')->toArray();
	}

}