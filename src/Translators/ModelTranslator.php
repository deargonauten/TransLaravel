<?php
namespace deArgonauten\TransLaravel\Translators;


use deArgonauten\TransLaravel\Exceptions\LanguageException;
use deArgonauten\TransLaravel\Models\ModelTranslations;
use deArgonauten\TransLaravel\TransLaravel;

class ModelTranslator
{
	private $model;
	private $locale;
	private $language_id;

	public function __construct($locale, $model)
	{
		$this->setLocale($locale);
		$this->setModel($model);
		$this->getLanguageId();
	}

	public function get($attribute, $locale = null)
	{
		$language_id = $this->getLanguageId();
		if(!is_null($locale))
			$language_id = app('translator')->localeToId($locale);

		if(!$this->has($attribute, $locale))
			$this->set($attribute, $this->getDefaultValueFor($attribute), $locale);

		// Create search key
		$searchValue = $this->getSearchKeyFor($attribute);

		return ModelTranslations::whereSearchValue($searchValue)
				->whereLanguageId($language_id)
				->first()->value;
	}


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



	private function getSearchKeyFor($attribute)
	{
		return md5($this->getModelName() . $attribute . $this->getDefaultValueFor($attribute));
	}


	public function setModel($model)
	{
		$this->model = $model;
	}

	public function getModel()
	{
		return $this->model;
	}

	public function getModelName()
	{
		return collect(explode('\\', get_class($this->getModel())))->pop();
	}

	public function setLocale(string $locale)
	{
		$this->locale = $locale;
	}

	public function getLocale()
	{
		return $this->locale();
	}

	public function getLanguageId()
	{
		if(is_null($this->language_id))
			$this->language_id = app('translator')->localeToId($this->locale);

		return $this->language_id;
	}

	public function setLanguageId()
	{
		throw new LanguageException('Language ID can not set manually. Use setLocale() to set the language.');
	}

	public function getDefaultValueFor($attribute)
	{
		return $this->model->getOriginal($attribute);
	}

}