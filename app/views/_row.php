<?php

// If parent link, add faded class and use parent's size/modified
$classes = '';
if (isset($data['parent']) && $data['parent']) {
	$classes = 'faded';
	$data['icon'] = $data['parent']['icon'];
	$data['name'] = $data['parent']['name'];
	$data['size'] = $data['parent']['size'];
	$data['modified'] = $data['parent']['modified'];
}

?>

<tr class="<?=$classes?>">
	<td class="col-name">
		<a href="../">
			<img class="icon" src="<?=$data['teepee']?>app/assets/icons/<?=$data['icon']?>.png">
			<?=$data['name']?>
		</a>
	</td>
	<td class="col-size">
		<a href="../">
			<?=$data['size']?>
		</a>
	</td>
	<td class="col-modified">
		<a href="../">
			<?=Helper::format_date($data['modified'])?>
		</a>
	</td>
</tr>