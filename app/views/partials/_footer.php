<?php

/**
 * Footer
 *
 * View partial used throughout application
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.0.0
 */

namespace RichJenks\Teepee;

?>

		</div>
		<?php if($config['show_footer']):?>
			<footer>
				<a href="https://github.com/richjenks/teepee/">Teepee v1.3.0</a> <?=__('by')?> <a href="http://richjenks.com">Rich Jenks</a>
				<?php if($config['password'] !== '' && !isset($data['hide_logout'])):?>
					 | <a href="?logout">Logout</a>
				<?php endif;?>
			</footer>
		<?php endif;?>
	</body>
</html>