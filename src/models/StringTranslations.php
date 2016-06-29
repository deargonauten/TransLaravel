<?php

namespace deArgonauten\TransLaravel\Models;

use Illuminate\Database\Eloquent\Model;

class StringTranslations extends Model
{

	protected $guarded = ['id'];

	public function __construct(array $attributes = [])
	{
		$this->table = config("translaravel.table_prefix") . 'string_translations';
		parent::__construct($attributes);
	}

}
