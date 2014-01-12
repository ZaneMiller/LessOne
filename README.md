LessOne
=======

Automatically creates a single .css file from a collection of .less files using lessphp

Instalation
===========

Add `zanemiller/less-one` as a requirement to composer.json:
```javascript
{
	"require": {
    	"zanemiller/less-one": "0.2.*"
	}
}
```

Run the composer update utility with `composer update` or install with `composer install`

You now register the package with Laravel.
Open `app/config/app.php` and add find the *providers* section and add:

```php
'Zanemiller\LessOne\LessOneServiceProvider'
```

Next find the *aliases* section and add:

```php
	'LessOne' => 'Zanemiller\LessOne'
```

Configuration
=============

First publish a copy of the configuration file with Aritisan:

```
$ php artisan config:publish zanemiller/less-one
```
The settings files can now be found in `/app/config/packages/zanemiller/less-one/config.php`

Usage
=====

LessOne couldn't be easier to use simply call:

```php
LessOne::make()
```

Where you want the `<link>` tag to be inserted in your view.