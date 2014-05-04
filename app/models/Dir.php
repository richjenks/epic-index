<?php

class Dir {

	// Path vars
	private $request;		// Path to current directory from webroot — for breadcrumbs
	private $path;		// Local path to current directory
	private $teepee_uri;	// URI to Teepee

	// Child vars
	private $children;		// Files and folders in current dir
	private $child_count;	// Count of children in current dir
	private $child_label;	//Label for children, singular or plural

	// Folder vars
	private $folders; // Folders in current dir
	private $folder_count; // Count of files in current dir
	private $folder_label; // Label for folders, singular or plural

	// File vars
	private $files; // Files in current dir
	private $file_count; // Count of files in current dir
	private $file_label; // Label for files, singular or plural

	public function __construct($request, $path, $teepee_uri) {

		// Set directory vars
		$this->request		= $request;
		$this->path			= $path;
		$this->teepee_uri	= $teepee_uri;

		// Get dir listings, without current and parent dir, plus files/folders
		$this->children = array_diff(scandir($this->path), array('.', '..'));
		$this->folders = $this->get_folders($this->children);
		$this->files = $this->get_files($this->children);

		// Count children, files and folders
		$this->child_count = count($this->children);
		$this->file_count = count($this->files);
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

	// Getters for private vars
	// public function get_directory()		{ return $this->directory; }
	// public function get_parent()		{ return $this->parent; }
	// public function get_request()		{ return $this->request; }
	// public function get_children()		{ return $this->children; }
	// public function get_files()			{ return $this->files; }
	// public function get_folders()		{ return $this->folders; }

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

		// Start HTML
		$html = '';

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