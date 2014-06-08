<?php

/**
 * Auth
 *
 * Authentication class which handles login & password view
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.3.0
 */

namespace RichJenks\Teepee;

class Auth extends Controller {

	private $data;     // View data array
	private $password; // Excpected password
	private $timeout;  // Seconds of allowed inactivity

	public function __construct() {

		global $config;

		session_start();

		// Get relevant setting from config
		$this->password = $config['password'];
		$this->timeout  = $config['timeout'];

		// Check for logout
		if (isset($_GET['logout'])) {
			$this->logout();
		}

	}

	/**
	 * pass
	 *
	 * Checks timeout and password
	 * Renders login view if needed
	 * Returns true or false for pass or fail
	 *
	 * @return bool True if pass, false if fail
	 */

	public function pass() {

		// If password not configured, pass automatically
		if ($this->password === '') {
			return true;
		}

		// Check credentials - show listings?
		if (isset($_POST['password'])) {
			if ($_POST['password'] === $this->password) {
				$this->reset();
				return true;
			}
		}

		// Check timeout - if exceeded, show login
		if (!isset($_SESSION['timeout']) || time() - $_SESSION['timeout'] > $this->timeout) {

			// Set view datas
			$this->data = array(
				'title' => 'Enter Password',
				'hide_logout' => true,
			);

			// Render view and return false to prevent listings
			$this->render('Login', $this->data);
			return false;

		} else {

			// If timeout not exceeded, reset timeout and show listings
			$this->reset();
			return true;

		}

	}

	/**
	 * reset
	 *
	 * Resets the timeout
	 */

	private function reset() {
		$_SESSION['timeout'] = time();
	}

	/**
	 * Logout
	 *
	 * Removes timeout and redirects to login
	 */

	private function logout() {
		unset($_SESSION['timeout']);
		header('Location: '.Helper::strip_query(Helper::get_uri()));
	}

}