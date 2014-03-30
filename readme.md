# Teepee

by [richjenks.com](http://richjenks.com)

Responsive index pages for Apache.

## Setup

1. Move the Teepee folder to your webserver (*e.g.* `/resources/`)
2. Move `.htaccess` from the Teepee folder to the webroot (or append its content to your current `.htaccess`)
3. Edit `.htaccess` so the following line points to Teepee's `index.php`:

```htaccess
RewriteRule .* /path/to/teepee/index.php [L]
```

## Requirements

1. `mod_rewrite` must be enabled
2. Site must be able to override `mod_rewrite` directives

### 1. mod_rewrite

Enable mod_rewrite with:

```shell
sudo a2enmod rewrite
sudo service apache2 restart
```

### 2. AllowOverride

For most cases, in `/etc/apache2/sites-available/default`, ensure the `AllowOverride` directive has atleast `FileInfo`:

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
