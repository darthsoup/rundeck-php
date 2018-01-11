# Rundeck API Wrapper for PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/darthsoup/rundeck-php.svg?style=flat-square)](https://packagist.org/packages/darthsoup/rundeck-php)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/darthsoup/rundeck-php.svg?style=flat-square)](https://packagist.org/packages/darthsoup/rundeck-php)

PHP API Wrapper for [Rundeck](http://rundeck.org/)

This package is work in progress, not all api features are currently included.

The currently tested API version of Rundeck is `20`, other versions may work but they are untested.

## Install

You can install the package via composer:

```bash
composer require darthsoup/rundeck-php
```

## Usage

### Init API Wrapper

To init the API wrapper, register a HTTP adapter and create the Rundeck base class.

```php
require_once '../vendor/autoload.php';

$adapter = new DarthSoup\Rundeck\Adapter\GuzzleHttpAdapter('<yourRundeckApiToken>');

$rundeck = new DarthSoup\Rundeck\Rundeck($adapter, 'https://<yourRundeckUrl>/api/20');
```

You are now ready to start.

### Start a Job

Jobs are started by `runJob` with the Job UUID as first parameter.
You also can add a `argString` to include some options.

```php
$job = $rundeck->job()->runJob('<YourJobUuid></YourJobUuid>', ['argString' => '-ArgTest1 yourstring'])
var_dump($job);
```

### Execution Info of a Job

The Output of a Execution can returned by this command.

```php
$execution = $rundeck->execution()->output(<ExecutionId>)
var_dump($execution);
```

### Rundeck System Info

Get current Rundeck System Info

```php
$systeminfo = $rundeck->system()->info()
var_dump(systeminfo);
```

## Support

[Please open an issue in github](https://github.com/darthsoup/rundeck-php/issues)

## License

This package is released under the MIT License. See the bundled
[LICENSE](https://github.com/darthsoup/rundeck-php/blob/master/LICENSE.md) file for details.
