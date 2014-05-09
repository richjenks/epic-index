<?php

// Path to Teepee
define('TEEPEE_PATH', __DIR__.'/');

// Requires
require TEEPEE_PATH.'app/Helper.php';
require TEEPEE_PATH.'app/models/File.php';
require TEEPEE_PATH.'app/models/Dir.php';
require TEEPEE_PATH.'app/controllers/Controller.php';
require TEEPEE_PATH.'app/controllers/Teepee.php';
require TEEPEE_PATH.'config.php';

// URI to Teepee
define('TEEPEE_URI', dirname(RichJenks\Teepee\Helper::file_uri(__FILE__)).'/');

// Start
$teepee = new RichJenks\Teepee\Teepee;
