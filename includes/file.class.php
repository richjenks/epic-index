<?php

class File {

	private $file; // Full path the the current item
	private $parent; // Whether the item is the link to a parent item
	private $url; // URL to the file
	private $icon; // Icon for the file
	private $name; // Filename with extension
	private $stats; // Results of PHP `stat()`
	private $size; // Size either in bytes or number of children
	private $modified; // Modified date of the current item

	/**
	 * __construct
	 * 
	 * Defines vars for the current file
	 * 
	 * @param string $file Full path to the current file
	 * @param bool $parent Whether the file is the link to the parent dir
	 * 
	 * @return void
	 */

	public function __construct($file, $parent = false) {

		// Set the bool for whether file is parent link
		$this->parent = $parent;

		// Get file stats
		$this->stats = stat($this->file);

		// Define vars for current file
		$this->file = $file;
		$this->icon = $this->find_icon();
		$this->url = $this->find_url();
		$this->name = $this->find_name();
		$this->size = $this->find_size();
		$this->modified = $this->find_modified();

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
	 * find_icon
	 * 
	 * Selects the appropriate icon based on whether file is parent, folder or other
	 * 
	 * @return void
	 */

	private function find_icon() {

		if ($this->parent) {
			
			// If parent link, use parent icon
			return 'folder-parent-old';
		
		} elseif (is_dir($this->file)) {

			// If folder, use folder icon
			return 'folder';
			
		} else {

			// Otherwise, choose icon from file's extension
			return Helper::icon($this->file);

		}

	}

	/**
	 * find_url
	 * 
	 * Generates a relative URL to the file from the current location
	 * 
	 * @return void
	 */

	private function find_url() {

		// If file is parent, set URL to up
		if ($this->parent) {
			return '../';
		} else {
			return $this->name;
		}

	}

	/**
	 * find_name
	 * 
	 * Generates a file's name from its full path
	 * 
	 * @return void
	 */

	private function find_name() {
		return end(Helper::shatter('/', $this->file));
	}

	/**
	 * find_size
	 * 
	 * Calculates a file's size in bytes or number of children
	 * 
	 * @return void
	 */

	private function find_size() {}

	/**
	 * find_modified
	 * 
	 * Gets a file's modified date
	 * 
	 * @return void
	 */

	private function find_modified() {
		// $this->modified = $stats['mtime'];
		// $open = Helper::escape_chars('<span class="faded smallcapes">');
		// $close = Helper::escape_chars('</span>');
		// return '<td class="col-modified"><a href="'.$folder.'">'.date($open.'D '.$close.' Y-m-d '.$open.'h:i'.$close, $stats['mtime']).'</a></td>';
		
		$html = '<td class="col-modified"><a href="">';
		$html .= date(Helper::smallfade('D', true), $this->stats['mtime']);
		$html .= ' Y-m-d ';
		$html .= date(Helper::smallfade('h:i', true), $this->stats['mtime']);
		$html .= '</a></td>';
		return $html;

		// return $this->modified;

		// $r = '\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d \<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>h:i\<\/\s\p\a\n\>', $stats['mtime']).'</a></td>';
		// $table .= '<td class="col-modified"><a href="'.$folder.'">'.date('\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d \<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>h:i\<\/\s\p\a\n\>', $stats['mtime']).'</a></td>';
	}

	/**
	 * output
	 * 
	 * Echos HTML based on this file's info
	 * 
	 * @return string HTML for a file's table row
	 */

	public function output() {

		$html = '';
		$html .= '<tr>';
		$html .= '	<td class="col-icon"><a href="'.$this->url.'"><img class="icon" src="http://'.$_SERVER['HTTP_HOST'].TEEPEE.'icons/'.$this->icon.'.png"></a></td>';
		$html .= '	<td class="col-file"><a class="faded" href="'.$this->url.'">'.$this->name.'</a></td>';
		$html .= '	<td class="col-size"><a class="faded" href="'.$this->url.'">'.$this->size.'</a></td>';
		$html .= '	<td class="col-modified"><a class="faded" href="'.$this->url.'">'.$this->modified.'</a></td>';
		$html .= '</tr>';

		return $html;

	}

}