<?php

namespace deArgonauten\TransLaravel\Models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{

	protected $guarded = ['id'];

	public function __construct(array $attributes = [])
	{
		$this->table = config("translaravel.table_prefix") . 'languages';
		parent::__construct($attributes);
	}

}