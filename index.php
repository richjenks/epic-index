<?php

namespace RichJenks\Teepee;

// Path to Teepee
define('TEEPEE_PATH', __DIR__.'/');

// Helpers
require TEEPEE_PATH.'app/helpers/ConfigHelper.php';
require TEEPEE_PATH.'app/helpers/DirectoryHelper.php';
require TEEPEE_PATH.'app/helpers/URIHelper.php';
require TEEPEE_PATH.'app/helpers/VariableHelper.php';

// Libraries
require TEEPEE_PATH.'app/libraries/Translator.php';

// Controllers
require TEEPEE_PATH.'app/controllers/Controller.php';
require TEEPEE_PATH.'app/controllers/Auth.php';
require TEEPEE_PATH.'app/controllers/Teepee.php';

// Models
require TEEPEE_PATH.'app/models/Links.php';
require TEEPEE_PATH.'app/models/Dir.php';
require TEEPEE_PATH.'app/models/File.php';

// URI to Teepee
define('TEEPEE_URI', dirname(URIHelper::file_uri(__FILE__)).'/');

// Die if indexing self
if (TEEPEE_URI.'index.php' === URIHelper::get_uri()) {
	die ('Yo dawg I herd you like to list files so I listed the files in the file that lists files so you can list files in the file list.');
}


// Configuration options
global $config;
$config = require TEEPEE_PATH.'config.php';
$config = ConfigHelper::check($config);

// Authenticate
$auth = new Auth;

// Authenticate?
if ($auth->pass()) {

	// Start
	$teepee = new Teepee;

}
