<?php

/**
 * AppHelper
 *
 * Functions related to Teepee core
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.4.0
 */

namespace RichJenks\Teepee;

class AppHelper {

	/**
	 * get_version
	 *
	 * @since 1.4.0
	 *
	 * @return string Teepee's current version, from `version` file
	 */

	public static function get_version() {
		return (file_exists(TEEPEE_PATH.'/version')) ? file_get_contents(TEEPEE_PATH.'/version') : '';
	}

}