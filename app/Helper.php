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
	 * format_date
	 * 
	 * Formats a timestamp
	 * 
	 * @param int $timestamp Timestamp to be formatted
	 * @param string $format Format for date
	 * 
	 * @return string Formatted date
	 */

	public static function format_date($timestamp) {
		return date(
			Helper::escape_chars('<span class="faded smallcaps">')
				.'D'
				.Helper::escape_chars('</span>')
				.' Y-m-d'
				.Helper::escape_chars('<span class="faded smallcaps">')
				.' H:i'
				.Helper::escape_chars('</span>'),
			$timestamp);
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

	public static function shatter($split, $string) {
		$string = explode($split, $string);
		$string = array_filter($string);
		return $string;
	}

	/**
	 * get_domain
	 * 
	 * Gets the fully-qualified domain name of current location
	 * 
	 * @return string Domain name, e.g. https://sub.domain.tld
	 */

	public static function get_domain() {

		// Start with protocol
		$uri = 'http';

		// If https, add to protocol
		if (isset($_SERVER['HTTPS'])) {
			$uri .= 's';
		}

		// Append host
		$uri .= '://'.$_SERVER['HTTP_HOST'];

		return $uri;

	}

}
