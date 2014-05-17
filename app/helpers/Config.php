<?php

namespace RichJenks\Teepee;

class Config {

	private $languages; // Available languages

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

		$config = self::check_language();

	}

	private static check_language($language) {

		$this-> languages = array(
			'English',
			'Polish',
			'Portuguese',
		);

		if (!in_array($config['language'], $this->languages)) {
			return 'English';
		} else {
			return $language;
		}

	}

}