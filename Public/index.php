<?php

/*

LIGHTNING MVC

CREATED BY https://github.com/clowerweb/Lightning

MODIFIED BY Eric Scott <me@ericscott.co.uk>

*/

declare(strict_types = 1);

use App\Routes;

date_default_timezone_set('UTC');

/**
 * Composer autoloader
 */
require_once dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and exception handler
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new Core\Router();

Routes::addRoutes($router);
