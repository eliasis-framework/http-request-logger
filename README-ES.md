# Request · Eliasis PHP Framework module

[![Latest Stable Version](https://poser.pugx.org/eliasis-framework/request/v/stable)](https://packagist.org/packages/eliasis-framework/request) [![Total Downloads](https://poser.pugx.org/eliasis-framework/request/downloads)](https://packagist.org/packages/eliasis-framework/request) [![Latest Unstable Version](https://poser.pugx.org/eliasis-framework/request/v/unstable)](https://packagist.org/packages/eliasis-framework/request) [![License](https://poser.pugx.org/eliasis-framework/request/license)](https://packagist.org/packages/eliasis-framework/request)

[English version](README.md)

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Cómo empezar y ejemplos](#cómo-empezar-y-ejemplos)
- [Contribuir](#contribuir)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

<p align="center"><strong>Echa un vistazo al código</strong></p>

<p align="center">
  <a href="https://youtu.be/HowOj_rzkp0" title="Echa un vistazo al código">
  	<img src="https://raw.githubusercontent.com/Josantonius/PHP-Algorithm/master/resources/youtube-thumbnail.jpg">
  </a>
</p>

---

Guarda información sobre las peticiones en la base de datos.

### Instalación 

Tienes varias opciones para instalar un módulo en Eliasis PHP Framework:

**Composer**

La mejor manera de hacerlo es utilizando [Composer](http://getcomposer.org/download/).

    $ composer require eliasis-framework/request

El comando anterior sólo instalará los archivos necesarios, si prefieres descargar todo el código fuente (incluyendo tests, directorio vendor, excepciones no utilizadas, documentos...) puedes utilizar:

    $ composer require eliasis-framework/request --prefer-source
    
**Git**

También puedes extraer el contenido del módulo Eliasis en app/modules/request/ o utilizando [git clone](http://www.kernel.org/pub/software/scm/git/docs/git-clone.html) en el directorio de módulos.

    $ cd app/modules
    $ git clone https://github.com/Eliasis-Framework/request.git

### Requisitos

Este módulo es soportado por versiones de PHP 5.6 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

### Cómo empezar y ejemplos

Para utilizar este módulo, simplemente:

**Agregua lo siguiente a los archivos de configuración de la aplicación**

```php
return [

    'module' => [

        'Request' => [

        	'database-id' => 'custom-id',
        ]
    ],
];
```

**La petición se guardará en la base de datos cuando todo haya sido ejecutado (register_shutdown_function). Puedes guardarla antes ejecuntando el siguiente hook:**

```php

Hook::doAction('Request\insert');

Hook::doAction('Request\insert', $responseState = 587); // Opcional
```

### Contribuir
1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

### Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).