<?php
/**
 * The RouteTranslations model
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
 * Class RouteTranslations
 * @package deArgonauten\TransLaravel\Models
 */
class RouteTranslations extends Model
{

	/**
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * RouteTranslations constructor.
	 * @param array $attributes
	 */
	public function __construct(array $attributes = [])
	{
		$this->table = config("translaravel.table_prefix") . 'route_translations';
		parent::__construct($attributes);
	}

}
