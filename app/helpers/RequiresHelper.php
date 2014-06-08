<?php

/**
 * RequiresHelper
 *
 * Static function requiring necessary files
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.3.0
 */

namespace RichJenks\Teepee;

class RequiresHelper {

	public static function get() {

		// Helpers
		require TEEPEE_PATH.'app/helpers/ConfigHelper.php';
		require TEEPEE_PATH.'app/helpers/DirectoryHelper.php';
		require TEEPEE_PATH.'app/helpers/URIHelper.php';
		require TEEPEE_PATH.'app/helpers/VariableHelper.php';

		// Libraries
		require TEEPEE_PATH.'app/libraries/Translator.php';

		// Controllers
		require TEEPEE_PATH.'app/controllers/Controller.php';
		require TEEPEE_PATH.'app/controllers/AuthController.php';
		require TEEPEE_PATH.'app/controllers/DirectoryController.php';

		// Models
		require TEEPEE_PATH.'app/models/Links.php';
		require TEEPEE_PATH.'app/models/Directory.php';
		require TEEPEE_PATH.'app/models/File.php';

	}

}