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

$controller = Module::Request()->get('namespaces', 'controller');

return [

	'hooks' => [

		['module-load', [$controller.'Launcher\\Launcher', 'init'], 8, 0],
		['Request\set', [$controller.'Request\\Request',   'set'],  8, 0],
	]
];