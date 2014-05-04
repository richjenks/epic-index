<?php require TEEPEE.'app/views/_header.php';?>
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

		<!-- Show parent link if available -->
		<?php if ($data['parent']):?>
			<?php include TEEPEE.'app/views/_row.php';?>
		<?php endif;?>

		<!-- Show folders -->
		<?php foreach ($data['folders'] as $data):?>
			<?php include TEEPEE.'app/views/_row.php';?>
			<!--<tr>
				<td class="col-name">
					<a href="<?=$folder['name']?>">
						<img class="icon" src="<?=$data['teepee']?>app/assets/icons/folder.png">
						<?=$folder['name']?>
					</a>
				</td>
				<td class="col-size"><?=$folder['size']?></td>
				<td class="col-modified"><?=$folder['modified']?></td>
			</tr>-->
		<?php endforeach;?>

	</tbody>
	<tbody>
</table>
<section class="summary faded smallcaps"><?=$data['summary']?></section>
<?php require TEEPEE.'app/views/_footer.php';?>