<?php

/**
 * Notices
 *
 * Partial for displaying notices
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.3.0
 */

namespace RichJenks\Teepee;

global $notices;

if (isset($notices)) {
	foreach($notices as $notice) {
		echo '<div class="notice">'.$notice.'</div>';
	}
}

?>