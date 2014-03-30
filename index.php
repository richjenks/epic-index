<?php

// Directories
$dir['root'] = $_SERVER['DOCUMENT_ROOT'];
$dir['path'] = $_SERVER['REQUEST_URI'];
$dir['queries'] = $_SERVER['QUERY_STRING'];
$dir['host'] = $_SERVER['HTTP_HOST'];

// Remove query string from path
$parts = explode('?', $dir['path']);
$dir['path'] = $parts[0];

// Construct full URL
$dir['url'] = $dir['host'].$dir['path'];

// Full path to current location
$dir['full'] = $dir['root'].$dir['path'];

// Icons
$icons['code'] = '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAHGSURBVDiNlZLPSlthEMV/98t3c4PBXJtbSCEg2RQkNN34DC5cuOgL+BT1LXwAX6R7CegmReE2tHAjKsQ/pCuDBsn3504XMTeNLaUZmMUMZ86cOUzQ6/V2nHOHeZ5/ZIVQSqVa689Bt9tNW61Wp9FooJT6r+E8zxmNRlxfX3/TxphOkiQYY1YRQJIkZFnW0d57vPcrDQPM57RzDhF5pVFABQAEE0NgPXmtUvTm4ZxDWWsRkSLLJ1eou3FRV758R/fvUXdjyidXS1hrLcp7XzSi7iXh+S2+vjZT9WzRP0aYdgNfXyM8vyXqXhZ47z1qfkJ0fEF4NuRxf5s8KiEihP17/NsqPq6QRyUe97cJz4ZExxeICM65hQfB0xQBpBQUnoRfh5jOu4VHpQCBGfaFoFAw2d3Cbm6wfnQKU0cwfkZnP5nOCaaO9aNT7OYGk92tPwlEhMleG9uMUTcPlHtDbKuOr5YREdTNA7YZM9lrF/ilE+bx9OkDgfWIVovtgGvWsK038Bv2rwQAohV5s/ZSSNHjFa4gsNaitV7pE51zMw+01lmaphhjlp7kX2mMIU1TtNaZrlarB4PB4LDf779fRUEURYM4jg9+AY0DZ4cpAUR4AAAAAElFTkSuQmCC" class="icon">';
$icons['file'] = '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFMSURBVDiNlZA9isJAFMd/hgcWFhZRJFNoLLZ0a7XfStDLrLfwMAqewEILu6xV0lgpgieYj2SbTdhs4qIPhhmG/+drHI/HD2vtKk3Td14Yz/MiEfls7Ha7KAzDUa/Xw/O8p8hpmnK73Tifz1+itR75vo/W+pUA+L5PHMcjcc7hnHuJDJDzxFpLlmUArNdrut1uAVJKcblcSm+lFMPhEABrLWKMKQQWi0XFKQzDyjvHG2MQ51zxsdlsAIoUSimAwjlPM51OixqlCvP5vLbvYDAo3TneWlsW2O/3JadHu8irVAQmk0nJqS7FvwkOh0OJdL/fAeh0OgAEQQDwOMF4PK7dwd95mGC73VbcrtcrQRDU1ioEjDGICLPZrALq9/sl199kay2eiMRRFKG1Jsuyp47WmiiKEJFYWq3WMkmS1el0entqAT/TbDaTdru9/AbO//fVB3FwJQAAAABJRU5ErkJggg==" class="icon">';
$icons['folder'] = '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAEISURBVDiNrZGxSgNREEXPCw/S7EZIZWelYqFlvsDKQhC0ssoPmCIfYG1hoWCXP7C3Si+ksBJEtBHE2JhgdgvNm5lnIQYkuLAbb3/vnHvHxRjpdbYugX1+62qpaXsHx7dTCuRixPU6m7a2voFzNQBijAxfnsnzLAA2Z4JYr/v+4cnNrru+2DlrrG4fNZdXig7NafT6xOShf+6DWjtJEj7eh6UCkiThTa3tg2gaPvNSZgCVKUE09aKGSSgdACBq+CCKVgwIongRw6TwU38TyA+BLkAQRCtvMKtQdYNZhaobfBPoAgRq/7CBig3G41GrkaalzJMsQ8UGPljs3t0/nkZolQlwMKBW634BV/GiU2qcKJgAAAAASUVORK5CYII=" class="icon">';
$icons['image'] = '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAIcSURBVDiNlZJNTlNhGIWf9+v9bi8FqnANjVHToCE6ANbgxGUYN8EiTGQJrsC4AgdOGOgABkCjicVII1qr/LS0vbf9fh1gwszQd36enPOeI7u7u8+MMdsxxk1mOBE5SNN0S3Z2dg6azeZGo9FAKXUjcQiBXq9Hp9M5TIwxG3meY4yZxQB5ntNutzcS5xzv9g95/votsVYhaoVMPTJ2SBmQSUAmEWVALIgXAN68eoFzjsQ5R3cwYPl+E5nXBC1MLwvi0JBahSojYWShDIgVlFeIwFl/zLxyJNZaVK1G404DVdUEAk47wnyAiUcM6GmkPC9JKxlZrYZSglRTbGGvHFSU5unjR3y6GLOgFRdjQ6xFcIJYoWYD7rYnRE1taZEs04j2VxG89yhV4ecQ1u+tcNIfczeZp55ozieRlVRzfDxgablKVCmrj5aIaQLSxXuPcs5BgBgjE+tQUVitz/HroqQYTOn1CvIsJUOhBUZDQ7c3Rny8fqLygcuzEeNRSXCBD51z/NTjho5CKnQLjy0cWX2O3u8qIkK4lV0DEufon5xSSROCD5ixYTIo8YVFoQg2XpV/BhWdXAE2Hl4DqlPLny8/ULpC9AFTTHCl+++QnH1wDWjkdU6/fZ1piSv5Iv3uvxY2nzT5/v7lTIDhcMjn/Y8kSqn23t7e2vr6OlrrG4mttbRaLZRS7WRhYWHr6Ohou9Vqrc3iIMuydr1e3/oLlTAupOJParwAAAAASUVORK5CYII=" class="icon">';
$icons['parent'] = '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAFrSURBVDiNpZO9SgNBFIW/2Y0jZmJIAhZBbYQV3EJSWfkIWyr4Fj6BxeIT2IrvsO9gK6Sws7GIsBCLLYITjWH3WrjKZjNRxAOX+Tv3DPfMHSUi/AeNH84UsA0IkJbjErwfBLpBEJwEQXAKdFeyRMQVa0mSDJRSQ6XUMEmSgYisubirBHaMMTfAHXBnjLkRkR0X11XCZhRFR9baAfACvFhrB1EUHQGbS0bVXsGbTCZ7vV7vKs9zv2Kc8n0/z7LsvN1uPwLFKhO3wjA8K5NfgbcyXvM898MwPAO2Fm6szDfiOA7SND0GslKgGlmapsdxHAfAhquEXWPMxXQ6XQdyhzcAfrPZnFlrL4EnWGyk9/F4PPQ8T+bzOZ1O57Caaa29ByiKQgHvX/tVgXGr1boGGI1GB8B+VaDRaNxqrR/K5beJ9VYuAESk4NO8b8xms0JrXdT47r+gtRY+jfsVToF+v29F5Lm2PXVx6430Z3wAjCvJuVs9SfYAAAAASUVORK5CYII=" class="icon">';

