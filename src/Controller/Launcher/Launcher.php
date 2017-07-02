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

        $this->_getDatabaseId();

        register_shutdown_function(

            [Module::Request()->instance('Request'), 'set']
        );
    }

    /**
     * Get database id.
     *
     * @since 1.0.0
     *
     * @throws RequestException →  database id not found
     */
    private function _getDatabaseId() {

        if (empty(Module::Request()->get('database-id'))) {

            $id = App::get('module', 'Request', 'database-id');

            $id = empty($id) ? Module::Request()->get('database-id') : $id;

            $path = Module::Request()->get('path', 'root');

            $slug = Module::Request()->get('slug');

            $pathfile = $path . $slug . '.php';

            if (empty($id)) {

                $message = 'A valid database id was not found at';

                throw new RequestException($message.': '.$pathfile, 821);
            }

            Module::Request()->set('database-id', $id);
        }
    }

    /**
     * Activation hook.
     *
     * @since 1.0.0
     */
    public function activation() {

        $this->_getDatabaseId();

        Module::Request()->instance('Request')->createTables();
    }

    /**
     * Deactivation hook.
     *
     * @since 1.0.0
     */
    public function deactivation() {

        $this->_getDatabaseId();

        Module::Request()->instance('Request')->deleteTables();
    }
}
