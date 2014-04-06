<?php

// Path to Teepee from webroot
define('TEEPEE', '/resources/teepee/');

// Required files
require 'helper.class.php';
require 'dir.class.php';
require 'file.class.php';

$dir = new Dir;
$dir->list_folders();