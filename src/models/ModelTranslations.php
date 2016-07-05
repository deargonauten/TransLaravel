<?php
/**
 * The ModelTranslations model
 *
 * @package deArgonauten/TransLaravel
 * @subpackage Models
 * @author Jason de Ridder <mail@deargonauten.com>
 * @copyright Jason de Ridder
 * @license MIT
 */
namespace deArgonauten\TransLaravel\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelTranslations
 * @package deArgonauten\TransLaravel\Models
 */
class ModelTranslations extends Model
{

	/**
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * ModelTranslations constructor.
	 * @param array $attributes
	 */
	public function __construct(array $attributes = [])
	{
		$this->table = config("translaravel.table_prefix") . 'model_translations';
		parent::__construct($attributes);
	}

}
