LessOne
=======

Automatically creates a single .css file from a collection of .less files using lessphp

Much thanks to *jtgrimes* for the less4laravel packages, upon which most of this package is based:
[https://github.com/jtgrimes/less4laravel](https://github.com/jtgrimes/less4laravel)

More thanks due to *leafo* for the lessphp packages, which this package would be useless without:
[https://github.com/leafo/lessphp](https://github.com/leafo/lessphp)

Installation
============

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
	'LessOne' => 'Zanemiller\LessOne\LessOneFacade'
```

To use LessOne with the default settings you will also have to create three folders (if they do not already exist in your project).

In the `/app` folder create two folders called `css` and `less` respectivly.

Finally in `/public` create a folder called `css`

So your final file structure should include:
```
/app
    /css
    /less
/public
    /css
```

Configuration
=============

First publish a copy of the configuration file with Aritisan:

```
$ php artisan config:publish zanemiller/less-one
```
The settings files can now be found in `/app/config/packages/zanemiller/less-one/config.php`

The details of the configuration file can be found in:
[https://github.com/ZaneMiller/LessOne/wiki/Usage](https://github.com/ZaneMiller/LessOne/wiki/Usage)

Usage
=====

LessOne couldn't be easier to use simply call:

```php
LessOne::make()
```

Where you want the `<link>` tag to be inserted in your view.
