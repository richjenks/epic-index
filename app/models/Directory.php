<?php

/**
 * Directory
 *
 * Model for directories
 * Gets info for current directory as well as info for subdirectories
 * Also gets data from File model
 * Used by Teepee controller
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.0.0
 */

namespace RichJenks\Teepee;

class Directory {

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
		$this->request = str_replace('%20', ' ', $request);
		$this->path    = str_replace('%20', ' ', $path);

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
	 * Return this object's `request`
	 */

	public function get_request() {
		return $this->request;
	}

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
			$this->child_label = __('item');
		} else {
			$this->child_label = __('items');
		}

		// Define singluar or plural labels for files
		if ($this->file_count === 1) {
			$this->file_label = __('file');
		} else {
			$this->file_label = __('files');
		}

		// Define singluar or plural labels for folders
		if ($this->folder_count === 1) {
			$this->folder_label = __('folder');
		} else {
			$this->folder_label = __('folders');
		}

		// With singular/plural chosen, format number
		$this->child_count  = number_format($this->child_count);
		$this->file_count   = number_format($this->file_count);
		$this->folder_count = number_format($this->folder_count);

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
		$breadcrumbs = VariableHelper::shatter('/', $this->request);

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

	public function get_parent_data() {

		if ($this->request != '/') {

			// Parent dir object
			$this->parent = new Directory(dirname($this->request), $this->parent_path);

			// Return array of parent's data
			return array(
				'icon'     => 'folder-parent-old',
				'name'     => $this->parent->name,
				'uri'      => $this->parent->request,
				'size'     => $this->parent->size,
				'modified' => $this->parent->modified,
				'faded'    => true,
			);

		} else {
			return false;
		}

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

		foreach ($this->folders as $folder) {

			// Folder object
			$folder = new Directory($this->request, $this->path.$folder);

			// Push folders in this directory
			array_push($this->folders_data, array(
				'icon'     => 'folder',
				'name'     => $folder->name,
				'uri'      => $folder->request.$folder->name,
				'size'     => $folder->size,
				'modified' => $folder->modified,
				'faded'    => false,
			));

		}

		// Sort folders by name, case insensitive
		$this->folders_data = VariableHelper::sort_arr_by_key($this->folders_data, 'name');

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
				'uri' => $this->request.$file->get_name().'.'.$file->get_ext(),
				'size' => $file->get_size(),
				'modified' => $file->get_modified(),
			));

		}

		// Sort files by name
		$this->files_data = VariableHelper::sort_arr_by_key($this->files_data, 'name');

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
		return number_format($this->folder_count)
			.' '
			.$this->folder_label
			.' | '
			.number_format($this->file_count)
			.' '
			.$this->file_label;
	}

}
