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

use Eliasis\Module\Module;

$namespace = Module::Request()->get('namespaces', 'controller');

return [

    'class' => [

        'Launcher' => $namespace . 'Launcher\Launcher',
    ],
];
