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
namespace Eliasis\Plugins\HttpRequestLogger\Model;

use Eliasis\Complement\Type\Plugin;
use Eliasis\Framework\Model;

/**
 * Plugin main model.
 */
class Request extends Model
{
    /**
     * Database table name.
     *
     * @var string
     */
    public $table = 'request';

    /**
     * Database prefix.
     *
     * @var array
     */
    public $columns;

    /**
     * Database prefix.
     *
     * @var string
     */
    public $prefix;

    /**
     * Database engine.
     *
     * @var string
     */
    public $engine;

    /**
     * Database charset.
     *
     * @var string
     */
    public $charset;

    /**
     * Model construct.
     */
    protected function __construct()
    {
        $plugin = Plugin::HttpRequestLogger();

        $db = $plugin->getOption('db');

        $this->prefix = $db['prefix'];
        $this->engine = $db['engine'];
        $this->charset = $db['charset'];

        $this->columns = $plugin->getOption('table', $this->table);

        $this->changeDatabaseConnection($db['id']);
    }

    /**
     * Create table.
     *
     * @return bool
     */
    public function createTable()
    {
        $data = [
            $this->columns['id'] => 'INT(9) AUTO_INCREMENT PRIMARY KEY',
            $this->columns['ip'] => 'VARCHAR(45) NOT NULL',
            $this->columns['uri'] => 'TEXT NOT NULL',
            $this->columns['protocol'] => 'VARCHAR(100) NOT NULL',
            $this->columns['method'] => 'VARCHAR(15) NOT NULL',
            $this->columns['referer'] => 'VARCHAR(255) NOT NULL',
            $this->columns['user_agent'] => 'VARCHAR(255) NOT NULL',
            $this->columns['http_state'] => 'INT(3) NOT NULL',
            $this->columns['load_time'] => 'FLOAT NOT NULL',
            $this->columns['created'] => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        ];

        return $this->db->create($data)
                        ->table($this->prefix . $this->table)
                        ->engine($this->engine)
                        ->charset($this->charset)
                        ->execute();
    }

    /**
     * Insert row.
     *
     * @param string $ip        → request ip
     * @param string $uri       → request uri
     * @param string $protocol  → request protocol
     * @param string $method    → request method
     * @param string $referer   → request referer
     * @param string $userAgent → request user agent
     * @param int    $httpState → request http state
     * @param float  $loadTime  → request load time
     *
     * @return int → ID inserted
     */
    public function insert($ip, $uri, $protocol, $method, $referer, $userAgent, $httpState, $loadTime)
    {
        $data = [
            $this->columns['ip'] => '?',
            $this->columns['uri'] => '?',
            $this->columns['protocol'] => '?',
            $this->columns['method'] => '?',
            $this->columns['referer'] => '?',
            $this->columns['user_agent'] => '?',
            $this->columns['http_state'] => '?',
            $this->columns['load_time'] => '?',
        ];

        $launcher = Plugin::HttpRequestLogger()->getControllerInstance(
            'Launcher',
            'controller'
        );

        $statements[] = [1, $launcher->sanitize('ip', $ip), 'str'];
        $statements[] = [2, $launcher->sanitize('str', $uri),       'str'];
        $statements[] = [3, $launcher->sanitize('str', $protocol),  'str'];
        $statements[] = [4, $launcher->sanitize('str', $method),    'str'];
        $statements[] = [5, $launcher->sanitize('url', $referer),   'str'];
        $statements[] = [6, $launcher->sanitize('str', $userAgent), 'str'];
        $statements[] = [7, $launcher->sanitize('int', $httpState), 'int'];
        $statements[] = [8, $launcher->sanitize('float', $loadTime)];

        $query = $this->db->insert($data, $statements)
                          ->from($this->prefix . $this->table);

        return $query->execute('id');
    }

    /**
     * Delete requests table.
     *
     * @return bool
     */
    public function dropTable()
    {
        $query = $this->db->drop()
                          ->table($this->prefix . $this->table);

        return $query->execute();
    }
}
