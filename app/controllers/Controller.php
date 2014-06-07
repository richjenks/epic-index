<?php

/**
 * Controller
 *
 * Main controller class which other controllers extend
 * Includes `render` function to pass data to a view
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.0.0
 */

namespace RichJenks\Teepee;

class Controller {

	/**
	 * render
	 *
	 * Renders a view and passes data to it
	 *
	 * @param string $view Name of a view in /app/views/
	 * @param array $data Multidimentional array of data to pass to view
	 */

	public function render($view, $data) {
		require TEEPEE_PATH.'app/views/'.$view.'.php';
	}

}