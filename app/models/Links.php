<?php

namespace RichJenks\Teepee;

class Links {

	private $links;   // Array of custom link data
	private $request; // Path to current directory from webroot
	private $show;    // Whether the currently-iterated link should show

	public function __construct($request) {

		global $config;
		
		$this->links = array();
		$this->request = $request;

		// Iterate through each link
		foreach ($config['custom_links'] as $link) {

			// Reset show to false
			$this->show = false;

			// Iterate through each valid request
			foreach ($link['show'] as $request) {

				// Check if current link should show
				if ($request === $this->request || $request === '*') {
					$this->show = true;
				}

			}

			// If this link should be shown
			if ($this->show) {

				// Push custom link
				array_push($this->links, array(
					'icon'     => 'folder-page',
					'name'     => $link['name'],
					'uri'      => $link['uri'],
					'faded'    => true,
				));
			
			}

			// Sort links by name, case insensitive
			$this->links = Helper::sort_arr_by_key($this->links, 'name');


		}


	}

	public function get_links_data() {
		return $this->links;
	}

}