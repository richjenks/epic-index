<?php

// Path to Teepee
define('TEEPEE_PATH', __DIR__.'/');

// Requires
require TEEPEE_PATH.'app/Helper.php';
require TEEPEE_PATH.'app/models/File.php';
require TEEPEE_PATH.'app/models/Dir.php';
require TEEPEE_PATH.'app/controllers/Controller.php';
require TEEPEE_PATH.'app/controllers/Teepee.php';

// URI to Teepee
define('TEEPEE_URI', dirname(RichJenks\Teepee\Helper::file_uri(__FILE__)).'/');

// Configuration options
global $config;
$config = require TEEPEE_PATH.'config.php';

// Start
$teepee = new RichJenks\Teepee\Teepee;
