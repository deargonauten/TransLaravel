<?php
/**
 * The Model trait for extending the default eloquent functionality.
 *
 * @package deArgonauten/TransLaravel
 * @subpackage Models
 * @author Jason de Ridder <mail@deargonauten.com>
 * @copyright Jason de Ridder
 * @license MIT
 */
namespace deArgonauten\TransLaravel\Models;


use deArgonauten\TransLaravel\TransLaravel;
use Illuminate\Support\Str;

/**
 * Slighly based on trait from spatie/laravel-translatable
 *
 * Class Translatations
 * @package deArgonauten\TransLaravel\models
 */
trait Translations
{

	/**
	 * When true there will be no translations made.
	 * @var bool
	 */
	protected $skipTranslation = false;

	/**
	 * @param string $key
	 * @return mixed
	 */
	public function getAttributeValue($key)
	{

		// Is it translatable?
		if (!$this->isTranslatableAttribute($key) || $this->skipTranslation)
			return $this->getOriginal($key);

		return $this->getTranslationFor($key);
	}

	/**
	 * Stop translating
	 */
	public function stopTranslating()
	{
		$this->skipTranslation = true;
	}

	/**
	 * Start translating again.
	 */
	public function startTranslating()
	{
		$this->skipTranslation = false;
	}

	/**
	 * Get a translataion
	 *
	 * @param $key
	 * @param string|null $locale
	 * @return string
	 */
	public function getTranslationFor(string $key, string $locale = null) : string
	{
		if(is_null($locale) && app('translator')->getActiveLanguage() == config('app.fallback_locale'))
			return $this->getOriginal($key);

		return app('translator')->model($this)->get($key, $locale);
	}


	/**
	 * Get all attributes that are translatable.
	 *
	 * @return array
	 */
	public function getTranslatableAttributes()
	{
		return (isset($this->translatable) && is_array($this->translatable)
				? $this->translatable
				: []);

	}

	/**
	 * Check if the current attribute is translatable
	 *
	 * @param string $key
	 * @return bool
	 */
	protected function isTranslatableAttribute(string $key) : bool
	{
		return in_array($key, $this->getTranslatableAttributes());
	}

	/**
	 * Make sure there we are not going to
	 *
	 * @param string $key
	 */
	protected function guardAgainstUntranslatableAttribute(string $key)
	{
		if (!$this->isTranslatableAttribute($key)) {
			throw AttributeIsNotTranslatable::make($key, $this);
		}
	}

	/**
	 * @return array
	 */
	public function getCasts() : array
	{
		return array_merge(
			parent::getCasts(),
			array_fill_keys($this->getTranslatableAttributes(), 'array')
		);
	}

}