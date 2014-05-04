<?php

// Path to Teepee
define('TEEPEE', '/home/rich/Dropbox/Dev/php/resources/teepee/');

// Requires
require TEEPEE.'app/Helper.php';
require TEEPEE.'app/models/File.php';
require TEEPEE.'app/models/Dir.php';
require TEEPEE.'app/controllers/Teepee.php';

// Start
$teepee = new Teepee;

// Testing
// echo $teepee->get_request();
// require TEEPEE.'app/views/Teepee.php';
// echo $teepee->get_teepee_uri();