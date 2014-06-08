<?php

/**
 * VariableHelper
 *
 * Static helper function for manipulating variables
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.3.0
 */

namespace RichJenks\Teepee;

class VariableHelper {

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
	 * fade
	 *
	 * Wraps the given string in faded smallcaps
	 *
	 * @param string $string The string to be faded
	 * @return string The faded string
	 */

	public static function fade($str) {
		return self::escape_chars('<span class="faded smallcaps">').$str.self::escape_chars('</span>');
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
	 * sort_arr_by_key
	 *
	 * Sorts a given array by the values of its child arrays
	 *
	 * The code below would order the array items by age:
	 *
	 * <code>
	 * $array = array(
	 *     array(
	 *         'name' => 'jim',
	 *         'age' => 30,
	 *     ),
	 *     array(
	 *         'name' => 'rob',
	 *         'age' => 25,
	 *     ),
	 * );
	 * var_dump($array, 'age');
	 * </code>
	 *
	 * @param array $sort_array The array being sorted
	 * @param string $sort_key The key to sort by
	 *
	 * @return array The sorted array
	 */

	public static function sort_arr_by_key($sort_array, $sort_key) {

		// Declare array to prevent aray_multisort throwing error if $sort_array is empty
		$values = array();

		// Populate array for the "column" being sorted
		foreach ($sort_array as $key => $row) {
			$values[$key] = $row[$sort_key];
		}

		// Sort the array naturally and case-insensitively
		array_multisort($values, SORT_FLAG_CASE | SORT_NATURAL, $sort_array);

		return $sort_array;

	}

}