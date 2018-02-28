<?php
/**
 * Save HTTP request information to the database.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 - 2018 (c) Josantonius - HTTP Request Logger
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/eliasis-framework/http-request-logger.git
 * @since     1.0.0
 */
return [
    'db' => [
        'app' => [
            'provider' => 'PDOprovider',
            'host' => $GLOBALS['DB_HOST'],
            'user' => $GLOBALS['DB_USER'],
            'name' => $GLOBALS['DB_NAME'],
            'password' => $GLOBALS['DB_PASSWORD'],
            'settings' => ['charset' => 'utf8'],
        ],
    ],
];
