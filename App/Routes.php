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
		$router->get('', ['controller' => 'GET\Home', 'action' => 'run']);
		$router->get('login', ['controller' => 'GET\Login', 'action' => 'run']);

		/*
		API Routes
		*/
		$router->post('user/login', ['controller' => 'POST\Login', 'action' => 'run']);
		$router->get('user/logout', ['controller' => 'GET\Logout', 'action' => 'run']);

		$router->post('quiz/create', ['controller' => 'POST\CreateQuiz', 'action' => 'run']);
		$router->get('quiz/{id:[\da-f]+}/delete', ['controller' => 'GET\DeleteQuiz', 'action' => 'run']);
		$router->get('quiz/{id:[\da-f]+}', ['controller' => 'GET\ViewQuiz', 'action' => 'run']);
		$router->get('quiz/{id:[\da-f]+}/edit', ['controller' => 'GET\EditQuiz', 'action' => 'run']);
		$router->post('quiz/{id:[\da-f]+}/save', ['controller' => 'POST\SaveQuiz', 'action' => 'run']);

		/*
		TESTING / DEV Routes
		*/
		$router->get('createuser', ['controller' => 'GET\TestCreate', 'action' => 'run']);

		// route generic controller/action stuff
		$router->get('{controller}', ['action' => 'index']);
		$router->get('{controller}/{action}');
		$router->get('{controller}/{action}/{token:[\da-f]+}');

		$router->dispatch($_SERVER['QUERY_STRING']);
	}
}
