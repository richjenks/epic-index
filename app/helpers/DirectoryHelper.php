<?php

/**
 * DirectoryHelper
 *
 * Static helper function for directory listings
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.3.0
 */

namespace RichJenks\Teepee;

class DirectoryHelper {

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

		// If size is zero, skip the calculations
		if ($size !== 0) {

			// Calculate base
			$base = log($size) / log(1024);

			// Array of units
			$units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

			// Calculate size
			$size = round(pow(1024, $base - floor($base)), $precision);

			// Select unit
			$unit = $units[floor($base)];

		} else {

			// Size is zero so hardcode unit
			$unit = 'B';

		}


		// Construct output as per format
		$format = str_replace('{size}', $size, $format);
		$format = str_replace('{unit}', $unit, $format);

		return $format;

	}

	/**
	 * get_icon
	 *
	 * Either returns an icon matching the extension or the default icon
	 *
	 * @param string $extension File's extension
	 * @return string The name of the correct icon
	 */

	public static function get_icon($extension) {
		if (!file_exists(TEEPEE_PATH.'app/assets/icons/'.$extension.'.png')) {
			return 'default';
		} else {
			return $extension;
		}
	}

}
