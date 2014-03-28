<?php

// Directories
$dir['root'] = $_SERVER['DOCUMENT_ROOT'];
$dir['path'] = $_SERVER['REQUEST_URI'];
$dir['queries'] = $_SERVER['QUERY_STRING'];

// Remove query string from path
$parts = explode('?', $dir['path']);
$dir['path'] = $parts[0];

// Full path to current location
$dir['full'] = $dir['root'].$dir['path'];

// Start table
$table = '<table>';

// Path as caption
$table .= '	<caption>'.$dir['path'].'</caption>';
// $parts = explode('/', $dir['path']);
// $parts = array_filter($parts);
// $table .= '	<caption>';
// $table .= '	/';
// foreach ($parts as $part) {
// 	$table .= $part.'/';
// }
// $table .= '</caption>';

// Columns
// $table .= '	<colgroup>';
// $table .= '		<col id="col-icon">';
// $table .= '		<col id="col-file">';
// $table .= '		<col id="col-size">';
// $table .= '		<col id="col-modified">';
// $table .= '	</colgroup>';

// Up link
// $table .= '	<thead>';
// $table .= '		<tr>';
// if ($dir['path'] !== '/') {
// 	$table .= '<th class="faded "><a href="../">Up</a></th>';
// } else {
// 	$table .= '<th class="faded "></th>';
// }

// Table head
$table .= '	<thead>';
$table .= '		<tr>';
$table .= '			<th class="faded smallcaps head-file">File</th>';
$table .= '			<th class="faded smallcaps head-size">Size</th>';
$table .= '			<th class="faded smallcaps head-modified">Modified</th>';
$table .= '		</tr>';
$table .= '	</thead>';
$table .= '	<tbody>';

// Get dir list & count
$items['all'] = scandir($dir['full']);
$count['all'] = count($items['all']) - 2;
$count['folders'] = $count['all'];
$count['files'] = $count['all'];

// Show "Parent" link
if ($dir['path'] !== '/') {

	$table .= '<tr>';
	$table .= '	<td class="faded col-file"><a href="../">Parent</a></td>';
	$table .= '	<td class="faded col-size"><a href="../">-</a></td>';
	$table .= '	<td class="faded col-modified"><a href="../">-</a></td>';
	$table .= '</tr>';

}

$items['folders'] = array();
$items['files'] = array();

// echo '<pre>';
// var_dump($items['all']);

// Split folders and files
foreach ($items['all'] as $item) {
	if ($item !== '.' && $item !== '..') {
		if (is_dir($dir['full'].$item)) {
			array_push($items['folders'], $item);
		} else {
			array_push($items['files'], $item);
		}
	}
}

// Show folders
foreach ($items['folders'] as $key => $folder) {

	// Get folder stats
	$stats = stat($dir['full'].$folder);
	
	$table .= '<tr>';

	$table .= '<td class="col-file"><a href="'.$folder.'">'.$folder.'</a></td>';
	$table .= ' <span class="faded">-</span>';
	$table .= '<td class="col-modified"><a href="'.$folder.'">'.date('\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d \<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>h:i\<\/\s\p\a\n\>', $stats['mtime']).'</a></td>';

	$table .= '</tr>';

}

// Show files
foreach ($items['files'] as $key => $file) {

	// Get file stats
	$stats = stat($dir['full'].$file);
	
	$table .= '<tr>';

	// Filename
	$table .= '<td class="col-file"><a href="'.$file.'">'.$file.'</a></td>';

	// Size
	if ($stats['size'] >= 1073741824) {
		$stats['size'] = $stats['size'] / 1024 / 1024 / 1024;
		$stats['size'] = round($stats['size'], 2);
	} elseif ($stats['size'] >= 1048576){
		$stats['size'] = $stats['size'] / 1024 / 1024;
		$stats['size'] = round($stats['size'], 2);
		$stats['size'] .= ' <span class="faded">MB</span>';
	} elseif ($stats['size'] >= 1024) {
		$stats['size'] = $stats['size'] / 1024;
		$stats['size'] = round($stats['size'], 2);
		$stats['size'] .= ' <span class="faded">KB</span>';
	} else {
		$stats['size'] .= ' <span class="faded">B</span>';
	}

	// Modified
	$table .= '<td class="col-modified"><a href="'.$file.'">'.date('\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d \<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>h:i\<\/\s\p\a\n\>', $stats['mtime']).'</a></td>';

	$table .= '</tr>';

}