// Title & breadcrumbs
$title = '<h1>';
$parts = explode('/', $dir['url']);
$parts = array_filter($parts);
$parts = array_reverse($parts);
$count = count($parts) - 1;
for ($i = $count; $i >= 0; $i--) {
	if ($i !== 0) {
		$title .= '<a href="';
		for ($i2 = 0; $i2 < $i; $i2++) {
			$title .= '../';
		}
		$title .= '">';
		$title .= $parts[$i];
		$title .= '</a>';
		$title .= '/';
	} else {
		$title .= '<b>'.$parts[$i].'</b>/';
	}
}
// for ($i = $count; $i >= 0; $i--) {
// 	$title .= '<a href="';
// 	for ($i2 = 0; $i2 < $i; $i2++) {
// 		$title .= '../';
// 	}
// 	$title .= '">';
// 	$title .= $parts[$i];
// 	$title .= '</a>';
// 	$title .= '/';
// }
$title .= '</h1>';

// Start table
$table = '<table>';

// Table head
$table .= '	<thead>';
$table .= '		<tr>';
$table .= '			<th></th>';
$table .= '			<th class="faded smallcaps head-file">File</th>';
$table .= '			<th class="faded smallcaps head-size">Size</th>';
$table .= '			<th class="faded smallcaps head-modified">Modified</th>';
$table .= '		</tr>';
$table .= '	</thead>';
$table .= '	<tbody>';

// Get dir list
$items['all'] = array_diff(scandir($dir['full']), array('..', '.'));

// Show "Parent" link
if ($dir['path'] !== '/') {

	$table .= '<tr>';
	$table .= '	<td class="col-file"><a href="../">'.$icons['parent'].'</a></td>';
	$table .= '	<td class="col-file"><a href="../" class="faded">Parent</a></td>';
	$table .= '	<td class="col-size"><a href="../"></a></td>';
	$table .= '	<td class="col-modified"><a href="../"></a></td>';
	$table .= '</tr>';

}

