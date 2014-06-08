<?php

namespace RichJenks\Teepee;

// Path to Teepee
define('TEEPEE_PATH', __DIR__.'/');

// Requires
require TEEPEE_PATH.'app/helpers/RequiresHelper.php';
RequiresHelper::get();

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

// Debug mode?
if ($config['debug_mode']) {
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
} else {
	ini_set('display_errors', '0');
}

// Notices global
global $notices;

// Authenticate
$auth = new AuthController;

// Authenticate?
if ($auth->pass()) {

	// Start
	$teepee = new DirectoryController;

}
