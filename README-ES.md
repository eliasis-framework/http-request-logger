# HTTP Request Logger · Eliasis PHP Framework plugin

[![Packagist](https://img.shields.io/packagist/v/eliasis-framework/http-request-logger.svg)](https://packagist.org/packages/eliasis-framework/http-request-logger)
[![License](https://img.shields.io/packagist/l/eliasis-framework/http-request-logger.svg)](https://github.com/eliasis-framework/http-request-logger/blob/master/LICENSE)

[English version](README.md)

Guarda información sobre peticiones HTTP en la base de datos.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Uso](#uso)
- [Tests](#tests)
- [Sponsor](#Sponsor)
- [License](#license)

---

## Requisitos

Este plugin es soportado por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Instalación

La mejor forma de instalar este plugin es a través de [Composer](http://getcomposer.org/download/).

Para instalar **HTTP Request Logger**, simplemente escribe:

    composer require eliasis-framework/http-request-logger

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    composer require eliasis-framework/http-request-logger --prefer-source

También puedes **clonar el repositorio** completo con Git:

    git clone https://github.com/eliasis-framework/http-request-logger.git

## Uso

Para utilizar este plugin, tu [aplicación Eliasis](https://github.com/eliasis-framework/eliasis) debes utilizar la biblioteca [PHP-Database](https://eliasis-framework.github.io/eliasis/v1.1.3/lang/en/#libraries-Database) y agregar lo siguiente en los archivos de configuración de la aplicación:

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

Esto creará la tabla `test_request` y automáticamente guardará todas las peticiones HTTP recibidas en el sitio.

La estructura de la tabla creada es la siguiente:

| Columnas | Tipo de dato | Ejemplo |
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

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    git clone https://github.com/eliasis-framework/http-request-logger.git
    
    cd http-request-logger

    composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    composer phpunit

Ejecutar pruebas de estándares de código [PSR2](http://www.php-fig.org/psr/psr-2/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    composer phpcs

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

    composer phpmd

Ejecutar todas las pruebas anteriores:

    composer tests

## Sponsor

If this project helps you to reduce your development time,
[you can sponsor me](https://github.com/josantonius#sponsor) to support my open source work :blush:

## License

This repository is licensed under the [MIT License](LICENSE).

Copyright © 2017-2022, [Josantonius](https://github.com/josantonius#contact)