// Folders and Files arrays
$items['folders'] = array();
$items['files'] = array();

// Split folders and files
foreach ($items['all'] as $item) {
	if (is_dir($dir['full'].$item)) {
		array_push($items['folders'], $item);
	} else {
		array_push($items['files'], $item);
	}
}

// Count folders and files
$count = array();
$count['folders'] = count($items['folders']);
$count['files'] = count($items['files']);

// Show folders
foreach ($items['folders'] as $key => $folder) {
	
	$table .= '<tr>';

		// Get folder stats
		$stats = stat($dir['full'].$folder);

		// Icon
		$table .= '<td class="col-icon"><a href="'.$folder.'">'.$icons['folder'].'</a></td>';

		// Folder name
		$table .= '<td class="col-file"><a href="'.$folder.'">'.$folder.'</a></td>';

		// Child count
		$items['children'] = array_diff(scandir($dir['full'].'/'.$folder), array('..', '.'));
		$size = count($items['children']);
		if ($size === 1) {
			$file_s = 'File';
		} else {
			$file_s = 'Files';
		}
		$table .= '<td class="col-size"><a href="'.$folder.'">'.$size.' <span class="faded smallcaps">'.$file_s.'</span></a></td>';

		// Modified
		$table .= '<td class="col-modified"><a href="'.$folder.'">'.date('\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d \<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>h:i\<\/\s\p\a\n\>', $stats['mtime']).'</a></td>';

	$table .= '</tr>';

}

// Show files
foreach ($items['files'] as $key => $file) {
	
	$table .= '<tr>';

		// Get file stats
		$stats = stat($dir['full'].$file);

		// Icon
		$parts = explode('.', $file);
		$filetype = end($parts);
		switch ($filetype) {
			case 'bmp':
			case 'png':
			case 'psd':
			case 'gif':
			case 'jpg':
			case 'jpeg':
				$icon = $icons['image'];
				break;
			
			case 'html':
			case 'css':
			case 'php':
			case 'py':
			case 'rb':
			case 'asp':
			case 'aspx':
			case 'jsp':
			case 'do':
			case 'action':
			case 'js':
			case 'pl':
			case 'xml':
			case 'rss':
			case 'svg':
			case 'cgi':
			case 'dll':
			case 'htaccess':
				$icon = $icons['code'];
				break;

			default:
				$icon = $icons['file'];
				break;
		}
		$table .= '<td class="col-icon"><a href="'.$file.'">'.$icon.'</a></td>';

		// File name
		$table .= '<td class="col-file"><a href="'.$file.'">'.$file.'</a></td>';

		// Size
		if ($stats['size'] >= 1073741824) {
			$stats['size'] = $stats['size'] / 1024 / 1024 / 1024;
			$stats['size'] = round($stats['size'], 2);
			$stats['size'] .= ' <span class="faded smallcaps">GB</span>';
		} elseif ($stats['size'] >= 1048576){
			$stats['size'] = $stats['size'] / 1024 / 1024;
			$stats['size'] = round($stats['size'], 2);
			$stats['size'] .= ' <span class="faded smallcaps">MB</span>';
		} elseif ($stats['size'] >= 1024) {
			$stats['size'] = $stats['size'] / 1024;
			$stats['size'] = round($stats['size'], 2);
			$stats['size'] .= ' <span class="faded smallcaps">KB</span>';
		} else {
			$stats['size'] .= ' <span class="faded smallcaps">B</span>';
		}
		$table .= '<td class="col-size"><a href="'.$file.'">'.$stats['size'].'</a></td>';

		// Modified
		$table .= '<td class="col-modified"><a href="'.$file.'">'.date('\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d \<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>h:i\<\/\s\p\a\n\>', $stats['mtime']).'</a></td>';

	$table .= '</tr>';

}

// Close table
$table .= '	</tbody>';
$table .= '</table>';

// Summary
// if ($count['folders'] === 1) {
// 	$folder_s = 'Folder';
// } else {
// 	$folder_s = 'Folders';
// }
// if ($count['files'] === 1) {
// 	$file_s = 'File';
// } else {
// 	$file_s = 'Files';
// }
// $summary = '<section class="summary faded smallcaps">'.$count['folders'].' '.$folder_s.' | '.$count['files'].' '.$file_s.'</section>';

