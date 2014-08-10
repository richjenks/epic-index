<?php

namespace RichJenks\Teepee;

session_start();

// Path to Teepee
define('TEEPEE_PATH', __DIR__.'/');

// Requires
require TEEPEE_PATH.'app/helpers/RequiresHelper.php';
RequiresHelper::get();

// URI to Teepee
define('TEEPEE_URI', URIHelper::dir_uri(__DIR__));

// Die if indexing self
if (TEEPEE_URI.'index.php' === URIHelper::get_uri()) {
	die ('Yo dawg I herd you like to list files so I listed the files in the file that lists files so you can list files in the file list.');
}

// Configuration options
global $config;

// Check for config file
if (file_exists(TEEPEE_PATH.'config.php')) {
	$config = require TEEPEE_PATH.'config.php';
} else {
	die('Couldn\'t find <code>config.php</code>; rename <code>config.sample.php</code> to <code>config.php</code> to fix!');
}

// Validate config
$config = ConfigHelper::check($config);

// Debug mode?
if ($config['debug_mode']) {
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
} else {
	ini_set('display_errors', '0');
}

// Notices global - defined here simply to document
global $notices;

// Update checker
new UpdateController;

// Authenticate
$auth = new AuthController;

// Authenticate?
if ($auth->pass()) {

	// Start
	$teepee = new DirectoryController;

}
