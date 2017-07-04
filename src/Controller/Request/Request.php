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

use Eliasis\App\App,
    Eliasis\Module\Module,
    Eliasis\Controller\Controller,
    Josantonius\LoadTime\LoadTime;
    
/**
 * Module main controller.
 *
 * @since 1.0.0
 */
class Request extends Controller {

    /**
     * Set whether the request has been inserted.
     *
     * @since 1.0.0
     *
     * @var string $inserted
     */
    public $inserted = false;

    /**
     * Create tables.
     *
     * @since 1.0.0
     *
     * @return bool true|false
     */
    public function createTable() {

        $this->model->createTable();
    }

    /**
     * Insert row.
     *
     * @since 1.0.0
     *
     * @param int $responseState → API response
     *
     * @return int → id inserted
     */
    public function insert($responseState = 0) {

        if (!$this->inserted) {
            
            $this->inserted = true;

            $server = Module::Request()->get('server');

            return $this->model->insert(
                App::IP(),
                $server['uri'],
                $server['protocol'],
                $server['method'],
                $server['referer'],
                $server['user_agent'],
                http_response_code(),
                $responseState,
                LoadTime::end()
            );
        }
    }

    /**
     * Delete tables.
     *
     * @since 1.0.0
     *
     * @return bool true|false
     */
    public function dropTable() {

        return $this->model->dropTable();
    }
}