// Folder summary
if ($count['folders'] > 0) {

	// Singular or plural?
	if ($count['folders'] === 1) {
		$folder_s = 'Folder';
	} else {
		$folder_s = 'Folders';
	}

	$summaries['folders'] = $count['folders'].' '.$folder_s;

}

// File summary
if ($count['files'] > 0) {

	// Singular or plural?
	if ($count['files'] === 1) {
		$file_s = 'File';
	} else {
		$file_s = 'Files';
	}

	$summaries['files'] = $count['files'].' '.$file_s;

}

// Construct summary
$summary = '<section class="summary faded smallcaps">';
if (isset($summaries['folders']) && isset($summaries['files'])) {
	$summary .= $summaries['folders'].' | '.$summaries['files'];
} elseif (isset($summaries['folders'])) {
	$summary .= $summaries['folders'];
} elseif (isset($summaries['files'])) {
	$summary .= $summaries['files'];
}
$summary .= '</section>';
// '<section class="summary faded smallcaps">'.$count['folders'].' '.$folder_s.' | '.$count['files'].' '.$file_s.'</section>';

?><!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?=$dir['url'];?></title>
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

			html, html a {
				-webkit-font-smoothing: antialiased;
				text-shadow: 1px 1px 1px rgba(0,0,0,0.004);
			}

			html {
				overflow-y: scroll;
			}

			body {
				font-family: Raleway, Ubuntu, 'Helvetica Nueue', Helvetica, Arial, sans-serif;
				font-size: 1.1em;
				background: #e5e5e5;
				color: #555;
				padding: 1.6em;
				word-wrap: break-word;
			}

			.wrapper {
				max-width: 50em;
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
				font-size: 1.6em;
				font-weight: normal;
				margin-bottom: .5em;
			}

			h1 a:hover {
				color: inherit;
				text-decoration: none;
				background: -webkit-gradient(linear, 0 0, 0 100%, from(white), to(white));
				background: -webkit-linear-gradient(white, white);
				background: -moz-linear-gradient(white, white);
				background: -o-linear-gradient(white, white);
				background: linear-gradient(white, white), -webkit-linear-gradient(white, white), -webkit-linear-gradient(#333332, #333332);
				background-size: 0.05em 1px, 0.05em 1px, 1px 1px;
				background-repeat: no-repeat, no-repeat, repeat-x;
				text-shadow: 0.03em 0 white, -0.03em 0 white, 0 0.03em white, 0 -0.03em white, 0.06em 0 white, -0.06em 0 white, 0.09em 0 white, -0.09em 0 white, 0.12em 0 white, -0.12em 0 white, 0.15em 0 white, -0.15em 0 white;
				background-position-y: 90%, 90%, 90%;
				background-position-x: 0%, 100%, 0%;
			}

			table {
				width: 100%;
				border-collapse: collapse;
			}

			tbody tr {
				border-bottom: 1px solid #eee;
			}

			tr:hover td {
				background: #f7f7f7;
				background: #e5e5e5;
			}

			th {
				text-align: left;
				font-weight: normal;
			}

			th,
			table a {
				padding: .5em 10px;
			}

			table a {
				display: block;
			}

			.summary {
				margin-top: 1.6em;
				text-align: center;
			}

			.faded {
				color: #999;
			}

			.smallcaps {
				font-size: .7em;
				text-transform: uppercase;
				letter-spacing: .1em;
			}

			.icon {
				position: relative;
				top: 2px;
			}

			.col-icon {
				width: 1px;
			}

			.col-size,
			.col-modified,
			.head-size,
			.head-modified {
				text-align: right;
			}

			.col-size,
			.col-modified {
				width: 1px;
				white-space: nowrap;
			}

			/*.col-file {
				max-width: 100%;
			}

			.col-size {
				max-width: 1em;
			}

			.col-modified {
				max-width: 1em;
			}*/

			/* More padding on large screens */
			@media all and (min-width: 1023px) {

				body {
					padding: 2.6em;
				}

				.wrapper {
					padding: 2.6em;
				}

				h1 {
					margin-bottom: 1em;
				}

				.summary {
					margin-top: 3em;
				}

			}

			/* Less padding on small screens */
			@media all and (max-width: 767px) {

				body {
					padding: .5em;
				}

				.wrapper {
					padding: 1em;
				}

				h1 {
					margin-bottom: .3em;
				}

				.summary {
					margin-top: 1.2em;
				}

			}

			/* Hide "Modified" column */
			@media all and (max-width: 30em) {
				.col-modified,
				.head-modified {
					display: none;
				}
			}

			/* Hide "Size" column */
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
			<?=$title;?>
			<?=$table;?>
			<?=$summary;?>
		</div>
	</body>
</html>
