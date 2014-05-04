<?php require TEEPEE.'app/views/Header.php';?>
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
			<tr class="faded">
				<td class="col-name">
					<a href="../">
						<img class="icon" src="<?=$data['teepee']?>app/assets/icons/folder-parent-old.png">
						<?=$data['parent']['name']?>
					</a>
				</td>
				<td class="col-size"><a href="../"><?=$data['parent']['size']?></a></td>
				<td class="col-modified"><a href="../">
					<?php
						echo date(
							Helper::escape_chars('<span class="smallcaps">')
								.'D'
								.Helper::escape_chars('</span>')
								.' Y-m-d'
								.Helper::escape_chars('<span class="smallcaps">')
								.' H:i'
								.Helper::escape_chars('</span>'),
							$data['parent']['modified']);
					?>
				</a></td>
			</tr>
		<?php endif;?>

	</tbody>
	<tbody>
</table>
<section class="summary faded smallcaps"><?=$data['summary']?></section>
<?php require TEEPEE.'app/views/Footer.php';?>