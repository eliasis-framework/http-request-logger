<?php
/**
 * Save HTTP request information to the database.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 - 2018 (c) Josantonius - HTTP Request Logger
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/eliasis-framework/http-request-logger.git
 * @since     1.0.1
 */
session_start();

require __DIR__ . '/../vendor/autoload.php';

use Josantonius\File\File;

/*
 * Clone complement.
 */
$plugin = 'http-request-logger';

$path = 'sample-app/plugins';

File::deleteDirRecursively(__DIR__ . '/sample-app/plugins/');

File::copyDirRecursively(
    __DIR__ . '/../config/',
    __DIR__ . "/$path/$plugin/config/"
);

File::copyDirRecursively(
    __DIR__ . '/../src/',
    __DIR__ . "/$path/$plugin/src/"
);

copy(
    __DIR__ . "/../$plugin.json",
    __DIR__ . "/$path/$plugin/$plugin.json"
);
