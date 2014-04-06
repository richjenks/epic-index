<?php

class Dir {

	private $path; // Local path to current dir
	private $parent; // Local path to parent dir
	private $request; // URL path from host — for breadcrumbs

	public function __construct() {

		$this->path = Helper::strip_query($_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']);
		$this->parent = dirname($this->path).'/';
		$this->request = Helper::strip_query($_SERVER['REQUEST_URI']);

	}

	public function get_path() {
		return $this->path;
	}

	public function get_parent() {
		return $this->parent;
	}

	public function get_request() {
		return $this->request;
	}

}