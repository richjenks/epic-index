<?php

namespace RichJenks\Teepee;

return array(

	/**
	 * Filesize Precision
	 * 
	 * The number of decimal places shown for a filesize
	 */

	'filesize_precision' => 2,

	/**
	 * Date Format
	 * 
	 * The format for modified dates
	 * Accepts a valid value for the $format param of `date()`
	 * The Helper function `escape_chars` escapes every char of its param
	 * This makes it easier to add raw strings to this option
	 */

	'date_format' => Helper::escape_chars('<span class="faded smallcaps">')
		.'D'
		.Helper::escape_chars('</span>')
		.' Y-m-d'
		.Helper::escape_chars('<span class="faded smallcaps">')
		.' H:i'
		.Helper::escape_chars('</span>'),

	/**
	 * Custom Links
	 * 
	 * Custom Links are essentially bookmarks shown below the parent link and above folders
	 * 
	 * Format:
	 * 
	 * array['custom_links']
	 *     [0]
	 *         ['name'] string The text that will appear as the link
	 *         ['uri'] string The URI the link will point to
	 *         ['show'] mixed String or numeric array or paths for which the link will show
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