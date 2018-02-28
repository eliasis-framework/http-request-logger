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
namespace Eliasis\Plugins\HttpRequestLogger;

use Eliasis\Complement\Type\Plugin;
use Eliasis\Framework\App;
use Josantonius\Database\Database;
use PHPUnit\Framework\TestCase;

/**
 * Tests class for HTTP Request Logger Eliasis plugin.
 *
 * @runTestsInSeparateProcesses
 */
final class PluginTest extends TestCase
{
    /**
     * App instance.
     *
     * @var object
     */
    protected $app;

    /**
     * Launcher instance.
     *
     * @var object
     */
    protected $launcher;

    /**
     * Root path.
     *
     * @var string
     */
    protected $root;

    /**
     * Database connection.
     *
     * @var object
     */
    protected $db;

    /**
     * Set up.
     */
    public function setUp()
    {
        parent::setUp();

        $this->app = new App();
        $this->root = $_SERVER['DOCUMENT_ROOT'];

        $app = $this->app;
        $app::run($this->root);

        $this->db = Database::getConnection('app');

        $this->launcher = Plugin::HttpRequestLogger()->getControllerInstance(
            'Launcher',
            'controller'
        );
    }

    /**
     * Check if it is an instance of.
     */
    public function testIsInstanceOf()
    {
        $this->assertInstanceOf('Eliasis\Framework\App', $this->app);
        $this->assertInstanceOf('Josantonius\Database\Database', $this->db);
    }

    /**
     * A table should be created when install the plugin.
     */
    public function testTableShouldBeCreatedWhenInstallThePlugin()
    {
        Plugin::HttpRequestLogger()->doAction('activation');

        $rows = $this->db->query("SELECT count(*)
                                  FROM information_schema.tables
                                  WHERE table_schema = 'phpunit'
                                  AND table_name = 'test_request'");

        $result = array_values((array) $rows[0]);

        $this->assertSame((int) $result[0], 1);
    }

    /**
     * Should add a record for each request.
     */
    public function testShouldAddRecordForEachRequest()
    {
        Plugin::HttpRequestLogger()->doAction('activation');

        $result = $this->db->select()
                         ->from('test_request')
                         ->where(['request_id = 1'])
                         ->execute();

        $this->assertSame($result[0]->request_id, '1');
        $this->assertSame($result[0]->request_ip, '87.142.85.70');
        $this->assertSame($result[0]->request_uri, '/sample-app/');
        $this->assertSame($result[0]->request_protocol, 'HTTP/1.1');
        $this->assertSame($result[0]->request_method, 'GET');
        $this->assertSame($result[0]->request_referer, 'http://www.google.es/');
        $this->assertSame($result[0]->request_user_agent, 'Mozilla/5.0');
        $this->assertSame($result[0]->request_http_state, '0');
    }

    /**
     * A table should be deleted when uninstall the plugin.
     */
    public function testTableShouldBeDeletedWhenUninstallThePlugin()
    {
        Plugin::HttpRequestLogger()->doAction('uninstallation');

        $rows = $this->db->query("SELECT count(*)
                                  FROM information_schema.tables
                                  WHERE table_schema = 'phpunit'
                                  AND table_name = 'test_request'");

        $result = array_values((array) $rows[0]);

        $this->assertSame((int) $result[0], 0);
    }
}
