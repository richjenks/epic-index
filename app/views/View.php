<?php namespace RichJenks\Teepee;?>
<?php global $config;?>
<?php require TEEPEE_PATH.'app/views/_header.php';?>
<h1 class="breadcrumbs"><?=$data['breadcrumbs']?></h1>
<table>
	<thead>
		<tr>
			<th class="faded smallcaps col-name"><?=__('name')?></th>
			<th class="faded smallcaps col-size"><?=__('size')?></th>
			<th class="faded smallcaps col-modified"><?=__('modified')?></th>
		</tr>
	</thead>
	<tbody>

		<?php

			/*
			|--------------------------------------------------------------------------
			| Parent
			|--------------------------------------------------------------------------
			|
			| Render a row for the parent link, if set
			|
			*/

			if ($data['parent']) {

				// Set row array
				$row = $data['parent'];

				// If faded, add faded class
				$row['classes'] = ($row['faded'] ? 'faded' : '');

				// If new, add target attr
				$row['target'] = (isset($row['new']) && $row['new'] ? ' target="_blank"' : '');

				// Format modified date
				$row['modified'] = date($config['date_format'], $row['modified']);

				// Check if title should show
				if ($config['hover_info']) {

					// Construct title attr
					$row['title'] = strip_tags($row['size']).' | '.strip_tags($row['modified']);

				} else {
					$row['title'] = '';
				}


				// Render the row
				include TEEPEE_PATH.'app/views/_row.php';

			}

			/*
			|--------------------------------------------------------------------------
			| Links
			|--------------------------------------------------------------------------
			|
			| Render a row for each custom link
			|
			*/

			foreach ($data['links'] as $row) {

				// If faded, add faded class
				$row['classes'] = ($row['faded'] ? 'faded' : '');

				// If new, add target attr
				$row['target'] = (isset($row['new']) && $row['new'] ? ' target="_blank"' : '');

				// Check if title should show
				if ($config['hover_info']) {

					// Construct title attr
					$row['title'] = $row['uri'];

				} else {
					$row['title'] = '';
				}

				// Render the row
				include TEEPEE_PATH.'app/views/_row.php';

			}

			/*
			|--------------------------------------------------------------------------
			| Folders
			|--------------------------------------------------------------------------
			|
			| Render a row for each folder
			|
			*/

			// Loop through each folder
			foreach ($data['folders'] as $row) {

				// If faded, add faded class
				$row['classes'] = ($row['faded'] ? 'faded' : '');

				// If new, add target attr
				$row['target'] = (isset($row['new']) && $row['new'] ? ' target="_blank"' : '');

				// Format modified date
				$row['modified'] = date($config['date_format'], $row['modified']);

				// Check if title should show
				if ($config['hover_info']) {

					// Construct title attr
					$row['title'] = strip_tags($row['size']).' | '.strip_tags($row['modified']);

				} else {
					$row['title'] = '';
				}

				// If folder starts with dot, fade the filename
				if (substr($row['name'], 0, 1) === '.') {
					$row['name'] = '<span class="faded">'.$row['name'].'</span>';
				}

				// If root, change name & icon
				if ($row['uri'] === '/') {
					$row['name'] = $config['root_label'];
					$row['icon'] = 'folder-home';
				}

				// Get file's icon name
				$row['icon'] = Helper::get_icon($row['icon']);

				// Render the row
				include TEEPEE_PATH.'app/views/_row.php';

			}

			/*
			|--------------------------------------------------------------------------
			| Files
			|--------------------------------------------------------------------------
			|
			| Render a row for each file
			|
			*/

			// Loop through each file
			foreach ($data['files'] as $row) {

				// Prevent _row partial throwing error—refactor this!!!
				$row['classes'] = '';

				// If new, add target attr
				$row['target'] = (isset($row['new']) && $row['new'] ? ' target="_blank"' : '');

				// Format modified date
				$row['modified'] = date($config['date_format'], $row['modified']);

				// Check if title should show
				if ($config['hover_info']) {

					// Construct title attr
					$row['title'] = strip_tags($row['size']).' | '.strip_tags($row['modified']);

				} else {
					$row['title'] = '';
				}

				// Get file's icon name
				$row['icon'] = Helper::get_icon($row['ext']);

				// Construct file.extension
				$row['name'] = $row['name'].'<span class="faded">.'.$row['ext'].'</span>';

				// Render the row
				include TEEPEE_PATH.'app/views/_row.php';

			}

		?>

	</tbody>
</table>
<section class="summary faded smallcaps"><?=$data['summary']?></section>
<?php require TEEPEE_PATH.'app/views/_footer.php';?>