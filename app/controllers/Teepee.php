<?php

class Teepee {

	private $request;		// Path to current directory from webroot
	private $path;			// Local path to current directory
	private $teepee_uri;	// URI to Teepee
	private $directory; 	// Current directory object

	public function __construct() {

		// Set directory vars
		$this->request = Helper::strip_query($_SERVER['REQUEST_URI']);
		$this->path = $_SERVER['DOCUMENT_ROOT'].$this->request;
		$this->teepee_uri = Helper::get_domain().str_replace($_SERVER['DOCUMENT_ROOT'], '', TEEPEE);

		// Render view
		$this->render();

	}

	// Getters for private vars
	// public function get_request()		{ return $this->request; }
	// public function get_path()		{ return $this->path; }
	// public function get_teepee_uri()	{ return $this->teepee_uri; }

	private function render() {

		// Create current directory object
		$directory = new Dir($this->request, $this->path, $this->teepee_uri);
		
		// Populate array of page data
		$data = array(
			'title' => $this->request,
			'teepee' => $this->teepee_uri,
			'breadcrumbs' => $directory->breadcrumbs(),
			'summary' => $directory->summary(),
		);

		// Load view
		require TEEPEE.'app/views/View.php';

	}

}
