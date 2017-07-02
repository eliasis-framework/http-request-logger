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
    Josantonius\LoadTime\LoadTime,
    Josantonius\Database\Database;
    
/**
 * Module main model.
 *
 * @since 1.0.0
 */
class Request extends Model {

    /**
     * Database id.
     *
     * @since 1.0.0
     *
     * @var string $id
     */
    public $id;

    /**
     * Database prefix.
     *
     * @since 1.0.0
     *
     * @var string $db
     */
    public $prefix;

    /**
     * Database engine.
     *
     * @since 1.0.0
     *
     * @var string $engine
     */
    public $engine;

    /**
     * Database charset.
     *
     * @since 1.0.0
     *
     * @var string $charset
     */
    public $charset;

    /**
     * Database object connection.
     *
     * @since 1.0.0
     *
     * @var object $db
     */
    public $db;

    /**
     * Get database connection.
     *
     * @since 1.0.0
     */
    public function __construct() {

        $this->id = Module::Request()->get('database-id');

        $this->prefix  = App::get('db', $this->id, 'prefix');
        $this->charset = App::get('db', $this->id, 'charset');
        $this->engine  = App::get('db', $this->id, 'engine');

        $this->db = Database::getConnection($this->id);
    }

    /**
     * Set request.
     *
     * @since 1.0.0
     *
     * @return int → request id
     */
    public function set() {

        $server = Module::Request()->get('server');

        $request = Module::Request()->get('table', 'requests');

        $statements[] = [':ip',         App::IP(),             'str'];
        $statements[] = [':uri',        $server['uri'],        'str'];
        $statements[] = [':protocol',   $server['protocol'],   'str'];
        $statements[] = [':method',     $server['method'],     'str'];
        $statements[] = [':referer',    $server['referer'],    'str'];
        $statements[] = [':user_agent', $server['user_agent'], 'str'];
        $statements[] = [':http_state', http_response_code(),  'int'];
        $statements[] = [':resp_state', $server['resp_state'], 'int'];
        $statements[] = [':load_time',  LoadTime::end()];

        $data = [
            $request['ip']         => ":ip",
            $request['uri']        => ":uri",
            $request['protocol']   => ":protocol",
            $request['method']     => ":method",
            $request['referer']    => ":referer",
            $request['user_agent'] => ":user_agent",
            $request['http_state'] => ":http_state",
            $request['resp_state'] => ":resp_state",
            $request['load_time']  => ":load_time",
        ];

        $query = $this->db->insert($data, $statements)
                          ->in($this->prefix . $request['tablename']);

        return $query->execute('id');
    }

    /**
     * Create requests table.
     * 
     * @return boolean
     */
    public function createRequestsTable() {
        
        $request = Module::Request()->get('table', 'requests');

        $created = Module::Request()->get('table', 'global', 'created');

        $params = [
            $request['id']         => 'INT(9) AUTO_INCREMENT PRIMARY KEY', 
            $request['ip']         => 'VARCHAR(15)  NOT NULL',
            $request['uri']        => 'TEXT         NOT NULL',
            $request['protocol']   => 'VARCHAR(100) NOT NULL',
            $request['method']     => 'VARCHAR(15)  NOT NULL',
            $request['referer']    => 'VARCHAR(255) NOT NULL',
            $request['user_agent'] => 'VARCHAR(255) NOT NULL',
            $request['http_state'] => 'INT(3)       NOT NULL',
            $request['resp_state'] => 'INT(3)       NOT NULL',
            $request['load_time']  => 'FLOAT        NOT NULL',
            $created               => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ];
            
        $query = $this->db->create($params)
                          ->table($this->prefix . $request['tablename'])
                          ->engine($this->engine)
                          ->charset($this->charset);

        return $query->execute();
    }

    /**
     * Delete requests table.
     * 
     * @return boolean
     */
    public function deleteRequestsTable() {

        $table = Module::Request()->get('table', 'requests', 'tablename');

        $query = $this->db->drop()
                          ->table($this->prefix . $table);

        return $query->execute();
    }
}
