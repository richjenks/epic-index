<?php

class Dir {

	// Path vars
	private $path; // Local path to current dir
	private $parent; // Local path to parent dir
	private $request; // URL path from host — for breadcrumbs
	private $children; // Files and folders in current dir

	// Folder vars
	private $folders; // Folders in current dir
	private $folder_count; // Count of files in current dir
	private $folder_label; // Label for folders, singular or plural

	// File vars
	private $files; // Files in current dir
	private $file_count; // Count of files in current dir
	private $file_label; // Label for files, singular or plural

	public function __construct() {

		// Set directory vars
		$this->path = Helper::strip_query($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']);
		$this->parent = dirname($this->path).'/';
		$this->request = Helper::strip_query($_SERVER['REQUEST_URI']);

		// Get dir listings
		$this->children = array_diff(scandir($this->path), array('..', '.'));

		// Split listing into files/folders
		$this->split_children();

		// Count files and folders
		$this->file_count = count($this->files);
		$this->folder_count = count($this->folders);

		// Define singluar or plural labels for files
		if ($this->file_count === 1) {
			$this->file_label = 'File';
		} else {
			$this->file_label = 'Files';
		}

		// Define singluar or plural labels for folders
		if ($this->folder_count === 1) {
			$this->folder_label = 'Folder';
		} else {
			$this->folder_label = 'Folders';
		}

	}

	// Getters for private vars
	public function get_path() { return $this->path; }
	public function get_parent() { return $this->parent; }
	public function get_request() { return $this->request; }
	public function get_children() { return $this->children; }
	public function get_files() { return $this->files; }
	public function get_folders() { return $this->folders; }

	/**
	 * split_children
	 * 
	 * Splits $children into $files and $folders
	 */

	private function split_children() {

		foreach ($this->children as $child) {
			if (is_file($this->path.$child)) {
				$this->files[] = $child;
			} else {
				$this->folders[] = $child;
			}
		}

	}

	/**
	 * breadcrumbs
	 * 
	 * Generates HTML for breadcrumbs from the host to the current request
	 * 
	 * @return string HTML for the breadcrumbs of the current directory
	 */

	public function breadcrumbs() {

		// Split breadcrumbs
		$breadcrumbs = explode('/', $this->request);

		// Remove empty strings
		$breadcrumbs = array_filter($breadcrumbs);

		// Reverse breadcrumbs (so 0 index is current dir)
		$breadcrumbs = array_reverse($breadcrumbs);

		// Start HTML
		$html = '<h1 class="breadcrumbs">';

		// Link to root
		$html .= '<a href="/" class="icon home"></a> /';

		// Show each breadcrumb
		$count = count($breadcrumbs) - 1;
		for ($i = $count; $i >= 0; $i--) {

			if ($i !== 0) {

				// Generate href for ancestor dirs
				$href = '';
				for ($i2 = 0; $i2 < $i; $i2++) {
					$href .= '../';
				}
				
				// Make link for breadcrumb
				$html .= '<a href="'.$href.'" class="breadcrumb">'.$breadcrumbs[$i].'</a>/';
			
			} else {
			
				// Don't make the current folder a link
				$html .= '<b>'.$breadcrumbs[$i].'</b>/';
			
			}

		}

		// End HTML
		$html .= '</h1>';
		
		return $html;

	}

	/**
	 * summary
	 * 
	 * Generates HTML for summary of the current dir
	 * 
	 * @return string HTML for the summary
	 */

	public function summary() {


		// Construct summary HTML
		$html = '';
		$html = '<section class="summary faded smallcaps">';
		$html .= $this->folder_count.' '.$this->folder_label.' | '.$this->file_count.' '.$this->file_label;
		$html .= '</section>';

		return $html;

	}

	public function list_files() {
		foreach ($this->files as $file) {
			echo $file.'<br>';
		}
	}

	public function list_folders() {
		foreach ($this->folders as $folder) {
			echo $folder.'<br>';
		}
	}

}
