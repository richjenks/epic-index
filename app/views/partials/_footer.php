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

			<footer>
				<a href="https://github.com/richjenks/teepee/">Teepee v<?=AppHelper::get_version();?></a> <?=__('by')?> <a href="http://richjenks.com">Rich Jenks</a>
				<?php if($config['password'] !== '' && !isset($data['hide_logout'])):?>
					 | <a href="?logout"><?=__('logout')?></a>
				<?php endif;?>
			</footer>

			<?php if ($config['transitions']): ?>

				<!-- Overlay & spinner -->
				<div style="display: none;" class="overlay"></div>
				<img style="display: none;" class="overlay-spinner" src="<?=TEEPEE_URI.'/app/assets/img/spinner.gif';?>">

				<!-- JS -->
				<script src="<?=TEEPEE_URI.'/app/assets/js/jquery-1.11.1.min.js';?>"></script>
				<script src="<?=TEEPEE_URI.'/app/assets/js/script.js';?>"></script>

			<?php endif; ?>

	</body>
</html>