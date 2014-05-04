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
	 * smallfade
	 * 
	 * Wraps the given string in a smallfade span
	 * 
	 * @param string $string String to be wrapped
	 * @param bool $escaped Whether every char of the span is escaped
	 * @return string HTML of string wrapped in smallfade span
	 */

	public static function smallfade($string, $escaped = false) {
		if (!$escaped) {
			return '<span class="faded smallcapes">'.$string.'</span>';
		} else {
			return self::escape_chars('<span class="faded smallcapes">').$string.self::escape_chars('</span>');
		}
	}

	/**
	 * icon
	 * 
	 * When passed file, will return the name of the appropriate icon
	 * 
	 * @param string $filename The full path or basename of the file, including extension
	 * @return string The basename of the appropriate Faenza icon, without extension
	 */

	public static function icon($filename) {

		// Get the file's extension
		$extension = end(explode('.', $filename));

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

	/**
	 * filesize
	 * 
	 * Formats a filesize into a human-readable format
	 * 
	 * @param int $bytes Filesize in bytes
	 * @param int $precision Number of decimal places
	 * @param string $format Output format with placeholders "{size}" and "{unit}"
	 */

	public static function filesize($size, $precision = 0, $format = '{size} {unit}') {

		// Calculate base
		$base = log($size) / log(1024);

		// Array of units
		$units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

		// Calculate size
		$size = round(pow(1024, $base - floor($base)), $precision);

		// Select unit
		$unit = $units[floor($base)];

		// Construct output as per format
		$format = str_replace('{size}', $size, $format);
		$format = str_replace('{unit}', $unit, $format);

		return $format;

	}

	/**
	 * shatter
	 * 
	 * Explode and Filter
	 * Splits a string by a string into array and removes blanks
	 */

	public function shatter($split, $string) {
		$string = explode($split, $string);
		$string = array_filter($string);
		return $string;
	}

}
