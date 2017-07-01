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

use Josantonius\Ip\Ip;

$ip = Ip::get();

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] :'';

return [

    'server' => [

        'referer'    => $referer,
    	'ip'         => ($ip) ? $ip : 'unknown',
    	'uri'        => $_SERVER['REQUEST_URI'],
    	'user_agent' => $_SERVER['HTTP_USER_AGENT'],
    	'protocol'   => $_SERVER['SERVER_PROTOCOL'],
    	'method'     => $_SERVER['REQUEST_METHOD'],
    	'resp_state' => 0,
    ],
];
