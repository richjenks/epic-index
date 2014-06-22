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

	private $data;              // View data array
	private $timeout;           // Seconds of allowed inactivity
	private $password_expected; // Expected password
	private $password_provided; // Provided password

	public function __construct() {

		global $config;

		session_start();

		// Get relevant setting from config
		$this->timeout           = $config['timeout'];
		$this->password_expected = $config['password'];

		// Get provided password
		if (isset($_POST['password'])) {
			$this->password_provided = $_POST['password'];
		} else {
			$this->password_provided = false;
		}

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

		if ($this->password_expected === '') {

			// Password is disabled
			return true;

		} elseif ($this->password_provided && $this->password_provided === $this->password_expected) {

			// Correct password provided
			$this->reset();
			return true;

		} elseif ($this->password_provided && $this->password_provided !== $this->password_expected) {

			// Incorrect password provided
			$notices[] = __('password_incorrect_notice');
			$this->show_login();
			return false;

		} elseif (!isset($_SESSION['timeout'])) {

			// Timeout not set, not authenticated
			$this->show_login();
			return false;

		} elseif (time() - $_SESSION['timeout'] > $this->timeout) {

			// Timeout set but expired
			$notices[] = __('password_expired_notice');
			$this->logout();
			return false;

		} else {

			// Authenticated and not timed-out
			$this->reset();
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
			'title' => __('password'),
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