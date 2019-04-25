<?php

declare(strict_types = 1);

namespace App;

use Core\RequestMethod;

/**
 * Routes class
 *
 * PHP version 7.0
 */
class Routes {
	/**
	 * Add routes to the application
	 *
	 * @param object $router - the router class
	 *
	 * @return void
	 */
	public static function addRoutes($router) {
		// index
		$router->get('', ['controller' => 'GET\Home', 'action' => 'index']); // index page

		// route generic controller/action stuff
		$router->get('{controller}', ['action' => 'index']);
		$router->get('{controller}/{action}');
		$router->get('{controller}/{action}/{token:[\da-f]+}');

		$router->dispatch($_SERVER['QUERY_STRING']);
	}
}
