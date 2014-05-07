<?php

// Path to Teepee
define('TEEPEE_PATH', '/home/rich/Dropbox/Dev/php/resources/teepee/');

// URI to Teepee
define('TEEPEE_URI', 'http://localhost/resources/teepee/');

// Requires
require TEEPEE_PATH.'app/Helper.php';
require TEEPEE_PATH.'app/models/File.php';
require TEEPEE_PATH.'app/models/Dir.php';
require TEEPEE_PATH.'app/controllers/Teepee.php';

// Start
$teepee = new Teepee;

// Testing
// echo $teepee->get_request();
// require TEEPEE.'app/views/Teepee.php';
// echo $teepee->get_teepee_uri();