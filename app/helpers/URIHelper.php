<?php

/**
 * URIHelper
 *
 * Static helper function for manipulating URIs
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.3.0
 */

namespace RichJenks\Teepee;

class URIHelper {

	/**
	 * strip_query
	 *
	 * Removes the current query string from a given URL
	 * Used to prevent errors when getting directory listings
	 *
	 * @param string $url The URL to remove the query string from
	 * @return string The $url provided without the query string
	 */

	public static function strip_query($url) {
		return str_replace(
			'?'.$_SERVER['QUERY_STRING'],
			'',
			$url
		);
	}

	/**
	 * get_uri
	 *
	 * Returns the current URI
	 *
	 * @return string Current URI
	 */

	public static function get_uri() {
		$protocol = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
		return $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}

	/**
	 * get_domain
	 *
	 * Gets the fully-qualified domain name of current location
	 *
	 * @return string Domain name, e.g. https://sub.domain.tld
	 */

	public static function get_domain() {
		$protocol = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
		return $protocol.$_SERVER['HTTP_HOST'];
	}

	/**
	 * file_uri
	 *
	 * Gets the public URI of the PHP file being executed
	 * Must be passed __FILE__ to ensure is uses the calling script's location
	 *
	 * <code>
	 *     echo file_uri(__FILE__);
	 * </code>
	 *
	 * @param string $file __FILE__
	 * @return string URL of the script being executed
	 */

	public static function file_uri($file) {

		// If document root doesn't end with a slash, add it
		if (substr($_SERVER['DOCUMENT_ROOT'], -1) !== '/') {
			$document_root = $_SERVER['DOCUMENT_ROOT'].'/';
		} else {
			$document_root = $_SERVER['DOCUMENT_ROOT'];
		}

		// Remove document root from file to get request
		$request = str_replace($document_root, '', $file);

		// if request doesn't start with a slash, add it
		if (substr($request, 0, 1) !== '/') {
			$request = '/'.$request;
		} else {
			$request = $request;
		}

		// Concatenate protocol, domain & request to get full URI
		return self::get_domain().$request;

	}

}