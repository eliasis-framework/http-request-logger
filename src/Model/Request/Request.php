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

namespace Eliasis\Modules\Request\Model\Request;

use Eliasis\App\App,
    Eliasis\Model\Model,
    Eliasis\Module\Module,
    Josantonius\Database\Database;
    
/**
 * Module main model.
 *
 * @since 1.0.0
 */
class Request extends Model {

    /**
     * Database table name.
     *
     * @since 1.0.0
     *
     * @var string $id
     */
    public $id = 'request';

    /**
     * Database object connection.
     *
     * @since 1.0.0
     *
     * @var object $db
     */
    public $db;

    /**
     * Database table columns.
     *
     * @since 1.0.0
     *
     * @var array $data
     */
    public $data;

    /**
     * Get database connection.
     *
     * @since 1.0.0
     */
    public function __construct() {

        $database = Module::Request()->get('db-id');
        
        $this->db = Database::getConnection($database);

        $this->data = Module::Request()->get('table', $this->id);
    }

    /**
     * Create table.
     * 
     * @return boolean
     */
    public function createTable() {

        $params = [
            $this->data['id'] => 'INT(9) AUTO_INCREMENT PRIMARY KEY', 
            $this->data['ip']         => 'VARCHAR(15)  NOT NULL',
            $this->data['uri']        => 'TEXT         NOT NULL',
            $this->data['protocol']   => 'VARCHAR(100) NOT NULL',
            $this->data['method']     => 'VARCHAR(15)  NOT NULL',
            $this->data['referer']    => 'VARCHAR(255) NOT NULL',
            $this->data['user_agent'] => 'VARCHAR(255) NOT NULL',
            $this->data['http_state'] => 'INT(3)       NOT NULL',
            $this->data['resp_state'] => 'INT(3)       NOT NULL',
            $this->data['load_time']  => 'FLOAT        NOT NULL',
            $this->data['created']    => 'TIMESTAMP DEFAULT ' .
                                         'CURRENT_TIMESTAMP',
        ];
            
        $query = $this->db->create($params)
                          ->table($this->data['prefix'] . $this->id)
                          ->engine($this->data['engine'])
                          ->charset($this->data['charset']);

        return $query->execute();
    }

    /**
     * Insert row.
     *
     * @since 1.0.0
     *
     * @param string $ip        → request ip
     * @param string $uri       → request uri
     * @param string $protocol  → request protocol
     * @param string $method    → request method
     * @param string $referer   → request referer
     * @param string $userAgent → request user agent
     * @param int    $httpState → request http state
     * @param int    $respState → request response state
     * @param float  $loadTime  → request load time
     *
     * @return int → id inserted
     */
    public function insert($ip, $uri, $protocol, $method, $referer, $userAgent, $httpState, $respState, $loadTime) {

        $data = [

            $this->data['ip']         => '?',
            $this->data['uri']        => '?',
            $this->data['protocol']   => '?', 
            $this->data['method']     => '?',
            $this->data['referer']    => '?',
            $this->data['user_agent'] => '?',
            $this->data['http_state'] => '?',
            $this->data['resp_state'] => '?',
            $this->data['load_time']  => '?',
        ];

        $statements[] = [1, $ip,        'str'];
        $statements[] = [2, $uri,       'str'];
        $statements[] = [3, $protocol,  'str'];
        $statements[] = [4, $method,    'str'];
        $statements[] = [5, $referer,   'str'];
        $statements[] = [6, $userAgent, 'str'];
        $statements[] = [7, $httpState, 'int'];
        $statements[] = [8, $respState, 'int'];
        $statements[] = [9, $loadTime];

        $query = $this->db->insert($data, $statements)
                          ->from($this->data['prefix'] . $this->id);

        return $query->execute('id');
    }

    /**
     * Delete requests table.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public function dropTable() {

        $query = $this->db->drop()
                          ->table($this->data['prefix'] . $this->id);

        return $query->execute();
    }
}
