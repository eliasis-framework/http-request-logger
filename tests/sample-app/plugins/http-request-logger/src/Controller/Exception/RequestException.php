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
namespace Eliasis\Plugins\HttpRequestLogger\Controller\Exception;

/**
 * Exception class.
 *
 * You can use an exception and error handler with this library.
 *
 * @link https://github.com/Josantonius/PHP-ErrorHandler
 */
class RequestException extends \Exception
{
    /**
     * Exception handler.
     *
     * @param string $msg   → message error (Optional)
     * @param int    $error → error code (Optional)
     */
    public function __construct($msg = '', $error = 0)
    {
        $this->message = $msg;
        $this->code = $error;
    }
}
