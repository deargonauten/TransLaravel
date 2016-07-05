<?php
/**
 * The Language model
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
 * Class Languages
 * @package deArgonauten\TransLaravel\Models
 */
class Languages extends Model
{

	/**
	 * @var array
	 */
	protected $guarded = ['id'];

	/**
	 * Languages constructor.
	 * @param array $attributes
	 */
	public function __construct(array $attributes = [])
	{
		$this->table = config("translaravel.table_prefix") . 'languages';
		parent::__construct($attributes);
	}

}
