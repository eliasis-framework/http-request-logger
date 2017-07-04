# Request · Eliasis PHP Framework module

[![Latest Stable Version](https://poser.pugx.org/eliasis-framework/request/v/stable)](https://packagist.org/packages/eliasis-framework/request) [![Total Downloads](https://poser.pugx.org/eliasis-framework/request/downloads)](https://packagist.org/packages/eliasis-framework/request) [![Latest Unstable Version](https://poser.pugx.org/eliasis-framework/request/v/unstable)](https://packagist.org/packages/eliasis-framework/request) [![License](https://poser.pugx.org/eliasis-framework/request/license)](https://packagist.org/packages/eliasis-framework/request)

[Versión en español](README-ES.md)

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Quick Start and Examples](#quick-start-and-examples)
- [Contribute](#contribute)
- [Licensing](#licensing)
- [Copyright](#copyright)

---

Saves information about requests in the database.

### Installation

You have several options to install a module in Eliasis PHP Framework:

**Composer**

The best way to do this is to use [Composer](http://getcomposer.org/download/).

    $ composer require eliasis-framework/request

The previous command will only install the necessary files, if you prefer to download the entire source code (including tests, vendor folder, exceptions not used, docs...) you can use:

    $ composer require eliasis-framework/request --prefer-source
    
**Git**

You can also extract the Eliasis module content in app/modules/request/ or use [git clone](http://www.kernel.org/pub/software/scm/git/docs/git-clone.html) in the modules directory.

    $ cd app/modules
    $ git clone https://github.com/Eliasis-Framework/request.git

### Requirements

This module is supported by PHP versions 5.6 or higher and is compatible with HHVM versions 3.0 or higher.

### Quick Start and Examples

To use this module, simply:

**Add the following to the application configuration files**

```php
return [

    'module' => [

        'Request' => [

        	'db-id' => 'custom-id',
        ]
    ],
];
```

**The request will be saved to the database when everything has been executed (register_shutdown_function). You can save it by executing the following hook:**

```php

use Josantonius\Hook\Hook;

Hook::doAction('Request\insert');

Hook::doAction('Request\insert', $responseState = 587); // Optional
```

### Contribute
1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### Licensing

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).