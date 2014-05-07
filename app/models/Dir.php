<?php

class Dir {

	// Path vars
	private $request;		// Path to current directory from webroot — for breadcrumbs
	private $path;			// Local path to current directory

	// Directory vars
	private $name;			// Name of current directory
	private $size;			// Number of items in current directory
	private $modified;		// Modified date of current directory

	// Parent vars
	private $parent;		// Parent directory object
	private $parent_path;	// Path to parent directory

	// Child vars
	private $children;		// Files and folders in current dir
	private $child_count;	// Count of children in current dir
	private $child_label;	//Label for children, singular or plural

	// Folder vars
	private $folders;		// Folders in current dir
	private $folder_count;	// Count of files in current dir
	private $folder_label;	// Label for folders, singular or plural

	// File vars
	private $files;			// Files in current dir
	private $file_count;	// Count of files in current dir
	private $file_label;	// Label for files, singular or plural

	public function __construct($request, $path, $teepee_uri) {

		// Set path vars
		$this->request		= $request;
		$this->path			= $path;
		$this->teepee_uri	= $teepee_uri;

		// Set parent path
		$this->parent_path	= dirname($this->path);

		// Get dir listings, without current and parent dir, plus files/folders
		$this->children		= array_diff(scandir($this->path), array('.', '..'));
		$this->folders		= $this->get_folders($this->children);
		$this->files		= $this->get_files($this->children);

		// Count items
		$this->count_items();

		// Set current directory vars
		$this->name = basename($this->path);
		$this->size = $this->child_count.' '.$this->child_label;
		$this->modified = stat($this->path)['mtime'];

	}

	/**
	 * count_items
	 * 
	 * Counts children, files and folders as well as chooses singular or plural label
	 */

	private function count_items() {

		// Count children, files and folders
		$this->child_count	= count($this->children);
		$this->file_count	= count($this->files);
		$this->folder_count	= count($this->folders);

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
			
				// Don't make the current folder a link
				$html .= '<b>'.$breadcrumbs[$i].'</b>/';
			
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

			// If not root, instantiate object for parent
			$this->parent = new Dir($this->request, $this->parent_path, $this->teepee_uri);

			// Populate array of parent's data
			return array(
				'icon' => 'folder-parent-old',
				'name' => $this->parent->name,
				'size' => $this->parent->size,
				'modified' => $this->parent->modified,
				'faded' => true,
			);

		} else {

			// If current dir is webroot, there is no parent
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
		$folders = array();

		foreach ($this->folders as $folder) {

			// Folder object
			$folder = new Dir($this->request, $this->path.$folder, $this->teepee_uri);

			// Push parent folder
			array_push($folders, $this->get_parent_data());

			// Push folders in this directory
			array_push($folders, array(
				'icon' => 'folder',
				'name' => $folder->name,
				'size' => $folder->size,
				'modified' => $folder->modified,
				'faded' => false,
			));

		}

		return $folders;

	}

	/**
	 * get_files_data
	 * 
	 * Gets information about files in the current directory
	 * 
	 * @return array Data for each file
	 */

	public function get_files_data() {}

	/**
	 * list_children
	 * 
	 * Generates HTML for file/folder listings table
	 * 
	 * @return string HTML for the file/folder listings table
	 */

	// public function list_children() {

	// 	// Start HTML with headings
	// 	$html = '<table>';
	// 	$html .= '	<thead>';
	// 	$html .= '		<tr>';
	// 	$html .= '			<th class="faded smallcaps col-file">File</th>';
	// 	$html .= '			<th class="faded smallcaps col-size">Size</th>';
	// 	$html .= '			<th class="faded smallcaps col-modified">Modified</th>';
	// 	$html .= '		</tr>';
	// 	$html .= '	</thead>';
	// 	$html .= '	<tbody>';

	// 	// Parent link
	// 	$file = new File($this->parent, true);
	// 	$html .= $file->output();

	// 	// Folders
	// 	foreach ($this->folders as $folder) {
	// 		$folder = new File($folder);
	// 		$html .= $folder->output();
	// 	}

	// 	// Files

	// 	// End HTML
	// 	$html .= '	</tbody>';
	// 	$html .= '</table>';

	// 	return $html;

	// }

	// public function list_files() {
	// 	foreach ($this->files as $file) {
	// 		echo $file.'<br>';
	// 	}
	// }

	// public function list_folders() {
	// 	foreach ($this->folders as $folder) {
	// 		echo $folder.'<br>';
	// 	}
	// }

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
