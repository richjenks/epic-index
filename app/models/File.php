<?php

/**
 * File
 *
 * Model for files
 * Returns info about the given file
 * Used by Dir models
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.0.0
 */

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

		global $config;

		// Set file vars
		$this->name     = pathinfo($file, PATHINFO_FILENAME);
		$this->ext      = pathinfo($file, PATHINFO_EXTENSION);
		$this->path     = dirname($file);
		$this->size     = DirectoryHelper::filesize(stat($file)['size'], $config['filesize_precision'], '{size} <span class="faded">{unit}</span>');
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