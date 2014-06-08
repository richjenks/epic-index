<?php

/**
 * Translator
 *
 * Helper for handling translations file and translating text
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.2.0
 */

namespace RichJenks\Teepee;

class Translator {

	/**
	 * get_translations
	 *
	 * Processes the translations CSV
	 * Asumes first row is phrase IDs, other rows are languages & translations
	 *
	 * @return array Array of translations
	 */

	private static function get_translations() {

		// Get CSV as array, one row per sub-array
		$array = array_map('str_getcsv', file(TEEPEE_PATH.'app/assets/translations.csv'));

		// Make the first cell in each line the array name
		// so each sub-array is called by the value of the first cell of the column
		foreach ($array as $key => $value) {

			// Create a new sub-array by the name of the first element in each array
			// One for phrase ID then one for each language
			$array[$array[$key][0]] = $array[$key];

			// Remove the first value of each array
			// 'ID' or the language, which is now the name of the array
			array_shift($array[$array[$key][0]]);

			// Unset the original indexed array
			unset($array[$key]);

		}

		return $array;

	}

	/**
	 * transate
	 *
	 * Processes CSV into translations array, if not already done
	 * Translates phrase ID into target language set in global $config
	 */

	public static function translate($id) {

		global $config;
		global $translations;

		// If translations haven't been processed, get them
		// This ensures we only hit the filesystem once per pageload
		if (is_null($translations)) {
			$translations = self::get_translations();
		}

		// Find the array key for the requested phrase
		$key = array_search($id, $translations['ID']);

		// Return the translated id
		return $translations[$config['language']][$key];

	}

}

/**
 * __
 *
 * Translates a string
 *
 * Uses the Translator model to get translations from CSV and populate an array
 * Array is global, and it only hits the filesystem once per pageload
 * Assumes the first row in CSV is IDs & subsequent rows are languages
 *
 * @param string $id ID for the string being translated
 * @return string Translated string
 */

function __($id) { return Translator::translate($id); }
