<?php

/**
 * Row
 *
 * Partial for displaying a row in directory listings
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.0.0
 */

namespace RichJenks\Teepee;

global $config;

?>

<tr class="<?=$row['classes']?>">
	<td class="col-name">
		<a class="media" href="<?=$row['uri']?>" title="<?=$row['title']?>"<?=$row['target']?>>
			<div class="media-img">
				<img class="icon" src="<?=TEEPEE_URI?>app/assets/icons/<?=$row['icon']?>.png">
			</div>
			<div class="media-body"><?=$row['name']?></div>
		</a>
	</td>
	<td class="col-size">
		<a href="<?=$row['uri']?>" title="<?=$row['title']?>"<?=$row['target']?>>
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
		<a href="<?=$row['uri']?>" title="<?=$row['title']?>"<?=$row['target']?>>
			<?php
				if (isset($row['modified'])) {
					echo $row['modified'];
				} else {
					echo '&mdash;';
				}
			?>
		</a>
	</td>
</tr>