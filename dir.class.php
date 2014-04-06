<?php

class Dir {

	private $path; // Local path to current dir
	private $parent; // Local path to parent dir
	private $request; // URL path from host — for breadcrumbs
	private $children; // Files and folders in current dir
	private $files; // Files in current dir
	private $folders; // Folders in current dir

	public function __construct() {

		// Set directory vars
		$this->path = Helper::strip_query($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']);
		$this->parent = dirname($this->path).'/';
		$this->request = Helper::strip_query($_SERVER['REQUEST_URI']);

		// Get and split dir listings
		$this->children = array_diff(scandir($this->path), array('..', '.'));
		$this->split_children();

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