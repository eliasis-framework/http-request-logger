# HTTP Request Logger · Eliasis PHP Framework plugin

[![Packagist](https://img.shields.io/packagist/v/eliasis-framework/http-request-logger.svg)](https://packagist.org/packages/eliasis-framework/http-request-logger)
[![License](https://img.shields.io/packagist/l/eliasis-framework/http-request-logger.svg)](https://github.com/eliasis-framework/http-request-logger/blob/master/LICENSE)

[Versión en español](README-ES.md)

Save HTTP request information to the database.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Tests](#tests)
- [Patrocinar](#patrocinar)
- [Licencia](#licencia)

---

## Requirements

This plugin is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **HTTP Request Logger**, simply:

    composer require eliasis-framework/http-request-logger

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    composer require eliasis-framework/http-request-logger --prefer-source

You can also **clone the complete repository** with Git:

    git clone https://github.com/eliasis-framework/http-request-logger.git

## Usage

To use this plugin, your [Eliasis application](https://github.com/eliasis-framework/eliasis) must use the [PHP-Database](https://eliasis-framework.github.io/eliasis/v1.1.3/lang/en/#libraries-Database) library and add the following to the application configuration files:

```php
/**
 * eliasis-app/config/complements.php
 */
return [

    'plugin' => [

        'http-request-logger' => [

            'db-id' => 'app',
            'db-prefix' => 'test_',
            'db-charset' => 'utf8',
            'db-engine' => 'innodb'
        ],
    ],
];
```

This will create the `test_request` table and automatically save all HTTP requests.

The table structure created is as follows:

| Columns | Data type | Example |
| --- | --- | --- |
| request_id | INT(9) | 1 |
| request_ip | VARCHAR(45) | 87.142.85.70 |
| request_uri | TEXT | /sample-app/ |
| request_protocol | VARCHAR(100) | HTTP/1.1 |
| request_method | VARCHAR(15) | GET |
| request_referer | VARCHAR(255) | <http://www.google.es/> |
| request_user_agent | VARCHAR(255) | Mozilla/5.0 (...) |
| request_http_state | INT(3) | 200 |
| request_load_time | FLOAT | 0.008 |
| created | TIMESTAMP | 2018-02-28 08:26:43 |

## Tests

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    git clone https://github.com/eliasis-framework/http-request-logger.git
    
    cd http-request-logger

    composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    composer phpunit

Run [PSR2](http://www.php-fig.org/psr/psr-2/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    composer phpmd

Run all previous tests:

    composer tests

## Patrocinar

Si este proyecto te ayuda a reducir el tiempo de desarrollo,
[puedes patrocinarme](https://github.com/josantonius/lang/es-ES/README.md#patrocinar)
para apoyar mi trabajo :blush:

## Licencia

Este repositorio tiene una licencia [MIT License](LICENSE).

Copyright © 2017-2022, [Josantonius](https://github.com/josantonius/lang/es-ES/README.md#contacto)
