<?php

namespace RichJenks\Teepee;

class File {

	private $name;     // Name of the file
	private $ext;      // File extension
	private $path;     // Path to the file
	private $size;     // Size in bytes
	private $modified; // Modified date

	/**
	 * __construct
	 * 
	 * Defines vars for the current file
	 * 
	 * @param string $file Full path to the current file
	 * 
	 * @return void
	 */


	public function __construct($file) {

		// Set file vars
		$this->name     = pathinfo($file, PATHINFO_FILENAME);
		$this->ext      = pathinfo($file, PATHINFO_EXTENSION);
		$this->path     = dirname($file);
		$this->size     = Helper::filesize(stat($file)['size'], 2, '{size} <span class="faded">{unit}</span>');
		$this->modified = stat($file)['mtime'];

	}

	/**
	 * Getters for file vars
	 */

	public function get_name()     { return $this->name; }
	public function get_ext()      { return $this->ext; }
	public function get_path()     { return $this->path; }
	public function get_size()     { return $this->size; }
	public function get_modified() { return $this->modified; }

}