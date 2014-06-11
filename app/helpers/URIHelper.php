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
	 * dir_uri
	 *
	 * Gets the public URI of the directory of the PHP file being executed
	 * Must be passed __DIR__ to ensure is uses the calling script's location
	 *
	 * <code>
	 *     echo file_uri(__DIR__);
	 * </code>
	 *
	 * @param string $dir __DIR__
	 * @return string URL of the script being executed
	 */

	public static function dir_uri($dir) {

		// Get document root & ensure trailing slash
		$root = $_SERVER['DOCUMENT_ROOT'];
		$root = (substr($root, -1) === '/' ? $root : $root.'/');

		// Correct slashes on Windows
		$root = str_replace('\\', '/', $root);
		$dir = str_replace('\\', '/', $dir);

		// Get request & ensure starting & trailing slash
		$request = str_replace($root, '', $dir);
		$request = (substr($request, 0, 1) === '/' ? $request : '/'.$request);
		$request = (substr($request, -1) === '/' ? $request : $request.'/');

		return self::get_domain().$request;

	}

}