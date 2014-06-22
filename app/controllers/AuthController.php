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

class AuthController extends Controller {

	private $data;     // View data array
	private $password; // Expected password
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

		global $notices;

		if ($this->password === '') {

			// Password is disabled
			// Pass automatically
			return true;

		} elseif (!isset($_SESSION['timeout'])) {

			// Timeout isn't set
			// Reset timeout & show login
			$this->reset();
			$this->show_login();
			return false;

		} elseif (isset($_POST['password']) && $_POST['password'] !== $this->password) {

			// Password is submitted but is incorrect
			// Show notice & login
			$notices[] = 'Password incorrect; please try again.';
			$this->show_login();
			return false;

		} elseif (isset($_POST['password']) && $_POST['password'] == $this->password) {

			// Password is submitted and is correct
			// Reset timeout & show directory listing
			$this->reset();
			return true;

		} elseif (time() - $_SESSION['timeout'] > $this->timeout) {

			// Timeout has expired
			// Show login & notice
			$notices[] = 'Timeout has expired; please re-enter password.';
			$this->show_login();

		} else {

			// Timeout is set but hasn't expired
			// Show directory listing
			return true;

		}

	}

	/**
	 * show_login
	 *
	 * Show the login view
	 */

	private function show_login() {

		// Set view datas
		$this->data = array(
			'title' => 'Enter Password',
			'hide_logout' => true,
		);

		// Render view and return false to prevent listings
		$this->render('Login', $this->data);
		return false;

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
		session_destroy();
		header('Location: '.URIHelper::strip_query(URIHelper::get_uri()));
	}

}