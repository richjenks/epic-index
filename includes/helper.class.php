<?php

class Helper {

	/**
	 * strip_query
	 * 
	 * Removes the current query string from a given URL
	 * Used to prevent errors when getting directory listings
	 * 
	 * @param string $url The URL to remove the query string from
	 * @return string The $url provided without the query string
	 */

	public static function strip_query($url) {

		return str_replace(
			'?'.$_SERVER['QUERY_STRING'],
			'',
			$url
		);

	}

	/**
	 * escape_chars
	 * 
	 * Escapes every character of a given string
	 * Used to pass raw strings to the `date()` function in the `format` param
	 * 
	 * @param string $str The string to be escaped
	 * @return string The scaped string
	 */

	public static function escape_chars($str) {

		$escaped = '';
		$chars = str_split($str);
		foreach ($chars as $char) {
			$escaped .= '\\'.$char;
		}
		return $escaped;

	}

	/**
	 * icon
	 * 
	 * When passed file, will return the name of the appropriate icon
	 * 
	 * @param string $file The full path or basename of the file, including extension
	 * @return string The basename of the appropriate icon, without extension
	 */

	public static function file($file) {

		// Get the file's extension
		$extension = end(explode('.', $file));

		// Return the appropriate icon
		switch ($extension) {
			case 'value':
				# code...
				break;
			
			default:
				# code...
				break;
		}

	}

}