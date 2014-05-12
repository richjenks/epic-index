# Teepee

**A new home for Apache**

![](https://richjenks.github.io/teepee/teepee.png)

## About

Teepee is a simple, minimal and responsive replacement for Apache's autoindex.

**Get Teepee at [https://github.com/richjenks/teepee/](https://github.com/richjenks/teepee/)**

Typical desktop screens get a large, spacious table and smaller screens (like tablets and large phones) get a slightly scaled-down version to use available space more efficiently. Anything smaller gets a fullscreen, no-frills version that relies on typography alone.

## Installation

1. Move the Teepee folder to your webserver
2. If you're not putting Teepee's files on the webroot, move `.htaccess` from the Teepee folder to the webroot or append its content to your current `.htaccess`
3. Edit `.htaccess` so the following line points to the Teepee folder from the webroot:

    ```
    RewriteRule .* /resources/teepee/ [L]
    ```

## Options

Teepee has several option in `config.php` that you may wish to change. They are:

- **Filesize Precision**: The number of decimal places shown for a filesize
- **Root Label**: The name given to the parent link which points to webroot
- **Date Format**: The format for modified dates
- **Hover Info**: Whether file/folder/link info shows on hover in title attribute
- **Show Footer**: Whether the footer (attribution & app version) will be shown
- **Custom Links**: Links shown beneath parent and above folders to wherever you like, e.g. PHPMyAdmin

## Updating

1. Download the new version of Teepee
2. Backup your existing `config.php` file
3. Delete all files in your existing Teepee folder
4. Move the new version of Teepee into the folder
5. Integrate settings from your backed-up `config.php` into the new version

## Requirements

1. `mod_rewrite` must be enabled
2. Site must be able to override `mod_rewrite` directives
3. PHP 5.5

### 1. mod_rewrite

Enable mod_rewrite with:

    sudo a2enmod rewrite  
    sudo service apache2 restart

### 2. AllowOverride

For most cases on Linux, edit `/etc/apache2/sites-available/default` and ensure the `AllowOverride` directive has atleast `FileInfo`:

    <Directory /var/www/>  
        Options Indexes FollowSymLinks MultiViews  
        AllowOverride FileInfo   
        Order allow,deny  
        allow from all  
    </Directory>

Reference: https://httpd.apache.org/docs/2.2/mod/core.html#allowoverride

## Props

Props to [Adam Whitcroft for Apaxy](https://github.com/AdamWhitcroft/Apaxy), who gives props to [Lars Jung for h5ai](http://larsjung.de/h5ai/).

## Changelog

### v1.1.0

- "File" column header is now called "Name"
- Added config.php with various options for customising Teepee
- Added option for filesize precision
- Added option for root label
- Added option for date format
- Added options for custom links
- Added option for custom links (see `config.php` for usage)
- Teepee cannot index itself
