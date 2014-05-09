<?php

namespace RichJenks\Teepee;

class Controller {

	public function render($view, $data) {
		require TEEPEE_PATH.'app/views/'.$view.'.php';
	}

}