# Teepee

by [richjenks.com](http://richjenks.com)

Responsive index pages for Apache.

Apache's autoindex is ugly as fudge and none of the few alternatives available looked or behaved like I wanted them too. Teepee is simple, minimal, beautiful on all screen sizes and, most importantly, highly-usable on mobile devices.

Typical desktop screens get a large, spacious table and smaller screens like tablets and large phones get a slightly scaled-down version to use available space more efficiently. Anything smaller gets a fullscreen, no-frills version that relies on typography alone.

## Installation

1. Move the Teepee folder to your webserver
2. If you're not putting Teepee's files on the webroot, move `.htaccess` from the Teepee folder to the webroot or append its content to your current `.htaccess`
3. Edit `.htaccess` so the following line points to the Teepee folder from the webroot:

    ```htaccess
    RewriteRule .* /resources/teepee/ [L]
    ```

## Requirements

1. `mod_rewrite` must be enabled
2. Site must be able to override `mod_rewrite` directives
3. PHP 5.5

### 1. mod_rewrite

Enable mod_rewrite with:

```shell
sudo a2enmod rewrite
sudo service apache2 restart
```

### 2. AllowOverride

For most cases on Linux, edit `/etc/apache2/sites-available/default` and ensure the `AllowOverride` directive has atleast `FileInfo`:

```ApacheConf
<Directory /var/www/>
    Options Indexes FollowSymLinks MultiViews
    AllowOverride FileInfo 
    Order allow,deny
    allow from all
</Directory>
```

Reference: https://httpd.apache.org/docs/2.2/mod/core.html#allowoverride

## Props

Props to [Adam Whitcroft for Apaxy](https://github.com/AdamWhitcroft/Apaxy), who gives props to [Lars Jung for h5ai](http://larsjung.de/h5ai/).
