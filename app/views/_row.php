<tr class="<?=$classes?>">
	<td class="col-name">
		<a href="#">
			<img class="icon" src="<?=TEEPEE_URI?>app/assets/icons/<?=$folder['icon']?>.png">
			<?=$folder['name']?>
		</a>
	</td>
	<td class="col-size">
		<a href="#">
			<?=$folder['size']?>
		</a>
	</td>
	<td class="col-modified">
		<a href="#">
			<?=Helper::format_date($folder['modified'])?>
		</a>
	</td>
</tr>