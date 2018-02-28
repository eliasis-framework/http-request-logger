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
    'table' => [
        'request' => [
            'id' => 'request_id',
            'ip' => 'request_ip',
            'uri' => 'request_uri',
            'protocol' => 'request_protocol',
            'method' => 'request_method',
            'referer' => 'request_referer',
            'user_agent' => 'request_user_agent',
            'http_state' => 'request_http_state',
            'load_time' => 'request_load_time',
            'created' => 'created'
        ],
    ],
];
