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

return [
    
    'table' => [

        'global' => [

            'created' => 'created',
            'updated' => 'updated',
        ],

        'requests' => [

            'tablename'  => 'requests',
            'id'         => 'request_id',
            'ip'         => 'ip',
            'uri'        => 'uri',
            'protocol'   => 'protocol',
            'method'     => 'method',
            'referer'    => 'referer',
            'user_agent' => 'user_agent',
            'http_state' => 'http_state',
            'resp_state' => 'resp_state',
            'load_time'  => 'load_time',
        ],
    ],
];
