<tr class="<?=$classes?>">
	<td class="col-name">
		<a href="<?=$item['uri']?>">
			<img class="icon" src="<?=TEEPEE_URI?>app/assets/icons/<?=$item['icon']?>.png">
			<?=$item['name']?>
		</a>
	</td>
	<td class="col-size">
		<a href="<?=$item['uri']?>">
			<?=$item['size']?>
		</a>
	</td>
	<td class="col-modified">
		<a href="<?=$item['uri']?>">
			<?=RichJenks\Teepee\Helper::format_date($item['modified'])?>
		</a>
	</td>
</tr>