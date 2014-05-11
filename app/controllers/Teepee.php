<?php

namespace RichJenks\Teepee;

class Teepee extends Controller {

	private $request;   // Path to current directory from webroot
	private $path;      // Local path to current directory
	private $directory; // Current directory object
	private $links;     // Custom links object

	public function __construct() {

		// Set directory vars
		$this->request    = str_replace('%20', ' ', Helper::strip_query($_SERVER['REQUEST_URI']));
		$this->path       = $_SERVER['DOCUMENT_ROOT'].$this->request;
		$this->teepee_uri = Helper::get_domain().str_replace($_SERVER['DOCUMENT_ROOT'], '', TEEPEE_PATH);

		// Create current directory object
		$this->directory = new Dir($this->request, $this->path, $this->teepee_uri);

		// Create custom links object
		$this->links = new Links($this->directory->get_request());
		
		// Populate array of page data
		$data = array(
			'title'       => $this->request,
			'breadcrumbs' => $this->directory->breadcrumbs(),
			'summary'     => $this->directory->summary(),
			'parent'      => $this->directory->get_parent_data(),
			'links'       => $this->links->get_links_data(),
			'folders'     => $this->directory->get_folders_data(),
			'files'       => $this->directory->get_files_data(),
		);

		// Render view
		$this->render('View', $data);

	}

}
