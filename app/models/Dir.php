<?php

class Dir {

	// Path vars
	private $request;      // Path to current directory from webroot — for breadcrumbs
	private $path;         // Local path to current directory

	// Directory vars
	private $name;         // Name of current directory
	private $size;         // Number of items in current directory
	private $modified;     // Modified date of current directory

	// Parent vars
	private $parent;       // Parent directory object
	private $parent_path;  // Path to parent directory

	// Child vars
	private $children;     // Files and folders in current dir
	private $child_count;  // Count of children in current dir
	private $child_label;  //Label for children, singular or plural

	// Folder vars
	private $folders;      // List of folders in current dir
	private $folder_count; // Count of files in current dir
	private $folder_label; // Label for folders, singular or plural
	private $folders_data; // Folders data

	// File vars
	private $files;        // List of files in current dir
	private $file_count;   // Count of files in current dir
	private $file_label;   // Label for files, singular or plural
	private $files_data;   // Files data

	public function __construct($request, $path) {

		// Set path vars
		$this->request = $request;
		$this->path    = $path;

		// Set parent path
		$this->parent_path	= dirname($this->path);

		// Get dir listings, without current and parent dir, plus files/folders
		$this->children = array_diff(scandir($this->path), array('.', '..'));
		$this->folders  = $this->get_folders($this->children);
		$this->files    = $this->get_files($this->children);

		// Count items
		$this->count_items();

		// Set current directory vars
		$this->name     = basename($this->path);
		$this->size     = $this->child_count.' <span class="faded">'.$this->child_label.'</span>';
		$this->modified = stat($this->path)['mtime'];

	}

	/**
	 * get_request
	 * 
	 * Returns this object's request
	 * 
	 * @return string Request for the current directory
	 */

	private function get_request() { return $this->request; }

	/**
	 * get_path
	 * 
	 * Return this object's path
	 * 
	 * @return string Path to the current directory
	 */

	private function get_path() { return $this->path; }

	/**
	 * count_items
	 * 
	 * Counts children, files and folders as well as chooses singular or plural label
	 */

	private function count_items() {

		// Count children, files and folders
		$this->child_count  = count($this->children);
		$this->file_count   = count($this->files);
		$this->folder_count = count($this->folders);

		// Define singluar or plural labels for children
		if ($this->child_count === 1) {
			$this->child_label = 'Item';
		} else {
			$this->child_label = 'Items';
		}

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

	/**
	 * breadcrumbs
	 * 
	 * Generates HTML for breadcrumbs from the host to the current request
	 * 
	 * @return string HTML for the breadcrumbs of the current directory
	 */

	public function breadcrumbs() {

		// Split & filter breadcrumbs
		$breadcrumbs = Helper::shatter('/', $this->request);

		// Reverse breadcrumbs (so 0 index is current dir)
		$breadcrumbs = array_reverse($breadcrumbs);

		// Start HTML with link to root
		$html = '<a href="/" class="icon home"></a> /';

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
			
				// Make current breadcrum bold
				$html .= '<b><a href="." class="breadcrumb">'.$breadcrumbs[$i].'</a></b>/';
			
			}

		}
		
		return $html;

	}

	/**
	 * get_folders
	 * 
	 * Returns array of folders from a given array of files and folders
	 * 
	 * @param array $items Array of files and folders
	 * @return array Array of folders
	 */

	private function get_folders($items) {

		// Array of Folders
		$folders = array();

		// Populate array with Folders
		foreach ($items as $item) {
			if (is_dir($this->path.$item)) {
				array_push($folders, $item);
			}
		}

		// Return array of folders
		return $folders;

	}

	/**
	 * get_files
	 * 
	 * Returns array of files from a given array of files and folders
	 * 
	 * @param array $items Array of files and folders
	 * @return array Array of files
	 */

	private function get_files($items) {

		// Array of Files
		$files = array();

		// Populate array with Files
		foreach ($items as $item) {
			if (is_file($this->path.$item)) {
				array_push($files, $item);
			}
		}

		// Return array of files
		return $files;

	}

	/**
	 * get_parent_data
	 * 
	 * Gets infomation about the parent directory
	 * Returns false if current directory is webroot
	 * 
	 * @return mixed Array of info about parent directory or false
	 */

	private function get_parent_data() {

		// Parent dir object
		$this->parent = new Dir(dirname($this->request), $this->parent_path);

		// Return array of parent's data
		return array(
			'icon'     => 'folder-parent-old',
			'name'     => $this->parent->name,
			'uri'      => $this->parent->get_request(),
			'size'     => $this->parent->size,
			'modified' => $this->parent->modified,
			'faded'    => true,
		);

	}

	/**
	 * get_folders_data
	 * 
	 * Gets information about folders in the current directory
	 * 
	 * @return array Data for each folder
	 */

	public function get_folders_data() {

		// Folders data array
		$this->folders_data = array();

		// Push parent folder
		if ($this->request != '/') {
			array_push($this->folders_data, $this->get_parent_data());
		}

		foreach ($this->folders as $folder) {

			// Folder object
			$folder = new Dir($this->request, $this->path.$folder);

			// Push folders in this directory
			array_push($this->folders_data, array(
				'icon'     => 'folder',
				'name'     => $folder->name,
				'uri'      => $folder->get_request().$folder->name,
				'size'     => $folder->size,
				'modified' => $folder->modified,
				'faded'    => false,
			));

		}

		// Sort folders by name, case insensitive
		$name = array();
		foreach ($this->folders_data as $key => $value) {
			$name[$key] = $value['name'];
		}
		array_multisort($name, SORT_FLAG_CASE | SORT_STRING, $this->folders_data);

		// Return array of folders data
		return $this->folders_data;

	}

	/**
	 * get_files_data
	 * 
	 * Gets information about files in the current directory
	 * 
	 * @return array Data for each file
	 */

	public function get_files_data() {

		// Files data array
		$this->files_data = array();

		foreach ($this->files as $file) {

			// File object
			$file = new File($this->path.$file);

			// Push files in this directory
			array_push($this->files_data, array(
				'name' => $file->get_name(),
				'ext' => $file->get_ext(),
				'path' => $file->get_path(),
				'uri' => $this->get_request().$file->get_name().'.'.$file->get_ext(),
				'size' => $file->get_size(),
				'modified' => $file->get_modified(),
			));

		}

		// Sort folders by name, case insensitive
		$name = array();
		foreach ($this->files_data as $key => $value) {
			$name[$key] = $value['name'];
		}
		array_multisort($name, SORT_FLAG_CASE | SORT_STRING, $this->files_data);

		// Return array of files data
		return $this->files_data;

	}

	/**
	 * summary
	 * 
	 * Generates a summary of the current directory
	 * 
	 * @return string Content for the summary
	 */

	public function summary() {
		return $this->folder_count.' '.$this->folder_label.' | '.$this->file_count.' '.$this->file_label;
	}

}
