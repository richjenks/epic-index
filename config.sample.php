<?php

namespace RichJenks\Teepee;

return array(

	/*
	|--------------------------------------------------------------------------
	| Language
	|--------------------------------------------------------------------------
	|
	| The language for the application
	|
	| Available languages:
	|
	| - English
	| - Russian *
	| - German
	| - Japanese *
	| - Spanish *
	| - French
	| - Chinese *
	| - Portuguese
	| - Italian
	| - Polish
	|
	| * Not verified by native speaker
	|
	| Languages chosen based on:
	| https://en.wikipedia.org/wiki/Languages_used_on_the_Internet
	|
	| Default: 'English'
	|
	*/

	'language' => 'English',

	/*
	|--------------------------------------------------------------------------
	| Filesize Precision
	|--------------------------------------------------------------------------
	|
	| The number of decimal places shown for a filesize
	|
	| Default: 2
	|
	*/

	'filesize_precision' => 2,

	/*
	|--------------------------------------------------------------------------
	| Root Label
	|--------------------------------------------------------------------------
	|
	| The name given to the parent link which points to webroot
	|
	| Default: 'Home'
	|
	*/

	'root_label' => 'Home',

	/*
	|--------------------------------------------------------------------------
	| Date Format
	|--------------------------------------------------------------------------
	|
	| The format for modified dates
	| Accepts a valid value for the $format param of `date()`
	| The Helper function `fade` makes the given string faded and in smallcaps
	|
	| Default: '\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<
	| \/\s\p\a\n\> Y-m-d\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\
	| s\"\> H:i\<\/\s\p\a\n\>'
	|
	*/

	'date_format' => VariableHelper::fade('D').' Y-m-d'.VariableHelper::fade(' H:i'),

	/*
	|--------------------------------------------------------------------------
	| Hover Info
	|--------------------------------------------------------------------------
	|
	| Defines whether file/folder/link info shows on hover in title attribute
	|
	| Default: true
	|
	*/

	'hover_info' => true,

	/*
	|--------------------------------------------------------------------------
	| Custom Links
	|--------------------------------------------------------------------------
	|
	| Custom Links are shown below the parent link and above folders
	| You can specify a name, a URI and where they should be shown
	|
	| Format:
	|
	| array['custom_links']
	|     [0]
	|         ['name'] string The text that will appear as the link
	|         ['uri']  string The URI the link will point to
	|         ['show'] array  (Optional) Requests for which the link will show
	|         ['new']  bool   (Optional) Whether link will open in a new tab
	|
	| The `show` param also accepts an asterisk meaning "everywhere"
	| `show` defaults to "*"
	| `new` defaults to `false`
	|
	| Example:
	|
	| <code>
	| 'custom_links' => array(
	|     array(
	|         'name' => 'PHPMyAdmin',
	|         'uri'  => 'http://localhost/phpmyadmin',
	|         'show' => array('/'),
	|         'new'  => true,
	|     ),
	| ),
	| </code>
	|
	| The code above will show a link to PHPMyAdmin when browsing the webroot
	| which will open in a new tab
	|
	| Default: array()
	|
	*/

	'custom_links' => array(),

	/*
	|--------------------------------------------------------------------------
	| Password
	|--------------------------------------------------------------------------
	|
	| Protect directory browsing with a password
	| Leave blank (or comment out) for no password
	|
	| Default: ''
	|
	*/

	'password' => '',

	/*
	|--------------------------------------------------------------------------
	| Timeout
	|--------------------------------------------------------------------------
	|
	| Seconds of inactivity before password needs to be re-entered
	| Is ignored if `password` is blank or commented out
	|
	| Set to 0 to require password every time
	|
	| Default: 1800
	|
	*/

	'timeout' => 1800,

	/*
	|--------------------------------------------------------------------------
	| Debug Mode
	|--------------------------------------------------------------------------
	|
	| When enabled, errors will be shown
	| When disabled, errors will be hidden
	|
	| Default: false
	|
	*/

	'debug_mode' => false,

);