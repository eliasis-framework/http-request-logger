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

namespace Eliasis\Modules\Request\Controller\Launcher;

use Eliasis\App\App,
    Eliasis\Module\Module,
    Eliasis\Controller\Controller,
    Josantonius\LoadTime\LoadTime,
    Eliasis\Modules\Request\Controller\Exception\RequestException;
    
/**
 * Module main controller.
 *
 * @since 1.0.0
 */
class Launcher extends Controller {

    /**
     * Main method.
     *
     * @since 1.0.0
     */
    public function init() {
        
        if (!LoadTime::isActive()) {

            LoadTime::start();
        }

        register_shutdown_function(

            [Module::Request()->instance('Request'), 'insert']
        );
    }

    /**
     * Get database id.
     *
     * @since 1.0.0
     *
     * @throws RequestException → database id not found
     */
    public static function getDatabaseId() {

        $id = App::get('module', 'Request', 'db-id');

        if (empty($id)) {

            $message = 'A valid database id was not found at';

            $option = "App::get('module', 'Request', 'db-id')";

            throw new RequestException($message . ': ' . $option, 821);
        }

        return Module::Request()->set('db-id', $id);
    }

    /**
     * Activation hook.
     *
     * @since 1.0.0
     */
    public function activation() {

        Module::Request()->instance('Request')->createTable();
    }

    /**
     * Deactivation hook.
     *
     * @since 1.0.0
     */
    public function deactivation() {

        Module::Request()->instance('Request')->dropTable();
    }
}
