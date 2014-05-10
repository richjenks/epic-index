<?php

namespace RichJenks\Teepee;

return array(

	/*
	|--------------------------------------------------------------------------
	| Filesize Precision
	|--------------------------------------------------------------------------
	| 
	| The number of decimal places shown for a filesize
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
	*/

	'date_format' => Helper::fade('D').' Y-m-d'.Helper::fade(' H:i'),

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
	|         ['uri'] string The URI the link will point to
	|         ['show'] mixed Paths for which the link will show
	| 
	| The `show` parameter accepts a request path from the webroot, multiple
	| request paths in an indexed array or an asterisk, which makes the link
	| show everywhere
	| 
	| Example:
	| 
	| <code>
	| 'custom_links' => array(
	|     array(
	|         'name' => 'PHPMyAdmin',
	|         'uri' => 'http://localhost/phpmyadmin',
	|         'show' => '/',
	|     ),
	| );
	| </code>
	| 
	| The code above will show a link to PHPMyAdmin when browsing the webroot
	| 
	*/

	'custom_links' => array(
		
		array(
			'name' => 'PHPMyAdmin',
			'uri' => 'http://localhost/phpmyadmin',
			'show' => '/',
		),
		
		array(
			'name' => 'GitHub',
			'uri' => 'http://github.com',
			'show' => array(
				'/',
				'/git/',
			),
		),
		
		array(
			'name' => 'Google',
			'uri' => 'http://google.com',
			'show' => '*',
		),
	
	),

);