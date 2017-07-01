<?php
/**
 * Eliasis PHP Framework Request module
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Eliasis-Framework/Request.git
 * @since      1.0.0
 */

use Eliasis\App\App;

$namespace = App::get('namespaces', 'modules') . 'Request';

return [

    'namespaces' => [

        'controller' => $namespace . '\\Controller\\',
    ],
];
