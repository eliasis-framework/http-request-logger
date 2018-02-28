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
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';

return [
    'server' => [
        'referer' => $referer,
        'uri' => $_SERVER['REQUEST_URI'],
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'protocol' => $_SERVER['SERVER_PROTOCOL'],
        'method' => $_SERVER['REQUEST_METHOD'],
    ],
];
