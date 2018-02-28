# HTTP Request Logger · Eliasis PHP Framework plugin

[![Packagist](https://img.shields.io/packagist/v/eliasis-framework/http-request-logger.svg)](https://packagist.org/packages/eliasis-framework/http-request-logger) [![Downloads](https://img.shields.io/packagist/dt/eliasis-framework/http-request-logger.svg)](https://github.com/eliasis-framework/http-request-logger) [![License](https://img.shields.io/packagist/l/eliasis-framework/http-request-logger.svg)](https://github.com/eliasis-framework/http-request-logger/blob/master/LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/604b93f429f5419ca30c57bfe646d0df)](https://www.codacy.com/app/Josantonius/http-request-logger?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=eliasis-framework/http-request-logger&amp;utm_campaign=Badge_Grade) [![Build Status](https://travis-ci.org/eliasis-framework/http-request-logger.svg?branch=master)](https://travis-ci.org/eliasis-framework/http-request-logger) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![codecov](https://codecov.io/gh/eliasis-framework/http-request-logger/branch/master/graph/badge.svg)](https://codecov.io/gh/eliasis-framework/http-request-logger)

[English version](README.md)

Guarda información sobre peticiones HTTP en la base de datos.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

## Requisitos

Este plugin es soportado por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Instalación 

La mejor forma de instalar este plugin es a través de [Composer](http://getcomposer.org/download/).

Para instalar **HTTP Request Logger**, simplemente escribe:

    $ composer require eliasis-framework/http-request-logger

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    $ composer require eliasis-framework/http-request-logger --prefer-source

También puedes **clonar el repositorio** completo con Git:

    $ git clone https://github.com/eliasis-framework/http-request-logger.git

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

| request_id | request_ip | request_uri | request_protocol | request_method | request_referer | request_user_agent | request_http_state | request_load_time | created
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| `1` | `87.142.85.70` | `/sample-app/` | `HTTP/1.1` | `GET` | `http://www.google.es/` | `Mozilla/5.0 (...)` | `200` | `0.008` | `2018-02-28 08:26:43` |

## Tests 

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    $ git clone https://github.com/eliasis-framework/http-request-logger.git
    
    $ cd http-request-logger

    $ composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Ejecutar pruebas de estándares de código [PSR2](http://www.php-fig.org/psr/psr-2/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

    $ composer phpmd

Ejecutar todas las pruebas anteriores:

    $ composer tests

## ☑ Tareas pendientes

- [ ] Agregar métodos de obtención (getter).
- [ ] Añadir nueva funcionalidad.
- [ ] Mejorar pruebas.
- [ ] Mejorar documentación.
- [ ] Refactorizar código para las reglas de estilo de código deshabilitadas. Ver [phpmd.xml](phpmd.xml) y [.php_cs.dist](.php_cs.dist).

## Contribuir

Si deseas colaborar, puedes echar un vistazo a la lista de
[issues](https://github.com/eliasis-framework/http-request-logger/issues) o [tareas pendientes](#-tareas-pendientes).

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Ejecuta el comando `composer install` para instalar dependencias.
  Esto también instalará las [dependencias de desarrollo](https://getcomposer.org/doc/03-cli.md#install).
* Ejecuta el comando `composer fix` para estandarizar el código.
* Ejecuta las [pruebas](#tests).
* Crea una nueva rama (**branch**), **commit**, **push** y envíame un
  [pull request](https://help.github.com/articles/using-pull-requests).

## Repositorio

La estructura de archivos de este repositorio se creó con [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

## Copyright

2016 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).