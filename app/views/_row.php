<?php global $config;?>
<tr class="<?=$classes?>">
	<td class="col-name">
		<a href="<?=$row['uri']?>"<?=$target?>>
			<img class="icon" src="<?=TEEPEE_URI?>app/assets/icons/<?=$row['icon']?>.png">
			<?=$row['name']?>
		</a>
	</td>
	<td class="col-size">
		<a href="<?=$row['uri']?>"<?=$target?>>
			<?php
				if (isset($row['size'])) {
					echo $row['size'];
				} else {
					echo '&mdash;';
				}
			?>
		</a>
	</td>
	<td class="col-modified">
		<a href="<?=$row['uri']?>"<?=$target?>>
			<?php
				if (isset($row['modified'])) {
					echo date($config['date_format'], $row['modified']);
				} else {
					echo '&mdash;';
				}
			?>
		</a>
	</td>
</tr>