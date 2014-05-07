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

				// Get file's icon name
				$item['icon'] = Helper::get_icon($item['icon']);

				// Render the row
				include TEEPEE_PATH.'app/views/_row.php';
			
			}

			// Loop through each file
			foreach ($data['files'] as $item) {

				// Get file's icon name
				$item['icon'] = Helper::get_icon($item['ext']);

				// Construct file.extension
				$item['name'] = $item['name'].'<span class="faded">.'.$item['ext'];

				// Render the row
				include TEEPEE_PATH.'app/views/_row.php';

			}


		?>

	</tbody>
</table>
<section class="summary faded smallcaps"><?=$data['summary']?></section>
<?php require TEEPEE_PATH.'app/views/_footer.php';?>