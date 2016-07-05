<?php
/**
 * Configuration file for TransLaravel
 *
 * @package deArgonauten/TransLaravel
 * @author Jason de Ridder <mail@deargonauten.com>
 * @copyright Jason de Ridder
 * @license MIT
 */

return [

	/**
	 * Does the translation tables need to have a
	 * prefix? (we are using these table names:
	 * [languages, string_translations, model_translations, route_translations])
	 */
	'table_prefix' => 'TL_',

	/**
	 * If we do a IP Check to sniff for the prefered locale.
	 * What is the timeout in seconds?
	 */
	'timeout_ip_check' => 3,

	'iso639-1' => [
		'aa' => [
			'abbr' 		=> 'aa',
			'native'	=> 'Afaraf',
			'english'	=> 'Afar'
		],
		'ab' => [
			'abbr' 		=> 'ab',
			'native'	=> 'аҧсуа бызшәа, аҧсшәа',
			'english'	=> 'Abkhaz'
		],
		'ae' => [
			'abbr' 		=> 'ae',
			'native'	=> 'avesta',
			'english'	=> 'Avestan'
		],
		'af' => [
			'abbr' 		=> 'af',
			'native'	=> 'Afrikaans',
			'english'	=> 'Afrikaans'
		],
		'ak' => [
			'abbr' 		=> 'ak',
			'native'	=> 'Akan',
			'english'	=> 'Akan'
		],
		'am' => [
			'abbr' 		=> 'am',
			'native'	=> 'አማርኛ',
			'english'	=> 'Amharic'
		],
		'an' => [
			'abbr' 		=> 'an',
			'native'	=> 'aragonés',
			'english'	=> 'Aragonese'
		],
		'ar' => [
			'abbr' 		=> 'ar',
			'native'	=> 'العربية',
			'english'	=> 'Arabic'
		],
		'as' => [
			'abbr' 		=> 'as',
			'native'	=> 'অসমীয়া',
			'english'	=> 'Assamese'
		],
		'av' => [
			'abbr' 		=> 'av',
			'native'	=> 'авар мацӀ, магӀарул мацӀ',
			'english'	=> 'Avaric'
		],
		'ay' => [
			'abbr' 		=> 'ay',
			'native'	=> 'aymar aru',
			'english'	=> 'Aymara'
		],
		'az' => [
			'abbr' 		=> 'az',
			'native'	=> 'azərbaycan dili',
			'english'	=> 'Azerbaijani'
		],
		'ba' => [
			'abbr' 		=> 'ba',
			'native'	=> 'башҡорт теле',
			'english'	=> 'Bashkir'
		],
		'be' => [
			'abbr' 		=> 'be',
			'native'	=> 'беларуская мова',
			'english'	=> 'Belarusian'
		],
		'bg' => [
			'abbr' 		=> 'bg',
			'native'	=> 'български език',
			'english'	=> 'Bulgarian'
		],
		'bh' => [
			'abbr' 		=> 'bh',
			'native'	=> 'भोजपुरी',
			'english'	=> 'Bihari'
		],
		'bi' => [
			'abbr' 		=> 'bi',
			'native'	=> 'Bislama',
			'english'	=> 'Bislama'
		],
		'bm' => [
			'abbr' 		=> 'bm',
			'native'	=> 'bamanankan',
			'english'	=> 'Bambara'
		],
		'bn' => [
			'abbr' 		=> 'bn',
			'native'	=> 'বাংলা',
			'english'	=> 'Bengali, Bangla'
		],
		'bo' => [
			'abbr' 		=> 'bo',
			'native'	=> 'བོད་ཡིག',
			'english'	=> 'Tibetan Standard, Tibetan, Central'
		],
		'br' => [
			'abbr' 		=> 'br',
			'native'	=> 'brezhoneg',
			'english'	=> 'Breton'
		],
		'bs' => [
			'abbr' 		=> 'bs',
			'native'	=> 'bosanski jezik',
			'english'	=> 'Bosnian'
		],
		'ca' => [
			'abbr' 		=> 'ca',
			'native'	=> 'català',
			'english'	=> 'Catalan'
		],
		'ce' => [
			'abbr' 		=> 'ce',
			'native'	=> 'нохчийн мотт',
			'english'	=> 'Chechen'
		],
		'ch' => [
			'abbr' 		=> 'ch',
			'native'	=> 'Chamoru',
			'english'	=> 'Chamorro'
		],
		'co' => [
			'abbr' 		=> 'co',
			'native'	=> 'corsu, lingua corsa',
			'english'	=> 'Corsican'
		],
		'cr' => [
			'abbr' 		=> 'cr',
			'native'	=> 'ᓀᐦᐃᔭᐍᐏᐣ',
			'english'	=> 'Cree'
		],
		'cs' => [
			'abbr' 		=> 'cs',
			'native'	=> 'čeština, český jazyk',
			'english'	=> 'Czech'
		],
		'cu' => [
			'abbr' 		=> 'cu',
			'native'	=> 'ѩзыкъ словѣньскъ',
			'english'	=> 'Old Church Slavonic, Church Slavonic, Old Bulgarian'
		],
		'cv' => [
			'abbr' 		=> 'cv',
			'native'	=> 'чӑваш чӗлхи',
			'english'	=> 'Chuvash'
		],
		'cy' => [
			'abbr' 		=> 'cy',
			'native'	=> 'Cymraeg',
			'english'	=> 'Welsh'
		],
		'da' => [
			'abbr' 		=> 'da',
			'native'	=> 'dansk',
			'english'	=> 'Danish'
		],
		'de' => [
			'abbr' 		=> 'de',
			'native'	=> 'Deutsch',
			'english'	=> 'German'
		],
		'dv' => [
			'abbr' 		=> 'dv',
			'native'	=> 'ދިވެހި',
			'english'	=> 'Divehi, Dhivehi, Maldivian'
		],
		'dz' => [
			'abbr' 		=> 'dz',
			'native'	=> 'རྫོང་ཁ',
			'english'	=> 'Dzongkha'
		],
		'ee' => [
			'abbr' 		=> 'ee',
			'native'	=> 'Eʋegbe',
			'english'	=> 'Ewe'
		],
		'el' => [
			'abbr' 		=> 'el',
			'native'	=> 'ελληνικά',
			'english'	=> 'Greek (modern)'
		],
		'en' => [
			'abbr' 		=> 'en',
			'native'	=> 'English',
			'english'	=> 'English'
		],
		'eo' => [
			'abbr' 		=> 'eo',
			'native'	=> 'Esperanto',
			'english'	=> 'Esperanto'
		],
		'es' => [
			'abbr' 		=> 'es',
			'native'	=> 'español',
			'english'	=> 'Spanish'
		],
		'et' => [
			'abbr' 		=> 'et',
			'native'	=> 'eesti, eesti keel',
			'english'	=> 'Estonian'
		],
		'eu' => [
			'abbr' 		=> 'eu',
			'native'	=> 'euskara, euskera',
			'english'	=> 'Basque'
		],
		'fa' => [
			'abbr' 		=> 'fa',
			'native'	=> 'فارسی',
			'english'	=> 'Persian (Farsi)'
		],
		'ff' => [
			'abbr' 		=> 'ff',
			'native'	=> 'Fulfulde, Pulaar, Pular',
			'english'	=> 'Fula, Fulah, Pulaar, Pular'
		],
		'fi' => [
			'abbr' 		=> 'fi',
			'native'	=> 'suomi, suomen kieli',
			'english'	=> 'Finnish'
		],
		'fj' => [
			'abbr' 		=> 'fj',
			'native'	=> 'vosa Vakaviti',
			'english'	=> 'Fijian'
		],
		'fo' => [
			'abbr' 		=> 'fo',
			'native'	=> 'føroyskt',
			'english'	=> 'Faroese'
		],
		'fr' => [
			'abbr' 		=> 'fr',
			'native'	=> 'français, langue française',
			'english'	=> 'French'
		],
		'fy' => [
			'abbr' 		=> 'fy',
			'native'	=> 'Frysk',
			'english'	=> 'Western Frisian'
		],
		'ga' => [
			'abbr' 		=> 'ga',
			'native'	=> 'Gaeilge',
			'english'	=> 'Irish'
		],
		'gd' => [
			'abbr' 		=> 'gd',
			'native'	=> 'Gàidhlig',
			'english'	=> 'Scottish Gaelic, Gaelic'
		],
		'gl' => [
			'abbr' 		=> 'gl',
			'native'	=> 'galego',
			'english'	=> 'Galician'
		],
		'gn' => [
			'abbr' 		=> 'gn',
			'native'	=> 'Avañe\'ẽ',
			'english'	=> 'Guaraní'
		],
		'gu' => [
			'abbr' 		=> 'gu',
			'native'	=> 'ગુજરાતી',
			'english'	=> 'Gujarati'
		],
		'gv' => [
			'abbr' 		=> 'gv',
			'native'	=> 'Gaelg, Gailck',
			'english'	=> 'Manx'
		],
		'ha' => [
			'abbr' 		=> 'ha',
			'native'	=> ' هَوُسَ',
			'english'	=> 'Hausa'
		],
		'he' => [
			'abbr' 		=> 'he',
			'native'	=> 'עברית',
			'english'	=> 'Hebrew (modern)'
		],
		'hi' => [
			'abbr' 		=> 'hi',
			'native'	=> 'हिन्दी, हिंदी',
			'english'	=> 'Hindi'
		],
		'ho' => [
			'abbr' 		=> 'ho',
			'native'	=> 'Hiri Motu',
			'english'	=> 'Hiri Motu'
		],
		'hr' => [
			'abbr' 		=> 'hr',
			'native'	=> 'hrvatski jezik',
			'english'	=> 'Croatian'
		],
		'ht' => [
			'abbr' 		=> 'ht',
			'native'	=> 'Kreyòl ayisyen',
			'english'	=> 'Haitian, Haitian Creole'
		],
		'hu' => [
			'abbr' 		=> 'hu',
			'native'	=> 'magyar',
			'english'	=> 'Hungarian'
		],
		'hy' => [
			'abbr' 		=> 'hy',
			'native'	=> 'Հայերեն',
			'english'	=> 'Armenian'
		],
		'hz' => [
			'abbr' 		=> 'hz',
			'native'	=> 'Otjiherero',
			'english'	=> 'Herero'
		],
		'ia' => [
			'abbr' 		=> 'ia',
			'native'	=> 'Interlingua',
			'english'	=> 'Interlingua'
		],
		'id' => [
			'abbr' 		=> 'id',
			'native'	=> 'Bahasa Indonesia',
			'english'	=> 'Indonesian'
		],
		'ie' => [
			'abbr' 		=> 'ie',
			'native'	=> 'Originally called Occidental; then Interlingue after WWII',
			'english'	=> 'Interlingue'
		],
		'ig' => [
			'abbr' 		=> 'ig',
			'native'	=> 'Asụsụ Igbo',
			'english'	=> 'Igbo'
		],
		'ii' => [
			'abbr' 		=> 'ii',
			'native'	=> 'ꆈꌠ꒿ Nuosuhxop',
			'english'	=> 'Nuosu'
		],
		'ik' => [
			'abbr' 		=> 'ik',
			'native'	=> 'Iñupiaq, Iñupiatun',
			'english'	=> 'Inupiaq'
		],
		'io' => [
			'abbr' 		=> 'io',
			'native'	=> 'Ido',
			'english'	=> 'Ido'
		],
		'is' => [
			'abbr' 		=> 'is',
			'native'	=> 'Íslenska',
			'english'	=> 'Icelandic'
		],
		'it' => [
			'abbr' 		=> 'it',
			'native'	=> 'italiano',
			'english'	=> 'Italian'
		],
		'iu' => [
			'abbr' 		=> 'iu',
			'native'	=> 'ᐃᓄᒃᑎᑐᑦ',
			'english'	=> 'Inuktitut'
		],
		'ja' => [
			'abbr' 		=> 'ja',
			'native'	=> '日本語 (にほんご)',
			'english'	=> 'Japanese'
		],
		'jv' => [
			'abbr' 		=> 'jv',
			'native'	=> 'ꦧꦱꦗꦮ',
			'english'	=> 'Javanese'
		],
		'ka' => [
			'abbr' 		=> 'ka',
			'native'	=> 'ქართული',
			'english'	=> 'Georgian'
		],
		'kg' => [
			'abbr' 		=> 'kg',
			'native'	=> 'Kikongo',
			'english'	=> 'Kongo'
		],
		'ki' => [
			'abbr' 		=> 'ki',
			'native'	=> 'Gĩkũyũ',
			'english'	=> 'Kikuyu, Gikuyu'
		],
		'kj' => [
			'abbr' 		=> 'kj',
			'native'	=> 'Kuanyama',
			'english'	=> 'Kwanyama, Kuanyama'
		],
		'kk' => [
			'abbr' 		=> 'kk',
			'native'	=> 'қазақ тілі',
			'english'	=> 'Kazakh'
		],
		'kl' => [
			'abbr' 		=> 'kl',
			'native'	=> 'kalaallisut, kalaallit oqaasii',
			'english'	=> 'Kalaallisut, Greenlandic'
		],
		'km' => [
			'abbr' 		=> 'km',
			'native'	=> 'ខ្មែរ, ខេមរភាសា, ភាសាខ្មែរ',
			'english'	=> 'Khmer'
		],
		'kn' => [
			'abbr' 		=> 'kn',
			'native'	=> 'ಕನ್ನಡ',
			'english'	=> 'Kannada'
		],
		'ko' => [
			'abbr' 		=> 'ko',
			'native'	=> '한국어, 조선어',
			'english'	=> 'Korean'
		],
		'kr' => [
			'abbr' 		=> 'kr',
			'native'	=> 'Kanuri',
			'english'	=> 'Kanuri'
		],
		'ks' => [
			'abbr' 		=> 'ks',
			'native'	=> 'कश्मीरी, كشميري‎',
			'english'	=> 'Kashmiri'
		],
		'ku' => [
			'abbr' 		=> 'ku',
			'native'	=> 'Kurdî, كوردی‎',
			'english'	=> 'Kurdish'
		],
		'kv' => [
			'abbr' 		=> 'kv',
			'native'	=> 'коми кыв',
			'english'	=> 'Komi'
		],
		'kw' => [
			'abbr' 		=> 'kw',
			'native'	=> 'Kernewek',
			'english'	=> 'Cornish'
		],
		'ky' => [
			'abbr' 		=> 'ky',
			'native'	=> 'Кыргызча, Кыргыз тили',
			'english'	=> 'Kyrgyz'
		],
		'la' => [
			'abbr' 		=> 'la',
			'native'	=> 'latine, lingua latina',
			'english'	=> 'Latin'
		],
		'lb' => [
			'abbr' 		=> 'lb',
			'native'	=> 'Lëtzebuergesch',
			'english'	=> 'Luxembourgish, Letzeburgesch'
		],
		'lg' => [
			'abbr' 		=> 'lg',
			'native'	=> 'Luganda',
			'english'	=> 'Ganda'
		],
		'li' => [
			'abbr' 		=> 'li',
			'native'	=> 'Limburgs',
			'english'	=> 'Limburgish, Limburgan, Limburger'
		],
		'ln' => [
			'abbr' 		=> 'ln',
			'native'	=> 'Lingála',
			'english'	=> 'Lingala'
		],
		'lo' => [
			'abbr' 		=> 'lo',
			'native'	=> 'ພາສາລາວ',
			'english'	=> 'Lao'
		],
		'lt' => [
			'abbr' 		=> 'lt',
			'native'	=> 'lietuvių kalba',
			'english'	=> 'Lithuanian'
		],
		'lu' => [
			'abbr' 		=> 'lu',
			'native'	=> 'Tshiluba',
			'english'	=> 'Luba-Katanga'
		],
		'lv' => [
			'abbr' 		=> 'lv',
			'native'	=> 'latviešu valoda',
			'english'	=> 'Latvian'
		],
		'mg' => [
			'abbr' 		=> 'mg',
			'native'	=> 'fiteny malagasy',
			'english'	=> 'Malagasy'
		],
		'mh' => [
			'abbr' 		=> 'mh',
			'native'	=> 'Kajin M̧ajeļ',
			'english'	=> 'Marshallese'
		],
		'mi' => [
			'abbr' 		=> 'mi',
			'native'	=> 'te reo Māori',
			'english'	=> 'Māori'
		],
		'mk' => [
			'abbr' 		=> 'mk',
			'native'	=> 'македонски јазик',
			'english'	=> 'Macedonian'
		],
		'ml' => [
			'abbr' 		=> 'ml',
			'native'	=> 'മലയാളം',
			'english'	=> 'Malayalam'
		],
		'mn' => [
			'abbr' 		=> 'mn',
			'native'	=> 'Монгол хэл',
			'english'	=> 'Mongolian'
		],
		'mr' => [
			'abbr' 		=> 'mr',
			'native'	=> 'मराठी',
			'english'	=> 'Marathi (Marāṭhī)'
		],
		'ms' => [
			'abbr' 		=> 'ms',
			'native'	=> 'bahasa Melayu, بهاس ملايو‎',
			'english'	=> 'Malay'
		],
		'mt' => [
			'abbr' 		=> 'mt',
			'native'	=> 'Malti',
			'english'	=> 'Maltese'
		],
		'my' => [
			'abbr' 		=> 'my',
			'native'	=> 'ဗမာစာ',
			'english'	=> 'Burmese'
		],
		'na' => [
			'abbr' 		=> 'na',
			'native'	=> 'Dorerin Naoero',
			'english'	=> 'Nauruan'
		],
		'nb' => [
			'abbr' 		=> 'nb',
			'native'	=> 'Norsk bokmål',
			'english'	=> 'Norwegian Bokmål'
		],
		'nd' => [
			'abbr' 		=> 'nd',
			'native'	=> 'isiNdebele',
			'english'	=> 'Northern Ndebele'
		],
		'ne' => [
			'abbr' 		=> 'ne',
			'native'	=> 'नेपाली',
			'english'	=> 'Nepali'
		],
		'ng' => [
			'abbr' 		=> 'ng',
			'native'	=> 'Owambo',
			'english'	=> 'Ndonga'
		],
		'nl' => [
			'abbr' 		=> 'nl',
			'native'	=> 'Nederlands, Vlaams',
			'english'	=> 'Dutch'
		],
		'nn' => [
			'abbr' 		=> 'nn',
			'native'	=> 'Norsk nynorsk',
			'english'	=> 'Norwegian Nynorsk'
		],
		'no' => [
			'abbr' 		=> 'no',
			'native'	=> 'Norsk',
			'english'	=> 'Norwegian'
		],
		'nr' => [
			'abbr' 		=> 'nr',
			'native'	=> 'isiNdebele',
			'english'	=> 'Southern Ndebele'
		],
		'nv' => [
			'abbr' 		=> 'nv',
			'native'	=> 'Diné bizaad',
			'english'	=> 'Navajo, Navaho'
		],
		'ny' => [
			'abbr' 		=> 'ny',
			'native'	=> 'chiCheŵa, chinyanja',
			'english'	=> 'Chichewa, Chewa, Nyanja'
		],
		'oc' => [
			'abbr' 		=> 'oc',
			'native'	=> 'occitan, lenga d\'òc',
			'english'	=> 'Occitan'
		],
		'oj' => [
			'abbr' 		=> 'oj',
			'native'	=> 'ᐊᓂᔑᓈᐯᒧᐎᓐ',
			'english'	=> 'Ojibwe, Ojibwa'
		],
		'om' => [
			'abbr' 		=> 'om',
			'native'	=> 'Afaan Oromoo',
			'english'	=> 'Oromo'
		],
		'or' => [
			'abbr' 		=> 'or',
			'native'	=> 'ଓଡ଼ିଆ',
			'english'	=> 'Oriya'
		],
		'os' => [
			'abbr' 		=> 'os',
			'native'	=> 'ирон æвзаг',
			'english'	=> 'Ossetian, Ossetic'
		],
		'pa' => [
			'abbr' 		=> 'pa',
			'native'	=> 'ਪੰਜਾਬੀ, پنجابی‎',
			'english'	=> 'Panjabi, Punjabi'
		],
		'pi' => [
			'abbr' 		=> 'pi',
			'native'	=> 'पाऴि',
			'english'	=> 'Pāli'
		],
		'pl' => [
			'abbr' 		=> 'pl',
			'native'	=> 'język polski, polszczyzna',
			'english'	=> 'Polish'
		],
		'ps' => [
			'abbr' 		=> 'ps',
			'native'	=> 'پښتو',
			'english'	=> 'Pashto, Pushto'
		],
		'pt' => [
			'abbr' 		=> 'pt',
			'native'	=> 'português',
			'english'	=> 'Portuguese'
		],
		'qu' => [
			'abbr' 		=> 'qu',
			'native'	=> 'Runa Simi, Kichwa',
			'english'	=> 'Quechua'
		],
		'rc' => [
			'abbr' 		=> 'rc',
			'native'	=> 'Kréol Rénioné',
			'english'	=> 'Reunionese, Reunion Creole'
		],
		'rm' => [
			'abbr' 		=> 'rm',
			'native'	=> 'rumantsch grischun',
			'english'	=> 'Romansh'
		],
		'rn' => [
			'abbr' 		=> 'rn',
			'native'	=> 'Ikirundi',
			'english'	=> 'Kirundi'
		],
		'ro' => [
			'abbr' 		=> 'ro',
			'native'	=> 'limba română',
			'english'	=> 'Romanian'
		],
		'ru' => [
			'abbr' 		=> 'ru',
			'native'	=> 'Русский',
			'english'	=> 'Russian'
		],
		'rw' => [
			'abbr' 		=> 'rw',
			'native'	=> 'Ikinyarwanda',
			'english'	=> 'Kinyarwanda'
		],
		'sa' => [
			'abbr' 		=> 'sa',
			'native'	=> 'संस्कृतम्',
			'english'	=> 'Sanskrit (Saṁskṛta)'
		],
		'sc' => [
			'abbr' 		=> 'sc',
			'native'	=> 'sardu',
			'english'	=> 'Sardinian'
		],
		'sd' => [
			'abbr' 		=> 'sd',
			'native'	=> 'सिन्धी, سنڌي، سندھی‎',
			'english'	=> 'Sindhi'
		],
		'se' => [
			'abbr' 		=> 'se',
			'native'	=> 'Davvisámegiella',
			'english'	=> 'Northern Sami'
		],
		'sg' => [
			'abbr' 		=> 'sg',
			'native'	=> 'yângâ tî sängö',
			'english'	=> 'Sango'
		],
		'si' => [
			'abbr' 		=> 'si',
			'native'	=> 'සිංහල',
			'english'	=> 'Sinhalese, Sinhala'
		],
		'sk' => [
			'abbr' 		=> 'sk',
			'native'	=> 'slovenčina, slovenský jazyk',
			'english'	=> 'Slovak'
		],
		'sl' => [
			'abbr' 		=> 'sl',
			'native'	=> 'slovenski jezik, slovenščina',
			'english'	=> 'Slovene'
		],
		'sm' => [
			'abbr' 		=> 'sm',
			'native'	=> 'gagana fa\'a Samoa',
			'english'	=> 'Samoan'
		],
		'sn' => [
			'abbr' 		=> 'sn',
			'native'	=> 'chiShona',
			'english'	=> 'Shona'
		],
		'so' => [
			'abbr' 		=> 'so',
			'native'	=> 'Soomaaliga, af Soomaali',
			'english'	=> 'Somali'
		],
		'sq' => [
			'abbr' 		=> 'sq',
			'native'	=> 'Shqip',
			'english'	=> 'Albanian'
		],
		'sr' => [
			'abbr' 		=> 'sr',
			'native'	=> 'српски језик',
			'english'	=> 'Serbian'
		],
		'ss' => [
			'abbr' 		=> 'ss',
			'native'	=> 'SiSwati',
			'english'	=> 'Swati'
		],
		'st' => [
			'abbr' 		=> 'st',
			'native'	=> 'Sesotho',
			'english'	=> 'Southern Sotho'
		],
		'su' => [
			'abbr' 		=> 'su',
			'native'	=> 'Basa Sunda',
			'english'	=> 'Sundanese'
		],
		'sv' => [
			'abbr' 		=> 'sv',
			'native'	=> 'svenska',
			'english'	=> 'Swedish'
		],
		'sw' => [
			'abbr' 		=> 'sw',
			'native'	=> 'Kiswahili',
			'english'	=> 'Swahili'
		],
		'ta' => [
			'abbr' 		=> 'ta',
			'native'	=> 'தமிழ்',
			'english'	=> 'Tamil'
		],
		'te' => [
			'abbr' 		=> 'te',
			'native'	=> 'తెలుగు',
			'english'	=> 'Telugu'
		],
		'tg' => [
			'abbr' 		=> 'tg',
			'native'	=> 'тоҷикӣ, toçikī, تاجیکی‎',
			'english'	=> 'Tajik'
		],
		'th' => [
			'abbr' 		=> 'th',
			'native'	=> 'ไทย',
			'english'	=> 'Thai'
		],
		'ti' => [
			'abbr' 		=> 'ti',
			'native'	=> 'ትግርኛ',
			'english'	=> 'Tigrinya'
		],
		'tk' => [
			'abbr' 		=> 'tk',
			'native'	=> 'Türkmen, Түркмен',
			'english'	=> 'Turkmen'
		],
		'tl' => [
			'abbr' 		=> 'tl',
			'native'	=> 'Wikang Tagalog',
			'english'	=> 'Tagalog'
		],
		'tn' => [
			'abbr' 		=> 'tn',
			'native'	=> 'Setswana',
			'english'	=> 'Tswana'
		],
		'to' => [
			'abbr' 		=> 'to',
			'native'	=> 'faka Tonga',
			'english'	=> 'Tonga (Tonga Islands)'
		],
		'tr' => [
			'abbr' 		=> 'tr',
			'native'	=> 'Türkçe',
			'english'	=> 'Turkish'
		],
		'ts' => [
			'abbr' 		=> 'ts',
			'native'	=> 'Xitsonga',
			'english'	=> 'Tsonga'
		],
		'tt' => [
			'abbr' 		=> 'tt',
			'native'	=> 'татар теле, tatar tele',
			'english'	=> 'Tatar'
		],
		'tw' => [
			'abbr' 		=> 'tw',
			'native'	=> 'Twi',
			'english'	=> 'Twi'
		],
		'ty' => [
			'abbr' 		=> 'ty',
			'native'	=> 'Reo Tahiti',
			'english'	=> 'Tahitian'
		],
		'ug' => [
			'abbr' 		=> 'ug',
			'native'	=> 'ئۇيغۇرچە‎',
			'english'	=> 'Uyghur'
		],
		'uk' => [
			'abbr' 		=> 'uk',
			'native'	=> 'Українська',
			'english'	=> 'Ukrainian'
		],
		'ur' => [
			'abbr' 		=> 'ur',
			'native'	=> 'اردو',
			'english'	=> 'Urdu'
		],
		'uz' => [
			'abbr' 		=> 'uz',
			'native'	=> 'Oʻzbek, Ўзбек, أۇزبېك‎',
			'english'	=> 'Uzbek'
		],
		've' => [
			'abbr' 		=> 've',
			'native'	=> 'Tshivenḓa',
			'english'	=> 'Venda'
		],
		'vi' => [
			'abbr' 		=> 'vi',
			'native'	=> 'Tiếng Việt',
			'english'	=> 'Vietnamese'
		],
		'vo' => [
			'abbr' 		=> 'vo',
			'native'	=> 'Volapük',
			'english'	=> 'Volapük'
		],
		'wa' => [
			'abbr' 		=> 'wa',
			'native'	=> 'walon',
			'english'	=> 'Walloon'
		],
		'wo' => [
			'abbr' 		=> 'wo',
			'native'	=> 'Wollof',
			'english'	=> 'Wolof'
		],
		'xh' => [
			'abbr' 		=> 'xh',
			'native'	=> 'isiXhosa',
			'english'	=> 'Xhosa'
		],
		'yi' => [
			'abbr' 		=> 'yi',
			'native'	=> 'ייִדיש',
			'english'	=> 'Yiddish'
		],
		'yo' => [
			'abbr' 		=> 'yo',
			'native'	=> 'Yorùbá',
			'english'	=> 'Yoruba'
		],
		'za' => [
			'abbr' 		=> 'za',
			'native'	=> 'Saɯ cueŋƅ, Saw cuengh',
			'english'	=> 'Zhuang, Chuang'
		],
		'zh' => [
			'abbr' 		=> 'zh',
			'native'	=> '中文, 汉语, 漢語',
			'english'	=> 'Chinese'
		],
		'zu' => [
			'abbr' 		=> 'zu',
			'native'	=> 'isiZulu',
			'english'	=> 'Zulu'
		],
	]


];
