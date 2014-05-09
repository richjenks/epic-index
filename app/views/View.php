<?php require TEEPEE_PATH.'app/views/_header.php';?>
<h1 class="breadcrumbs"><?=$data['breadcrumbs']?></h1>
<table>
	<thead>
		<tr>
			<th class="faded smallcaps col-file">File</th>
			<th class="faded smallcaps col-size">Size</th>
			<th class="faded smallcaps col-modified">Modified</th>
		</tr>
	</thead>
	<tbody>

		<?php

			// Loop through each item
			foreach ($data['folders'] as $item) {

				// If faded, add faded class
				$classes = ($item['faded'] ? 'faded' : '');

				// If folder starts with dot, fade the filename
				if (substr($item['name'], 0, 1) === '.') {
					$item['name'] = '<span class="faded">'.$item['name'].'</span>';
				}

				// If root, change name & icon
				if ($item['uri'] === '/') {
					$item['name'] = 'Root';
					$item['icon'] = 'folder-home';
				}

				// Get file's icon name
				$item['icon'] = RichJenks\Teepee\Helper::get_icon($item['icon']);

				// Render the row
				include TEEPEE_PATH.'app/views/_row.php';
			
			}

			// Loop through each file
			foreach ($data['files'] as $item) {

				// Get file's icon name
				$item['icon'] = RichJenks\Teepee\Helper::get_icon($item['ext']);

				// Construct file.extension
				$item['name'] = $item['name'].'<span class="faded">.'.$item['ext'].'</span>';

				// Render the row
				include TEEPEE_PATH.'app/views/_row.php';

			}

		?>

	</tbody>
</table>
<section class="summary faded smallcaps"><?=$data['summary']?></section>
<?php require TEEPEE_PATH.'app/views/_footer.php';?>