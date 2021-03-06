<?php
/**
 * Creating the languages table.
 *
 * @package deArgonauten/TransLaravel
 * @author Jason de Ridder <mail@deargonauten.com>
 * @copyright Jason de Ridder
 * @license MIT
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Languages
 */
class Languages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('translaravel.table_prefix') . 'languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('abbreviation', 2)->index();
            $table->string('native');
            $table->string('english');
            $table->boolean('active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(config('translaravel.table_prefix') . 'languages');
    }
}
