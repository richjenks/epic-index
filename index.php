<?php

namespace RichJenks\Teepee;

// Path to Teepee
define('TEEPEE_PATH', __DIR__.'/');

// Helper class
require TEEPEE_PATH.'app/Helper.php';

// URI to Teepee
define('TEEPEE_URI', dirname(Helper::file_uri(__FILE__)).'/');

// Die if indexing self
if (TEEPEE_URI.'index.php' === Helper::get_uri()) {
	die ('<script>console.log("Yo dawg I herd you like to list files so I listed the files in the file that lists files so you can list files in the file list.");</script>');
}

// Requires
require TEEPEE_PATH.'app/models/File.php';
require TEEPEE_PATH.'app/models/Dir.php';
require TEEPEE_PATH.'app/controllers/Controller.php';
require TEEPEE_PATH.'app/controllers/Teepee.php';

// Configuration options
global $config;
$config = require TEEPEE_PATH.'config.php';

// Start
$teepee = new Teepee;
