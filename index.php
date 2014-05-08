<?php

// Path to Teepee
define('TEEPEE_PATH', __DIR__.'/');

// Requires
require TEEPEE_PATH.'app/Helper.php';
require TEEPEE_PATH.'app/models/File.php';
require TEEPEE_PATH.'app/models/Dir.php';
require TEEPEE_PATH.'app/controllers/Teepee.php';

// URI to Teepee
define('TEEPEE_URI', dirname(Helper::file_uri(__FILE__)).'/');

// Start
$teepee = new Teepee;
