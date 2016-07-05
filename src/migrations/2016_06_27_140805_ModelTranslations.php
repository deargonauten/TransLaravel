<?php
/**
 * Creating the model_translations table
 *
 * @package deArgonauten/TransLaravel
 * @author Jason de Ridder <mail@deargonauten.com>
 * @copyright Jason de Ridder
 * @license MIT
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class ModelTranslations
 */
class ModelTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('translaravel.table_prefix') . 'model_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->string('model');
            $table->string('attribute');
            $table->string('search_value', 55);
            $table->text('default_value');
            $table->text('value');
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
        Schema::drop(config('translaravel.table_prefix') . 'model_translations');
    }
}
