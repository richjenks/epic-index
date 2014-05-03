<?php

class File {

	private $file; // Full path the the current item
	private $parent; // Whether the item is the link to a parent item
	private $url; // URL to the file
	private $icon; // Icon for the file
	private $name; // Filename with extension
	private $size; // Size either in bytes or number of children
	private $modified; // Modified date of the current item

	/**
	 * __construct
	 * 
	 * Defines vars for the current file
	 * 
	 * @param string $file Full path to the current file
	 * @param bool $parent Whether the file is the link to the parent dir
	 */

	public function __construct($file, $parent = false) {

		// Set the bool for whether file is parent link
		$this->parent = $parent;

		// Define vars for current file
		$this->file = $file;
		$this->name();
		$this->url();
		$this->icon();
		// $this->size();
		// $this->modified();

		// Output details
		$this->output();

	}

	// Getters for private vars
	public function get_file()		{ return $this->file; }
	public function get_parent()	{ return $this->parent; }
	public function get_url()		{ return $this->url; }
	public function get_icon()		{ return $this->icon; }
	public function get_name()		{ return $this->name; }
	public function get_size()		{ return $this->size; }
	public function get_modified()	{ return $this->modified; }

	/**
	 * icon
	 * 
	 * Selects the appropriate icon based on whether file is parent, folder or other
	 */

	private function icon() {

		if ($this->parent) {
			
			// If parent link, use parent icon
			$this->icon = 'folder-parent-old';
		
		} elseif (is_dir($this->file)) {

			// If folder, use folder icon
			$this->icon = 'folder';
			
		} else {

			// Otherwise, choose icon from file's extension
			$this->icon = Helper::icon($this->file);

		}

	}

	/**
	 * url
	 * 
	 * Generates a relative URL to the file from the current location
	 */

	private function url() {

		// If file is parent, set URL to up
		if ($this->parent) {
			$this->url = '../';
		} else {
			$this->url = $this->name;
		}

	}

	/**
	 * name
	 * 
	 * Returns a file's name from its full path
	 */

	private function name() { $this->name = end(Helper::shatter('/', $this->file)); }

	/**
	 * output
	 * 
	 * Echos HTML based on this file's info
	 */

	public function output() {

		$html = '';
		$html .= '<tr>';
		$html .= '	<td class="col-icon"><a href="'.$this->url.'"><img class="icon" src="http://'.$_SERVER['HTTP_HOST'].TEEPEE.'icons/'.$this->icon.'.png"></a></td>';
		$html .= '	<td class="col-file"><a class="faded" href="'.$this->url.'">d'.$this->name.'</a></td>';
		$html .= '	<td class="col-size"><a class="faded" href="'.$this->url.'">d'.$this->size.'</a></td>';
		$html .= '	<td class="col-modified"><a class="faded" href="'.$this->url.'">d'.$this->modified.'</a></td>';
		$html .= '</tr>';

		return $html;

	}

}