<?php
/**
 * The ModelTranslator
 *
 * @package deArgonauten/TransLaravel
 * @subpackage Translators
 * @author Jason de Ridder <mail@deargonauten.com>
 * @copyright Jason de Ridder
 * @license MIT
 */
namespace deArgonauten\TransLaravel\Translators;


use deArgonauten\TransLaravel\Exceptions\LanguageException;
use deArgonauten\TransLaravel\Models\ModelTranslations;
use deArgonauten\TransLaravel\TransLaravel;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelTranslator
 * @package deArgonauten\TransLaravel\Translators
 */
class ModelTranslator
{
	/**
	 * @var Model
	 */
	private $model;
	/**
	 * @var string
	 */
	private $locale;
	/**
	 * @var integer
	 */
	private $language_id;

	/**
	 * ModelTranslator constructor.
	 * @param $locale
	 * @param $model
	 */
	public function __construct($locale, $model)
	{
		$this->setLocale($locale);
		$this->setModel($model);
		$this->getLanguageId();
	}

	/**
	 * Get a translations for a model
	 * @param string $attribute
	 * @param string|null $locale
	 * @return string
	 */
	public function get($attribute, $locale = null)
	{
		$language_id = $this->getLanguageId();
		if(!is_null($locale))
			$language_id = app('translator')->localeToId($locale);

		if($language_id < 0)
			return $this->getDefaultValueFor($attribute);

		if(!$this->has($attribute, $locale))
			$this->set($attribute, $this->getDefaultValueFor($attribute), $locale);

		// Create search key
		$searchValue = $this->getSearchKeyFor($attribute);

		return ModelTranslations::whereSearchValue($searchValue)
				->whereLanguageId($language_id)
				->first()->value;
	}

	/**
	 * Check if an attribute has a translation
	 * @param string $attribute
	 * @param string|null $locale
	 * @return bool
	 */
	public function has($attribute, $locale = null)
	{
		$language_id = $this->getLanguageId();
		if(!is_null($locale))
			$language_id = app('translator')->localeToId($locale);

		// Create search key
		$searchValue = $this->getSearchKeyFor($attribute);

		return (ModelTranslations::whereSearchValue($searchValue)
					->whereLanguageId($language_id)
					->count() > 0);
	}

	/**
	 * Set a translation.
	 *
	 * @param string $attribute
	 * @param string $value
	 * @param string $locale
	 * @return mixed
	 */
	public function set($attribute, $value, $locale)
	{
		$language_id = $this->getLanguageId();
		if(!is_null($locale))
			$language_id = app('translator')->localeToId($locale);

		// Create search key
		$searchValue = $this->getSearchKeyFor($attribute);

	 	$q = ModelTranslations::firstOrCreate([
					'search_value' 	=> $searchValue,
					'attribute'		=> $attribute,
					'language_id'	=> $language_id,
					'model'			=> $this->getModelName(),
					'default_value'	=> $this->getDefaultValueFor($attribute)
			]);
		$q->value = $value;

		return $q->save();
	}


	/**
	 * Returns the search key for an attribute
	 *
	 * @param string $attribute
	 * @return string
	 */
	private function getSearchKeyFor($attribute)
	{
		return md5($this->getModelName() . $attribute . $this->getDefaultValueFor($attribute));
	}


	/**
	 * @param Model $model
	 */
	public function setModel($model)
	{
		$this->model = $model;
	}

	/**
	 * @return Model
	 */
	public function getModel()
	{
		return $this->model;
	}

	/**
	 * @return string
	 */
	public function getModelName()
	{
		return collect(explode('\\', get_class($this->getModel())))->pop();
	}

	/**
	 * @param string $locale
	 */
	public function setLocale(string $locale)
	{
		$this->locale = $locale;
	}

	/**
	 * @return string
	 */
	public function getLocale()
	{
		return $this->locale();
	}

	/**
	 * @return int
	 */
	public function getLanguageId()
	{
		if(is_null($this->language_id))
			$this->language_id = app('translator')->localeToId($this->locale);

		return $this->language_id;
	}

	/**
	 * @throws LanguageException
	 */
	public function setLanguageId()
	{
		throw new LanguageException('Language ID can not set manually. Use setLocale() to set the language.');
	}

	/**
	 * @param $attribute
	 * @return array|mixed
	 */
	public function getDefaultValueFor($attribute)
	{
		return $this->model->getOriginal($attribute);
	}

}