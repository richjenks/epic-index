<?php

/**
 * ConfigHelper
 *
 * Static function for validating the config file
 * Also sets default values if given value is invalid
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.2.0
 */

namespace RichJenks\Teepee;

class ConfigHelper {

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
			'filesize_precision'    => 2,
			'root_label'            => 'Home',
			'date_format'           => '\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\> H:i\<\/\s\p\a\n\>',
			'hover_info'            => true,
			'show_footer'           => true,
			'custom_links'          => array(),
			'language'              => 'English',
			'password'              => '',
			'timeout'               => 1800,
			'debug_mode'            => false,
			'transitions'           => false,
			'hide_dotfiles'         => false,
			'ignored_names'         => array(),
			'disable_update_checks' => false,

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
			self::$config['hover_info'] = self::$defaults['hover_info'];
		}

		// Check custom_links
		if (!isset(self::$config['custom_links']) || !is_array($config['custom_links'])) {
			self::$config['custom_links'] = self::$defaults['custom_links'];
		}

		// Check language
		if (!isset(self::$config['language']) || !in_array(self::$config['language'], self::$languages)) {
			self::$config['language'] = self::$defaults['language'];
		}

		// Check password
		if (!isset(self::$config['password']) || !is_string($config['password'])) {
			self::$config['password'] = self::$defaults['password'];
		}

		// Check timeout
		if (!isset(self::$config['timeout']) || !is_int($config['timeout'])) {
			self::$config['timeout'] = self::$defaults['timeout'];
		}

		// Check debug mode
		if (!isset(self::$config['debug_mode']) || !is_bool($config['debug_mode'])) {
			self::$config['debug_mode'] = self::$defaults['debug_mode'];
		}

		// Check transitions
		if (!isset(self::$config['transitions']) || !is_bool($config['transitions'])) {
			self::$config['transitions'] = self::$defaults['transitions'];
		}

		// Check hide dotfiles
		if (!isset(self::$config['hide_dotfiles']) || !is_bool($config['hide_dotfiles'])) {
			self::$config['hide_dotfiles'] = self::$defaults['hide_dotfiles'];
		}

		// Check ignored names
		if (!isset(self::$config['ignored_names']) || !is_array($config['ignored_names'])) {
			self::$config['ignored_names'] = self::$defaults['ignored_names'];
		}

		// Check disable update checks
		if (!isset(self::$config['disable_update_checks']) || !is_bool($config['disable_update_checks'])) {
			self::$config['disable_update_checks'] = self::$defaults['disable_update_checks'];
		}

	}

}