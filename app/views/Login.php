<?php

/**
 * Login
 *
 * View for password prompt
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.3.0
 */

namespace RichJenks\Teepee;

global $config;
global $notices;

require TEEPEE_PATH.'app/views/_header.php';

echo '<h1>'.$data['title'].'</h1>';

// Show notices
if (isset($notices)) {
	foreach($notices as $notice) {
		require TEEPEE_PATH.'app/views/_notice.php';
	}
}

?>

<form method="post">
	<input type="password" placeholder="Password" name="password" required autofocus>
	<button type="submit">Login</button>
</form>
<?php require TEEPEE_PATH.'app/views/_footer.php';?>