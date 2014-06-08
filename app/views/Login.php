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

// Header partial
require TEEPEE_PATH.'app/views/partials/_header.php';

echo '<h1>'.$data['title'].'</h1>';

// Show notices
require TEEPEE_PATH.'app/views/partials/_notices.php';

?>

<form method="post">
	<input type="password" placeholder="Password" name="password" required autofocus>
	<button type="submit">Login</button>
</form>
<?php require TEEPEE_PATH.'app/views/partials/_footer.php';?>