<?php

/**
 * Config
 *
 * Array of configuration options
 *
 * @package Teepee
 * @author Rich Jenks <rich@richjenks.com>
 * @since v1.1.0
 */

namespace RichJenks\Teepee;

return array(

	/**
	 * Filesize Precision
	 *
	 * @var int The number of decimal places shown for a filesize
	 * @since 1.1.0
	 *
	 * Default: 2
	 */

	'filesize_precision' => 2,

	/**
	 * Root Label
	 *
	 * @var string The name given to the parent link which points to webroot
	 * @since 1.1.0
	 *
	 * Default: 'Home'
	 */

	'root_label' => 'Home',

	/**
	 * Date Format
	 *
	 * @var string The format for modified dates
	 * @since 1.1.0
	 *
	 * Accepts a valid value for the $format param of `date()`
	 * The Helper function `fade` makes the given string faded and in smallcaps
	 *
	 * Default: '\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\>D\<\/\s\p\a\n\> Y-m-d\<\s\p\a\n\ \c\l\a\s\s\=\"\f\a\d\e\d\ \s\m\a\l\l\c\a\p\s\"\> H:i\<\/\s\p\a\n\>'
	 */

	'date_format' => VariableHelper::fade('D').' Y-m-d'.VariableHelper::fade(' H:i'),

	/**
	 * Hover Info
	 *
	 * @var bool Defines whether file/folder/link info shows on hover in title attribute
	 * @since 1.1.0
	 *
	 * Default: true
	 */

	'hover_info' => true,

	/**
	 * Custom Links
	 *
	 * @var array Data for custom links, similar to bookmarks
	 * @since 1.1.0
	 *
	 * Custom Links are shown below the parent link and above folders
	 * You can specify a name, a URI and where they should be shown
	 *
	 * Format:
	 *
	 * array['custom_links']
	 *     [0]
	 *         ['name'] string The text that will appear as the link
	 *         ['uri']  string The URI the link will point to
	 *         ['show'] array  (Optional) Requests for which the link will show
	 *         ['new']  bool   (Optional) Whether link will open in a new tab
	 *
	 * The `show` param also accepts an asterisk meaning "everywhere"
	 * `show` defaults to "*"
	 * `new` defaults to `false`
	 *
	 * Example:
	 *
	 * <code>
	 * 'custom_links' => array(
	 *     array(
	 *         'name' => 'PHPMyAdmin',
	 *         'uri'  => 'http://localhost/phpmyadmin',
	 *         'show' => array('/'),
	 *         'new'  => true,
	 *     ),
	 * ),
	 * </code>
	 *
	 * The code above will show a link to PHPMyAdmin when browsing the webroot
	 * which will open in a new tab
	 *
	 * Default: array()
	 */

	'custom_links' => array(),

	/**
	 * Language
	 *
	 * EXPERIMENTAL
	 *
	 * @var string The language for the application
	 * @since 1.3.0
	 * @todo Complete translations & consider alternative translation methods
	 *
	 * Available languages:
	 *
	 * - English
	 * - Russian *
	 * - German
	 * - Japanese *
	 * - Spanish *
	 * - French
	 * - Chinese *
	 * - Portuguese
	 * - Italian
	 * - Polish
	 *
	 * * Not verified by native speaker
	 *
	 * Languages chosen based on:
	 * https://en.wikipedia.org/wiki/Languages_used_on_the_Internet
	 *
	 * Default: 'English'
	 */

	'language' => 'English',

	/**
	 * Password
	 *
	 * @var string Protect directory browsing with a password
	 * @since 1.3.0
	 *
	 * Leave blank (or comment out) for no password
	 *
	 * Default: ''
	 */

	'password' => '',

	/**
	 * Timeout
	 *
	 * @var int Seconds of inactivity before password needs to be re-entered
	 * @since 1.3.0
	 *
	 * Is ignored if `password` is blank or commented out
	 *
	 * Set to 0 to require password every time
	 *
	 * Default: 1800
	 */

	'timeout' => 1800,

	/**
	 * Debug Mode
	 *
	 * @var bool Errors will be shown when enabled, hidden when disabled
	 * @since 1.3.0
	 *
	 * Default: false
	 */

	'debug_mode' => false,

	/**
	 * Transitions
	 *
	 * EXPERIMENTAL
	 *
	 * @var bool Whether transition effects are shown
	 * @since 1.4.0
	 * @todo Resolve issue whereby transition never stops if URI doesn't change
	 *
	 * Default: false
	 */

	'transitions' => false,

	/**
	 * Hide Dotfiles
	 *
	 * @var bool Whether dotfiles should be hidden
	 * @since 1.4.0
	 *
	 * Default: false
	 */

	'hide_dotfiles' => false,

	/**
	 * Ignored Names
	 *
	 * @var array Names (or parts of names) to ignore in file/folder listings
	 * @since 1.4.0
	 *
	 * Default: array();
	 */

	'ignored_names' => array(),

	/**
	 * Disable Update Checks
	 *
	 * @var bool Whether update checks should be disabled
	 * @since 1.4.0
	 *
	 * Default: false;
	 */

	'disable_update_checks' => false,

);