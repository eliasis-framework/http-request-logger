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
use Eliasis\Framework\Controller;
use Josantonius\LoadTime\LoadTime;

/**
 * Plugin launcher.
 */
class Launcher extends Controller
{
    /**
     * Plugin initialization method.
     */
    public function init()
    {
        if (Plugin::HttpRequestLogger()->getState() !== 'active') {
            return;
        }

        $this->runStopwatch();

        $this->registerShutdown();
    }

    /**
     * Activation hook.
     *
     * @return bool
     */
    public function activation()
    {
        return Plugin::HttpRequestLogger()->getControllerInstance('Request')
                                          ->createTable();
    }

    /**
     * Uninstallation hook.
     *
     * @since 1.0.1
     *
     * @return bool
     */
    public function uninstallation()
    {
        $request = Plugin::HttpRequestLogger()->getControllerInstance(
            'Request'
        );

        $request->inserted = true;

        return $request->dropTable();
    }

    /**
     * Sanitize data.
     *
     * @since 1.0.1
     *
     * @return mixed
     */
    public function sanitize($type, $data)
    {
        switch ($type) {
            case 'ip':
                $data = filter_var($data, FILTER_VALIDATE_IP) ? $data : '';
                break;
            case 'str':
                $data = filter_var($data, FILTER_SANITIZE_STRING);
                break;
            case 'int':
                $data = filter_var($data, FILTER_VALIDATE_INT);
                break;
            case 'url':
                $data = filter_var($data, FILTER_SANITIZE_URL);
                break;
            case 'float':
                $data = filter_var($data, FILTER_VALIDATE_FLOAT);
                break;
            default:
        }

        return $data;
    }

    /**
     * Start stopwatch.
     *
     * @since 1.0.1
     */
    private function runStopwatch()
    {
        if (! LoadTime::isActive()) {
            LoadTime::start();
        }
    }

    /**
     * Register shutdown.
     *
     * @since 1.0.1
     */
    private function registerShutdown()
    {
        register_shutdown_function([
            Plugin::HttpRequestLogger()->getControllerInstance('Request'),
            'insert'
        ]);
    }
}
