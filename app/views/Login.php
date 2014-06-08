<?php namespace RichJenks\Teepee;?>
<?php global $config;?>
<?php require TEEPEE_PATH.'app/views/_header.php';?>
<h1><?=$data['title']?></h1>
<form method="post">
	<input type="password" placeholder="Password" name="password" required autofocus>
	<button type="submit">Login</button>
</form>
<?php require TEEPEE_PATH.'app/views/_footer.php';?>