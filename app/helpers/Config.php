<?php

namespace RichJenks\Teepee;

class Config {

	/**
	 * check_config
	 *
	 * Sanitises and validates global config array
	 * Ensures data is valid to prevent errors
	 *
	 * @param array $config Config multidimensional array
	 * @return aray The sanitised config array
	 */

	public static function check_config($config) {

		$config['language'] = self::check_language($config['language']);

	}

	/**
	 * check_language
	 *
	 * Ensures the language config is valid
	 *
	 * @param string $language Language set in config
	 * @return string A valid language name
	 */

	private static function check_language($language) {

		// Force title case
		$language = ucfirst(strtolower($language));

		// Valid languages
		$languages = array(
			'English',
			'Polish',
			'Portuguese',
		);

		// If language is invalid, default to English
		if (!in_array($config['language'], $languages)) {
			return 'English';
		} else {
			return $language;
		}

	}

}