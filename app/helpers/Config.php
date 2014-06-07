<?php

/**
 * Config
 *
 * Static function for validating the config file
 * Also sets default values if given value is invalid
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.2.0
 */

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

		// Check all config vars
		self::check_vars($config);

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
	 * check_vars
	 *
	 * Checks config has a usable value
	 *
	 * @param array $config Array of settings
	 * @return void
	 */

	private static function check_vars($config) {

		// Check language
		if (!isset(self::$config['language']) || !in_array(self::$config['language'], self::$languages)) {
			self::$config['language'] = self::$defaults['language'];
		}

		// Check filesize precision
		if (!isset(self::$config['filesize_precision']) || !is_int(self::$config['filesize_precision'])) {
			self::$config['filesize_precision'] = self::$defaults['filesize_precision'];
		}

		// Check root_label
		if (!isset(self::$config['root_label'])) {
			self::$config['root_label'] = self::$defaults['root_label'];
		}

		// Check date_format
		if (!isset(self::$config['date_format'])) {
			self::$config['date_format'] = self::$defaults['date_format'];
		}

		// Check hover_info
		if (!isset(self::$config['hover_info']) || !is_bool($config['hover_info'])) {
			self::$config['hover_info'] = true;
		}

		// Check show_footer
		if (!isset(self::$config['show_footer']) || !is_bool($config['show_footer'])) {
			self::$config['show_footer'] = true;
		}

		// Check custom_links
		if (!isset(self::$config['custom_links']) || !is_array($config['custom_links'])) {
			self::$config['custom_links'] = array();
		}

	}

}