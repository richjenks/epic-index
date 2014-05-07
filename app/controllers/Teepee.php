<?php

class Teepee {

	private $request;		// Path to current directory from webroot
	private $path;			// Local path to current directory
	private $directory; 	// Current directory object

	public function __construct() {

		// Set directory vars
		$this->request = Helper::strip_query($_SERVER['REQUEST_URI']);
		$this->path = $_SERVER['DOCUMENT_ROOT'].$this->request;
		$this->teepee_uri = Helper::get_domain().str_replace($_SERVER['DOCUMENT_ROOT'], '', TEEPEE_PATH);

		// Create current directory object
		$directory = new Dir($this->request, $this->path, $this->teepee_uri);
		
		// Populate array of page data
		$data = array(
			'title' => $this->request,
			'breadcrumbs' => $directory->breadcrumbs(),
			'summary' => $directory->summary(),
			'folders' => $directory->get_folders_data(),
			'files' => $directory->get_files_data(),
		);

		// Load view
		require TEEPEE_PATH.'app/views/View.php';

	}

}
