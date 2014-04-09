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

	public static function filesize($bytes, $precision = 0, $format = '{size} {unit}') {

		// Calculate size and select unit
		switch ($bytes) {

			// Exabytes
			case $bytes >= 1152921504606846976:
				$size = $bytes / 1024 / 1024 / 1024 / 1024 / 1024 / 1024;
				$unit = 'EB';
				break;

			// Petabytes
			case $bytes >= 1125899906842624:
				$size = $bytes / 1024 / 1024 / 1024 / 1024 / 1024;
				$unit = 'PB';
				break;

			// Terabytes
			case $bytes >= 1099511627776:
				$size = $bytes / 1024 / 1024 / 1024 / 1024;
				$unit = 'TB';
				break;

			// Gigabytes
			case $bytes >= 1073741824:
				$size = $bytes / 1024 / 1024 / 1024;
				$unit = 'GB';
				break;

			// Megabytes
			case $bytes >= 1048576:
				$size = $bytes / 1024 / 1024;
				$unit = 'MB';
				break;

			// Kilobytes
			case $bytes >= 1024:
				$size = $bytes / 1024;
				$unit = 'KB';
				break;

			// Bytes
			default:
				$size = $bytes;
				$unit = 'B';
				break;
		
		}

		// Round size to correct precision
		$size = round($size, $precision);

		// Construct output as per format
		$format = str_replace('{size}', $size, $format);
		$format = str_replace('{unit}', $unit, $format);

		return $format;

	}

}