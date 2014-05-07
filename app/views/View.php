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

			// Loop through each folder
			foreach ($data['folders'] as $folder) {

				// If faded, add faded class
				$classes = ($folder['faded'] ? 'faded' : '');

				// Check icon exists, or use default file icon
				if (!file_exists(TEEPEE_PATH.'app/assets/icons/'.$folder['icon'].'.png')) {
					$folder['icon'] = 'default';
				}

				// Render the row
				include TEEPEE_PATH.'app/views/_row.php';
			
			}


		?>

	</tbody>
</table>
<section class="summary faded smallcaps"><?=$data['summary']?></section>
<?php require TEEPEE_PATH.'app/views/_footer.php';?>