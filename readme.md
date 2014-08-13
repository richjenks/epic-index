# Teepee

**A new home for Apache**

![](https://richjenks.github.io/teepee/teepee.png)

## About

Teepee is a simple, minimal and responsive replacement for Apache's autoindex.

**Get Teepee at [https://github.com/richjenks/teepee/](https://github.com/richjenks/teepee/)**

Typical desktop screens get a large, spacious table and smaller screens (like tablets and large phones) get a fullscreen, no-frills version that relies on typography alone.

## Features

- **Usable file listing**: Browse files in a clean interface.
- **Responsive**: Need to show something on your phone? Navigating localhost is easy!
- **Custom Links**: Want a link to your PHPMyAdmin from webroot? How about some reference material from within a project folder? Custom Links can do just that.
- **Hide files/folders or dotfiles**: Prevent certainsensitive files/folders being listed.
- **Password Protection**: Want to put Teepee on a network- or public-accessible URL? No problem; just add a password.
- **Breadcrumbs**: They worked for Hansel and Grettel, now they'll work for you!
- **Friendly Errors**: 403 or 404 errors are handled gracefully.
- **Faenza Icons**: Modern and unambiguous icons.
- **Friendly Filesizes**: Can handle up to yottabyte-sized files—that's 1 trillion terabytes
- **Options**: Customise all aspects of your file listings.

## Installation

1. Move the Teepee folder to your webserver
2. Rename `config.sample.php` to `config.php`
3. If you're not putting Teepee's files on the webroot, move `.htaccess` from the Teepee folder to the webroot or append its content to your current `.htaccess`
4. Edit `.htaccess` so the following lines point to the Teepee folder from the webroot:

    ```
    RewriteRule .* /resources/teepee/ [L]
    ErrorDocument 403 /resources/teepee/
    ErrorDocument 404 /resources/teepee/
    ```


## Options

Teepee has several option in `config.php` that you may wish to change. They are:

- **Filesize Precision**: The number of decimal places shown for a filesize
- **Root Label**: The name given to the parent link which points to webroot
- **Date Format**: The format for modified dates
- **Hover Info**: Whether file/folder/link info shows on hover in title attribute
- **Custom Links**: Links shown beneath parent and above folders to wherever you like, e.g. PHPMyAdmin
- **Language**: The language for your directory listings
- **Password**: The password required to show your directory listings
- **Timeout**: Seconds of inactivity before the password requires re-entry
- **Debug Mode**: Whether to show app errors or not—useful if you want to report an issue
- **Transitions**: Experimentatl feature which adds transitions on navigation
- **Hide Dotfiles**: Removes files/folder starting with a dot from listings
- **Ignored Names**: Names (or parts of names) to not show in listings
- **Disable Update Checkes**: If update notices are intrusive, this turns them off

## Updating

1. Download the new version of Teepee
2. Backup your existing `config.php` file
3. Delete all files in your existing Teepee folder
4. Move the new version of Teepee into the folder
5. Rename `config.sample.php` to `config.php`
6. Integrate settings from your backed-up `config.php` into the new version
7. Replace your `.htaccess` file/section with the new version

## Requirements

1. Apache 2.4 & PHP 5.4
2. `mod_rewrite` must be enabled
3. Site must be able to override `mod_rewrite` directives

### mod_rewrite

Enable mod_rewrite with:

    sudo a2enmod rewrite
    sudo service apache2 restart

### AllowOverride

For most cases on Linux, edit `/etc/apache2/sites-available/default` and ensure the `AllowOverride` directive has atleast `FileInfo`:

    <Directory /var/www/>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride FileInfo
        Order allow,deny
        allow from all
    </Directory>

Reference: https://httpd.apache.org/docs/2.2/mod/core.html#allowoverride

## Roadmap

- Better multilingual support
- More icons
- Different views
- Themes
- Basic text editor

## Props

Props to [Adam Whitcroft for Apaxy](https://github.com/AdamWhitcroft/Apaxy), who gives props to [Lars Jung for h5ai](http://larsjung.de/h5ai/).

## Changelog

### 1.4.0

- Feature: Automatic update checks
- Feature: Handles 404 & 403 errors
- Feature: Added notice for old browsers
- Feature: Added option to hide dotfiles
- Feature: Added option to hide files/folders matching strings
- Feature: Added experimental feature "Transitions"
- Fix: Errors due to permissions or non-existent file/folder
- Core: Interface improvements on mobile
- Core: Code documentation reviewed & improved

### v1.3.0

- Feature: Added password protection feature
- Feature: Debug mode option for outputting errors
- Fix: Each row had 2 vertical px on unclickable space
- Fix: Broken stylesheet link when Apache document root ends with a slash
- Fix: General support for Windows
- Core: Migrated styles to SASS and started minifying
- Core: Helpers & Requires heavily refactored
- Core: Icons are media objects that don't wrap below text
- Core: `config.sample.php` now shipped instead of `config.php`

### v1.2.0

- Fix: View bug when running on PHP 5.4
- Fix: root_label and icon not showing in sub dir of webroot
- Core: Config options refactored with safe defaults

### v1.1.0

- Feature: Added config.php with various options for customising Teepee
- Feature: Added option for filesize precision
- Feature: Added option for root label
- Feature: Added option for date format
- Feature: Added options for custom links
- Feature: Added option for custom links (see `config.php` for usage)
- Fix: Teepee cannot index itself
- Core: "File" column header is now called "Name"
