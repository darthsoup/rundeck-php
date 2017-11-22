Rundeck PHP API
===============

PHP API Wrapper for [Rundeck](http://rundeck.org/)

This package is work in progress, not all api features are included

The current tested API version of rundeck is 20, other my work but it's untested.

## Installation

The recommended way to install Guzzle is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version.

```bash
php composer.phar require darthsoup/rundeck-php
```

## Usage

### Init API Wrapper

To init the api wrapper, register a http wrapper and create the rundeck base class.

```php
require_once '../vendor/autoload.php';

$adapter = new DarthSoup\Rundeck\Adapter\Guzzle6Adapter('<yourrundeckapitoken>');

$rundeck = new DarthSoup\Rundeck\Rundeck($adapter, 'https://<yourrundeckurl>/api/20');
```

You are now ready to start

### Basic API Request

Get current rundeck system info

```php
$systeminfo = $rundeck->system()->info()
var_dump(systeminfo);
```

## Support

[Please open an issue in github](https://github.com/darthsoup/rundeck-php/issues)

## License

This package is released under the MIT License. See the bundled
[LICENSE](https://github.com/darthsoup/rundeck-php/blob/master/LICENSE.md) file for details.
