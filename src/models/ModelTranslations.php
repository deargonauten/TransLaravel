<?php

namespace deArgonauten\TransLaravel\Models;

use Illuminate\Database\Eloquent\Model;

class ModelTranslations extends Model
{

	protected $guarded = ['id'];

	public function __construct(array $attributes = [])
	{
		$this->table = config("translaravel.table_prefix") . 'model_translations';
		parent::__construct($attributes);
	}

}
