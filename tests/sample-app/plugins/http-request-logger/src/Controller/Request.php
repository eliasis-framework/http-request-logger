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
namespace Eliasis\Plugins\HttpRequestLogger\Controller;

use Eliasis\Complement\Type\Plugin;
use Eliasis\Framework\App;
use Eliasis\Framework\Controller;
use Josantonius\LoadTime\LoadTime;

/**
 * Plugin main controller.
 */
class Request extends Controller
{
    /**
     * Set whether the request has been inserted.
     *
     * @var string
     */
    public $inserted = false;

    /**
     * Create tables.
     *
     * @return bool true|false
     */
    public function createTable()
    {
        return $this->model->createTable();
    }

    /**
     * Insert row.
     *
     * @return int → id inserted
     */
    public function insert()
    {
        if (! $this->inserted) {
            $this->inserted = true;

            $server = Plugin::HttpRequestLogger()->getOption('server');

            return $this->model->insert(
                App::IP(),
                $server['uri'],
                $server['protocol'],
                $server['method'],
                $server['referer'],
                $server['user_agent'],
                http_response_code(),
                LoadTime::end()
            );
        }
    }

    /**
     * Delete tables.
     *
     * @return bool true|false
     */
    public function dropTable()
    {
        return $this->model->dropTable();
    }
}
