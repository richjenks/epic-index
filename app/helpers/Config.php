<?php

namespace RichJenks\Teepee;

class Config {

	private static $config; // Config values
	private static $defaults; // Config default values
	private static $languages; // Enabled languages

	/**
	 * check_config
	 *
	 * Sanitises and validates global config array
	 * Ensures data is valid to prevent errors
	 *
	 * @param array $config Config multidimensional array
	 * @return aray The sanitised config array
	 */

	public static function check($config) {

		// Set this class' vars
		self::set_vars($config);

		// Check language
		if (!isset(self::$config['language'])) {
			self::$config['language'] = self::$defaults['language'];
		} else {
			self::$config['language'] = self::check_language(self::$config['language'], self::$defaults['language']);
		}

		// Check filesize precision
		if (!isset(self::$config['filesize_precision']) || !is_int(self::$config['filesize_precision'])) {
			self::$config['filesize_precision'] = 2;
		}

		return self::$config;

	}

	/**
	 * set_vars
	 *
	 * Set config, defaults & enabled languages for this class
	 *
	 * @param array $config Array of settings
	 * @return void
	 */

	private static function set_vars($config) {

		// Set config
		self::$config = $config;

		// Set config defaults
		self::$defaults = array(
			'language' => 'English',
			'filesize_precision' => 2,
			'root_label' => 'Home',
			'date_format' => '\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\> H:i\<\/\s\p\a\n\>',
			'hover_info' => true,
			'show_footer' => true,
			'custom_links' => array(),
		);

		// Set enabled languages
		self::$languages = array(
			'English',
			'Russian',
			'German',
			'Japanese',
			'Spanish',
			'French',
			'Chinese',
			'Portuguese',
			'Italian',
			'Polish',
		);

	}

	/**
	 * check_language
	 *
	 * Ensures the language config is valid
	 *
	 * @param string $language Language set in config
	 * @return string A valid language name
	 */

	private static function check_language($language, $default) {

		// Force title case
		$language = ucfirst(strtolower($language));

		// If language is invalid, default to English
		if (!in_array($language, self::$languages)) {
			return 'English';
		} else {
			return $language;
		}

	}

}