// Show each file/folder
// foreach ($items['files'] as $key => $file) {

// 	$table .= '<tr>';
// 	$table .= '<td class="col-file"><a href="'.$file.'">'.$file.'</a></td>';

// 	$stats = stat($dir['full'].$file);

// 	if (is_dir($dir['full'].$file)) {
// 		$stats['size'] = 'dir';
// 	} else {

// 		// File size
// 		if ($stats['size'] >= 1073741824) {
// 			$stats['size'] = $stats['size'] / 1024 / 1024 / 1024;
// 			$stats['size'] = round($stats['size'], 2);
// 			$stats['size'] .= ' <span class="faded">GB</span>';
// 		} elseif ($stats['size'] >= 1048576){
// 			$stats['size'] = $stats['size'] / 1024 / 1024;
// 			$stats['size'] = round($stats['size'], 2);
// 			$stats['size'] .= ' <span class="faded">MB</span>';
// 		} elseif ($stats['size'] >= 1024) {
// 			$stats['size'] = $stats['size'] / 1024;
// 			$stats['size'] = round($stats['size'], 2);
// 			$stats['size'] .= ' <span class="faded">KB</span>';
// 		} else {
// 			$stats['size'] .= ' <span class="faded">B</span>';
// 		}
	
// 	}

// 	$table .= '<td class="col-size"><a href="'.$file.'">'.$stats['size'].'</a></td>';
	
// 	$table .= '<td class="col-modified"><a href="'.$file.'">'.date('\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\"\>D\<\/\s\p\a\n\> Y-m-d \<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\"\>h:i\<\/\s\p\a\n\>', $stats['mtime']).'</a></td>';

// 	$table .= '</tr>';

// }

// Close table
$table .= '	</tbody>';
$table .= '</table>';

?><!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?=$dir['path'];?></title>
		<link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<link href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQEAYAAABPYyMiAAAABmJLR0T///////8JWPfcAAAACXBIWXMAAABIAAAASABGyWs+AAAAF0lEQVRIx2NgGAWjYBSMglEwCkbBSAcACBAAAeaR9cIAAAAASUVORK5CYII=" rel="icon" type="image/x-icon">
		<style>
			*, *:before, *:after {
				-webkit-box-sizing: border-box;
				-moz-box-sizing:    border-box;
				box-sizing:         border-box;
			}
			body {
				font-family: Raleway, 'Helvetica Nueue', Helvetica, Arial, sans-serif;
				font-size: 1.1em;
				background: #e5e5e5;
				color: #555;
				padding: 1.6em;
				word-wrap: break-word
			}
			.wrapper {
				max-width: 40em;
				margin: 0 auto;
				background: white;
				padding: 1.6em;
				border-radius: 3px;
				border: 1px solid #ccc;
				box-shadow: 0 2px 2px rgba(0,0,0,.1);
			}
			a {
				color: #555;
				text-decoration: none;
			}
			h1 {
				margin: 0;
				margin-bottom: 1em;
			}
			table {
				width: 100%;
				border-collapse: collapse;
			}
			caption {
				text-align: left;
				font-size: 1.6em;
				margin-bottom: .8em;
			}
			tbody tr {
				border-bottom: 1px solid #eee;
			}
			tr:hover td {
				background: #f7f7f7;
			}
			th {
				/*padding: 0 .5em;*/
				text-align: left;
				text-transform: uppercase;
			}
			th {
				font-weight: normal;
			}
			table a {
				padding: 0 .5em;
				display: block;
				padding: .6em 0;
			}
			.summary {
				margin-top: 1.6em;
				color: #aaa;
				text-align: center;
				font-size: .8em;
			}
			.faded {
				color: #aaa;
			}
			.smallcaps {
				font-size: .7em;
				text-transform: uppercase;
			}
			@media all and (max-width: 30em) {
				.col-modified,
				.head-modified {
					display: none;
				}
			}
			@media all and (max-width: 20em) {
				.col-size,
				.head-size {
					display: none;
				}
			}
		</style>
	</head>
	<body>
		<div class="wrapper">
			<?=$table;?>
			<section class="summary"><?=$count['folders'];?> Folders | <?=$count['files'];?> Files</section>
		</div>
	</body>
</html>