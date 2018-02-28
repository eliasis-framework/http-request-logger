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
use Eliasis\Complement\Type\Plugin;

$controller = Plugin::HttpRequestLogger()->getOption('namespaces', 'controller');

return [
    'hooks' => [
        ['plugin-load', [$controller . 'Launcher', 'init'], 8, 0]
    ],
];
