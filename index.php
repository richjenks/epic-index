<?php

// Path to Teepee from webroot
define('TEEPEE', '/resources/teepee/');

// Required files
require 'includes/helper.class.php';
require 'includes/dir.class.php';
require 'includes/file.class.php';

$dir = new Dir;

require 'template/header.php';
echo $dir->breadcrumbs();
echo $dir->list_children();
echo $dir->summary();
require 'template/footer.html';
