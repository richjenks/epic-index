<?php

// Directories
$dir['root'] = $_SERVER['DOCUMENT_ROOT'];
$dir['path'] = $_SERVER['REQUEST_URI'];
$dir['queries'] = $_SERVER['QUERY_STRING'];

// Remove query string from path
// $dir['path'] = str_replace($dir['queries'], '', $dir['path']);
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

// Table head
$table .= '	<thead>';
$table .= '		<tr>';
if ($dir['path'] !== '/') {
	$table .= '<th><a href="../">Up</a></th>';
} else {
	$table .= '<th></th>';
}
// $table .= '			<th class="head-file">File</th>';
$table .= '			<th class="head-size">Size</th>';
$table .= '			<th class="head-modified">Modified</th>';
$table .= '		</tr>';
$table .= '	</thead>';
$table .= '	<tbody>';

// Get dir list & count
$files = scandir($dir['full']);
$count = count($files) - 2;

// Show "Parent" link
// if ($dir['path'] !== '/') {

// 	$table .= '<tr>';
// 	$table .= '	<td></td>';
// 	$table .= '	<td><a href="../">Parent</a></td>';
// 	$table .= '	<td></td>';
// 	$table .= '	<td></td>';
// 	$table .= '</tr>';

// }

// Show each file/folder
foreach ($files as $key => $file) {

	if ($file !== '.' && $file !== '..') {

		$table .= '<tr>';
		// $table .= '<td class="col-icon">i</td>';
		$table .= '<td class="col-file"><a href="'.$file.'">'.$file.'</a></td>';

		$stats = stat($dir['full'].$file);

		if (is_file($file)) {
			$stats['size'] = 'file';
		} else {

			// File size
			$stats['size'] = 'dir';
			// if ($stats['size'] > 1073741824) {
			// 	$stats['size'] = $stats['size'] / 1024 / 1024 / 1024;
			// 	$stats['size'] = substr($stats['size'], 0, 4);
			// 	$stats['size'] .= ' <span class="faded">GB</span>';
			// } elseif ($stats['size'] > 1048576){
			// 	$stats['size'] = $stats['size'] / 1024 / 1024;
			// 	$stats['size'] = substr($stats['size'], 0, 4);
			// 	$stats['size'] .= ' <span class="faded">GB</span>';
			// } elseif ($stats['size'] > 1024) {
			// 	$stats['size'] = $stats['size'] / 1024;
			// 	$stats['size'] = substr($stats['size'], 0, 4);
			// 	$stats['size'] .= ' <span class="faded">KB</span>';
			// } else {
			// 	$stats['size'] .= ' <span class="faded">B</span>';
			// }
		
		}

		$table .= '<td class="col-size">'.$stats['size'].'</td>';
		
		$table .= '<td class="col-modified">'.date('\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\"\>D\<\/\s\p\a\n\> Y-m-d', $stats['mtime']).'</td>';

		$table .= '</tr>';
		
	}

}

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
				padding: 1.6em;
				word-wrap: break-word
			}
			a,
			body {
				color: #555;
			}
			a {
				text-decoration: none;
			}
			a:hover {
				text-decoration: underline;
				color: #555;
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
			tr:nth-child(even) td {
				background: #f6f6f6;
			}
			tr:hover td {
				background: #eee;
			}
			th,
			td {
				padding: 0 .5em;
				text-align: left;
			}
			th {
				font-size: .8em;
				font-weight: normal;
			}
			th,
			th a {
				color: #aaa;
			}
			td:first-child {
				border-radius: 3px 0 0 3px;
			}
			td:last-child {
				border-radius: 0 3px 3px 0;
			}
			table a {
				display: inline-block;
				padding: .5em 0;
			}
			.summary {
				margin-top: 1.6em;
				color: #aaa;
				text-align: center;
				font-size: .8em;
			}
			.faded {
				color: #aaa;
				text-transform: uppercase;
				font-size: .6em;
			}
			@media all and (max-width: 40em) {
				.col-modified,
				.head-modified {
					display: none;
				}
			}
			@media all and (max-width: 35em) {
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
			<section class="summary"><?=$count;?> items</section>
		</div>
	</body>
</html>