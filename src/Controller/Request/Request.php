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

namespace Eliasis\Modules\Request\Controller\Request;

use Eliasis\Controller\Controller;
    
/**
 * Module main controller.
 *
 * @since 1.0.0
 */
class Request extends Controller {

    /**
     * Create tables.
     *
     * @since 1.0.0
     *
     * @return bool true|false
     */
    public function createTables() {

        return $this->model->createRequestsTable();
    }

    /**
     * Delete tables.
     *
     * @since 1.0.0
     *
     * @return bool true|false
     */
    public function deleteTables() {

        return $this->model->deleteRequestsTable();
    }

    /**
     * Save information about the request.
     *
     * @since 1.0.0
     *
     * @return bool true|false
     */
    public function set() {

        return $this->model->set();
    }
}
