# TransLaravel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Install

Via Composer

``` bash
$ composer require deArgonauten/TransLaravel
```
 
Add the ServiceProvider in: `config/app.php`
``` php
deArgonauten\TransLaravel\TransLaravelServiceProvider::class,
```

An artisan command is now available. Run it.
``` bash
$ php artisan translaravel:install
```

And... DONE!

## Usage

First add a language by doing:
``` php
Lang::addLanguage('locale');
// en, nl, de, fr, et cetera
```
See full list: [https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes](https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes)

### String Translations

``` php
trans('A string, even with <b>some</b> HTML');
Lang::get('A string, even with <b>some</b> HTML');
```

### Model translations
In your models use the Translations Trait like this:

``` php
use deArgonauten\TransLaravel\Translations;

class YourModel extends Model
{
	use Translations;
	
	private $translatable = ['attribute1', 'attribute2']
}
```
Use the variable $translatable to fill an array with translatable attributes.

Now you can use:
``` php
$model->name; // It will automaticly fetch the translation set in Application.
$model->getTranslationFor('attribute', 'locale');
```


### Route translations
In your routes file you can use the translations as follow:
``` php
Route::get(
	Lang::route('/this-is-a-page'), function()
	{
		return view('pages.contact');
	});
```

### Helper functions
We hook you up with some helper functions
``` php
translateURL('url', 'locale');
// Returns a link in the requested locale.
// By omiting the locale parameter it will fetch the current set language.

untranslateURL('url');
// Returns a link in the default language

translateLink('url', 'name', [parameters], locale);
// Returns something like this: <a href="translateURL('url')" class="this and that">trans('name')</a>

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email mail@deargonauten.com instead of using the issue tracker.

## Credits

- [Jason de Ridder][http://deargonauten.com]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/deArgonauten/TransLaravel.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/deArgonauten/TransLaravel/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/deArgonauten/TransLaravel.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/deArgonauten/TransLaravel.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/deArgonauten/TransLaravel.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/deArgonauten/TransLaravel
[link-travis]: https://travis-ci.org/deArgonauten/TransLaravel
[link-scrutinizer]: https://scrutinizer-ci.com/g/deArgonauten/TransLaravel/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/deArgonauten/TransLaravel
[link-downloads]: https://packagist.org/packages/deArgonauten/TransLaravel
