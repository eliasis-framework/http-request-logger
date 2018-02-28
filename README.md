# HTTP Request Logger · Eliasis PHP Framework plugin

[![Packagist](https://img.shields.io/packagist/v/eliasis-framework/http-request-logger.svg)](https://packagist.org/packages/eliasis-framework/http-request-logger) [![Downloads](https://img.shields.io/packagist/dt/eliasis-framework/http-request-logger.svg)](https://github.com/eliasis-framework/http-request-logger) [![License](https://img.shields.io/packagist/l/eliasis-framework/http-request-logger.svg)](https://github.com/eliasis-framework/http-request-logger/blob/master/LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/604b93f429f5419ca30c57bfe646d0df)](https://www.codacy.com/app/Josantonius/http-request-logger?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=eliasis-framework/http-request-logger&amp;utm_campaign=Badge_Grade) [![Build Status](https://travis-ci.org/eliasis-framework/http-request-logger.svg?branch=master)](https://travis-ci.org/eliasis-framework/http-request-logger) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![codecov](https://codecov.io/gh/eliasis-framework/http-request-logger/branch/master/graph/badge.svg)](https://codecov.io/gh/eliasis-framework/http-request-logger)

[Versión en español](README-ES.md)

Save HTTP request information to the database.

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#-todo)
- [Contribute](#contribute)
- [License](#license)
- [Copyright](#copyright)

---

## Requirements

This plugin is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **HTTP Request Logger**, simply:

    $ composer require eliasis-framework/http-request-logger

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    $ composer require eliasis-framework/http-request-logger --prefer-source

You can also **clone the complete repository** with Git:

    $ git clone https://github.com/eliasis-framework/http-request-logger.git

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

| Columns | Datatype | Example |
| --- | --- | --- |
| request_id | INT(9) | 1 |
| request_ip | VARCHAR(45) | 87.142.85.70 |
| request_uri | TEXT | /sample-app/ |
| request_protocol | VARCHAR(100) | HTTP/1.1 |
| request_method | VARCHAR(15) | GET |
| request_referer | VARCHAR(255) | http://www.google.es/ |
| request_user_agent | VARCHAR(255) | Mozilla/5.0 (...) |
| request_http_state | INT(3) | 200 |
| request_load_time | FLOAT | 0.008 |
| created | TIMESTAMP | 2018-02-28 08:26:43 |

## Tests 

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    $ git clone https://github.com/eliasis-framework/http-request-logger.git
    
    $ cd http-request-logger

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Run [PSR2](http://www.php-fig.org/psr/psr-2/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    $ composer phpmd

Run all previous tests:

    $ composer tests

## ☑ TODO

- [ ] Add getter methods.
- [ ] Add new feature.
- [ ] Improve tests.
- [ ] Improve documentation.
- [ ] Refactor code for disabled code style rules. See [phpmd.xml](phpmd.xml) and [.php_cs.dist](.php_cs.dist).

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/eliasis-framework/http-request-logger/issues) or the [To Do](#-todo) checklist.

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Run the command `composer install` to install the dependencies.
  This will also install the [dev dependencies](https://getcomposer.org/doc/03-cli.md#install).
* Run the command `composer fix` to excute code standard fixers.
* Run the [tests](#tests).
* Create a **branch**, **commit**, **push** and send me a
  [pull request](https://help.github.com/articles/using-pull-requests).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2017 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).